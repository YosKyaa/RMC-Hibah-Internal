@extends('layouts.master')
@section('title', 'Revisi Kedua')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/quill.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/katex.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/editor.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}">
@endsection
@section('content')
    {{-- <div class="container-xxl flex-grow-1 container-p-y"> --}}
        <!-- Basic Layout -->
        {{-- <div class="row"> --}}
            <div class="card p-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Berikan catatan!</h2> <small class="text-muted float-end">Max 2x Revisi</small>
                </div>
                <hr class="my-0">
                <div class="card-body">
                    <form id="form-add-new-record" method="POST" action="{{ route('reviewers.update2', $proposal->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label mb-1" for="review_notes_2">Mohon berikan alasan mengapa proposal ini
                                perlu direvisi:</label>
                            <div id="editor-container" class="form-control"></div>
                            <textarea class="form-control d-none @error('review_notes_2') is-invalid @enderror" id="review_notes_2" name="review_notes_2"
                                placeholder="Tuliskan isi pikiranmu..." style="height: 150px;">{{ old('review_notes_2') }}</textarea>
                            @error('review_notes_2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>

    {{-- </div> --}}
@endsection

@section('script')
    <script src="{{ asset('assets/js/forms-file-upload.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/quill/katex.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/quill/quill.js') }}"></script>
    <script src="{{ asset('assets/js/forms-editors.js') }}"></script>
    <script>
        var quill = new Quill('#editor-container', {
            theme: 'snow'
        });

        // Sync the content of the Quill editor with the textarea
        quill.on('text-change', function() {
            var review_notes_2 = document.querySelector('textarea[name=review_notes_2]');
            review_notes_2.value = quill.root.innerHTML;
        });

        // If the textarea already has content, load it into Quill
        var review_notes_2 = document.querySelector('textarea[name=review_notes_2]').value;
        if (review_notes_2) {
            quill.root.innerHTML = review_notes_2;
        }
    </script>
@endsection
