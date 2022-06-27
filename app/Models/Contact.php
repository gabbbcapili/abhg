<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'listings', 'portfolio', 'book_now', 'purchase_book', 'shop_online', 'more_links', 'title', 'job_title', 'business_name', 'map_it', 'address_1', 'address_2', 'city', 'state', 'zip', 'skype', 'website', 'allow_follow', 'allow_link', 'profile_photo_path', 'logo_photo_path', 'facebook', 'twitter', 'googleplus', 'pinterest', 'instagram', 'linkedin', 'youtube', 'yelp', 'myspace', 'foursquare', 'tumblr', 'spotify', 'soundcloud', 'bandcamp', 'vilmeo', 'snapchat', 'reddit', 'twitch', 'whatsapp', 'wechat', 'zoom', 'joinme', 'viber', 'googlehangout', 'voxer'];

    protected $table = 'contact_information';

    public function profile(){
        return $this->hasOne(Media::class, 'id', 'profile_photo_path');
    }

    public function logo(){
        return $this->hasOne(Media::class, 'id', 'logo_photo_path');
    }
}
