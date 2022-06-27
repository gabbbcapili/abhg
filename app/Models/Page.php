<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $table = "page";

    protected $fillable = [
        'card_id' , 'name' , 'showable' , 'editable', 'url', 'sort'
    ];

    public function card(){
        return $this->belongsTo(Card::class, 'card_id');
    }

    public function blocks(){
        return $this->hasMany(Block::class, 'page_id');
    }

    public function getNameFormattedAttribute(){
        return ucfirst($this->name);
    }
}
