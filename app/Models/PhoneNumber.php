<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
    use HasFactory;

    protected $table = 'phone_numbers';

    protected $fillable = ['val', 'extShow', 'ext', 'type', 'call', 'text', 'user_id'];

    public function getDisplayAttribute(){
        $text = $this->val;
        if($this->extShow){
            $text .=  '(Ext.: ' . $this->ext .  ')';
        }
        return $text;
    }

    public function getTelAttribute(){
        $text = $this->val;
        if($this->extShow){
            $text = '('. $this->ext .')' . $this->val;
        }
        return $text;
    }


}
