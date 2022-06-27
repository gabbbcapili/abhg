<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'media';

    protected $fillable = ['file', 'type','caption', 'user_id', 'link','title',];

    public static $allType = ['png','jpg','gif','jpeg','doc','docx','csv','xls','xlsx','ppt','mpga','mp3','wav','pdf'];

    public static $imagesType = ['png','jpg','gif','jpeg'];

    public static $docsType = ['doc','docx','csv','xls','xlsx','ppt','pdf'];

    public static $audiosType = ['mpga','mp3','wav', 'mp4'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function fileUrl(){
        return asset('user/'. $this->user_id .'/'. $this->file);
    }

    public static function getTypeValidation($type){
        if($type == 'image'){
            return implode(",",self::$imagesType);
        }elseif($type == 'audio'){
            return implode(",",self::$audiosType);
        }elseif($type == 'document'){
            return implode(",",self::$docsType);
        }else{
            return implode(",",self::$allType);
        }
    }

    public function getTypeImage(){
        if(in_array($this->type, ['docx', 'doc'])){
            return asset('images/media/docx.png');
        }else if(in_array($this->type, ['csv','xls'])){
            return asset('images/media/xls.png');
        }else if(in_array($this->type, ['ppt'])){
            return asset('images/media/ppt.png');
        }else{
            return asset('images/media/default.png');
        }
    }


}
