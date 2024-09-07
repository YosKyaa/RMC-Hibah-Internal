<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Post;
use Illuminate\Support\Str;

class CmsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Post::select(['id', 'title', 'slug']);

            return Datatables::of($data)
                ->addIndexColumn() // Adds a sequential number column
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/edit/' . $row->id . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= ' <form action="/delete/' . $row->id . '" method="POST" style="display:inline;">' .
                        csrf_field() . method_field('DELETE') .
                        '<button type="submit" class="delete-btn btn btn-danger btn-sm" data-id="' . $row->id . '">Delete</button></form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('cms.index');
    }


    public function create()
    {
        return view('cms.create');
    }

    public function checkSlug(Request $request)
    {
        $slug = Str::slug($request->title);
        return response()->json(['slug' => $slug]);
    }

    public function store(Request $request)
    {
        // Validate the incoming data
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'image' => 'image|file',
            'image_cover' => 'image|file',
            'body' => 'required',
        ]);

        // Custom storage path for images
        $destinationPath = public_path('storage/FILE/post-images'); // Path: D:\application\RMC-Hibah-Internal\public\storage\FILE\post-images

        // Handle the 'image' upload
        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Create a unique file name
            $image->move($destinationPath, $imageName); // Move the file to the custom folder
            $validateData['image'] = 'storage/FILE/post-images/' . $imageName; // Save the path in the database
        }

        // Handle the 'image_cover' upload
        if ($request->file('image_cover')) {
            $imageCover = $request->file('image_cover');
            $imageCoverName = time() . '_' . $imageCover->getClientOriginalName();
            $imageCover->move($destinationPath, $imageCoverName);
            $validateData['image_cover'] = 'storage/FILE/post-images/' . $imageCoverName;
        }

        // Generate an excerpt from the body
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');

        // Create a new post with the validated data
        Post::Create($validateData);

        // Redirect to the CMS index page with a success message
        return redirect()->route('cms.index')->with('success', 'Posts berhasil di upload');
    }



    public function destroy($id)
    {
        $post = Post::findOrFail($id);  // Find the post by its ID
        $post->delete();  // Delete the post
        return response()->json(['success' => 'Post deleted successfully']);
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);  // Find the post by ID
        return view('cms.edit', compact('post'));  // Pass the post data to the view
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);  // Find the post by ID

        // Validate the incoming data
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts,slug,' . $id,
            'image' => 'image|file',
            'image_cover' => 'image|file',
            'body' => 'required',
        ]);

        // Custom storage path for images
        $destinationPath = public_path('storage/FILE/post-images'); // Path: D:\application\RMC-Hibah-Internal\public\storage\FILE\post-images

        // Handle the 'image' update
        if ($request->file('image')) {
            // Delete the old image if it exists
            if ($post->image && file_exists(public_path($post->image))) {
                unlink(public_path($post->image));
            }

            // Store the new image
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Create a unique file name
            $image->move($destinationPath, $imageName); // Move the file to the custom folder
            $validateData['image'] = 'storage/FILE/post-images/' . $imageName; // Save the path in the database
        }

        // Handle the 'image_cover' update
        if ($request->file('image_cover')) {
            // Delete the old cover image if it exists
            if ($post->image_cover && file_exists(public_path($post->image_cover))) {
                unlink(public_path($post->image_cover));
            }

            // Store the new cover image
            $imageCover = $request->file('image_cover');
            $imageCoverName = time() . '_' . $imageCover->getClientOriginalName();
            $imageCover->move($destinationPath, $imageCoverName);
            $validateData['image_cover'] = 'storage/FILE/post-images/' . $imageCoverName;
        }

        // Generate an excerpt from the body
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');

        // Update the post
        $post->update($validateData);

        return redirect()->route('cms.index')->with('success', 'Post updated successfully');
    }
}
