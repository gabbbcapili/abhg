<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Media;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'email',
        'password',
        'profile_photo_path',
        'logo_photo_path',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url', 'full_name'
    ];

    public function getFullNameAttribute(){
        return $this->first_name . ' ' . $this->last_name;
    }

    public function card(){
        return $this->hasOne(Card::class);
    }

    public function medias(){
        return $this->hasMany(Media::class, 'user_id');
    }

    public function images(){
        return $this->hasMany(Media::class, 'user_id')->whereIn('type', Media::$imagesType);
    }

    public function documents(){
        return $this->hasMany(Media::class, 'user_id')->whereIn('type', Media::$docsType);
    }

    public function audios(){
        return $this->hasMany(Media::class, 'user_id')->whereIn('type', Media::$audiosType);
    }

    public function contact(){
        return $this->hasOne(Contact::class);
    }

    public function phones(){
        return $this->hasMany(PhoneNumber::class, 'user_id');
    }

    public function subscription(){
        return $this->hasMany(Subscription::class, 'user_id');
    }

    public function links(){
        return $this->hasMany(Link::class, 'user_id');
    }

    public function hasActiveSubscription(){
        $activeCount = $this->subscription()->whereDate('expire_at', '>=', Carbon::today()->toDateString())->count();
        if($activeCount > 0){
            return true;
        }else{
            return false;
        }
    }
}
