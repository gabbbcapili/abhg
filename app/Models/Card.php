<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $table = 'card';

    protected $fillable = ['name', 'footer_text', 'shared_text', 'show_footer_links', 'show_follow_me', 'design_id'];

    public function getUrlAttribute(){
        return $this->name .'.' . ENV('APP_DOMAIN');
    }

    public function route(){
        return route('card.show', ['card' => $this, 'page_url' => 'home']);
    }

    public function pages(){
        return $this->hasMany(Page::class, 'card_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function design(){
        return $this->belongsTo(Design::class, 'design_id');
    }
}
