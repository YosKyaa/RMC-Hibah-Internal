<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Hasroles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'font_title',
        'back_title',
        'nidn',
        'department',
        'study_program',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    function image()
    { 
      $has_valid_avatar = false;
      if(env('APP_ENV') != 'local'){
        $hash = md5(strtolower(trim($this->email)));
        // $uri = "https://klas2.jgu.ac.id/sso/getImage.php?id=".$this->username;
        $uri = "https://klas2.jgu.ac.id/sso/image.php?id=".$this->username;
        if(!@get_headers($uri) || !@getimagesize($uri)){
            $hash = md5(strtolower(trim($this->email)));
            $uri = "https://s.gravatar.com/avatar/$hash".'?s=80&d=404';
        }
        $headers = @get_headers($uri);
        if($headers != false){
          if (preg_match("|200|", $headers[0])) {
            $has_valid_avatar = true;
          }
        }
      }

      if($has_valid_avatar){
        return $uri;
      } else {
        return $this->user_avatar;
      }
    }
    public function getUserAvatarAttribute()
    { 
      if($this->gender == 'F'){
        return asset('assets/img/avatars/user-f.png');
      } else {
        return asset('assets/img/avatars/user.png');
      }
    }
}
