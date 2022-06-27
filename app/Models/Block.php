<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use App\Models\Media;

class Block extends Model
{
    use HasFactory;

    protected $table = 'block';

    protected $fillable = ['content', 'type', 'page_id', 'sort'];

    public static $types = [
        'text',
        'customBtn',
        'socialShare',
        'preformattedBtn',
        'paypal',
        'html',
        'contactForm',
    ];

    public static $contactForm =
    [
        'fname' => 'First Name',
        'lname' => 'Last Name',
        'company' => 'Company',
        'address' => 'Address',
        'address2' => 'Address 2',
        'city' => 'City',
        'state' => 'State/Region',
        'zip' => 'Zip',
        'country' => 'Country',
        'email' => 'Email',
        'phone' => 'Phone',
        'cell' => 'Cell',
        'fax' => 'Fax',
        'bday' => 'Birtday',
        'atendee' => 'No. of Attendees',
        'waycontact' => 'Best Way to Contact',
        'timecontact' => 'Time to Contact',
        'file' => 'File',
    ];

    public static $eventRsvpForm =
    [
        'name' => 'Name',
        'phone' => 'Phone',
        'email' => 'Email',
        'address' => 'Address',
        'city' => 'City',
        'state' => 'State/Region',
        'zip' => 'Zip',
        'attending' => 'Number in Party',
        'comments' => 'Comments'
    ];

    public function page(){
        return $this->belongsTo(Page::class, 'page_id');
    }

    public static function validation($type){
        if($type == 'text'){
            return [
                'content' => 'required',
                'type' => ['required', Rule::in(static::$types)],
            ];
        }else if($type == 'customBtn'){
            return [
                'btnTitle' => ['required'],
                'linkType' => ['required'],
                'linkUrl' => ['required_if:linkType,url', 'nullable', 'url'],
                'btnWidth' => ['required'],
                'btnFontSize' => ['required'],
                'btnBorderRadius' => ['required'],
                'btnBorder' => ['required'],
                'btnColor' => ['required'],
                'btnTxtColor' => ['required'],
                'btnTxtColor' => ['required'],
                'finalCss' => ['required'],
                'type' => ['required', Rule::in(static::$types)],
            ];
        }else if($type == 'paypal'){
            return [
                'paypalCode' => ['required'],
            ];
        }else if($type == 'html'){
            return [
                'html' => ['required'],
                'height' => ['required', 'numeric', 'min:1'],
            ];
        }else if($type == 'contactForm'){
            return [
                'headline' => ['required'],
                'formName' => ['required'],
                'form' => ['required'],
                'recEmail' => ['nullable', 'email'],
                // 'custom.*.val' => ['sometimes', 'required'],
            ];
        }else if($type == 'event'){
            return [
                'title' => ['required'],
                'startDate' => ['required'],
                'endDate' => ['required'],
                'timezone' => ['required'],
                'tickets' => ['nullable', 'url'],
                'register' => ['nullable', 'url'],
                'webinar' => ['nullable', 'url'],
            ];
        }
        else if($type == 'coupon'){
            return [
                'title' => ['required'],
                'description' => ['required'],
            ];
        }
        else if($type == 'document'){
            return [
                'document' => ['required'],
            ];
        }
        else if($type == 'audio'){
            return [
                'audio' => ['required'],
            ];
        }
        else if($type == 'image'){
            return [
                'image' => ['required'],
            ];
        }
        else if($type == 'slideshow'){
            return [
                'slideshow' => ['required'],
            ];
        }
        else if($type == 'video'){
            return [
                'embedCode' => ['required'],
            ];
        }
        else if($type == 'imagetitle'){
            return [
                // 'subText' => ['required'],
                'image' => ['required'],
                'text' => ['required'],
            ];
        }
        else{
            return [
                'type' => ['required', Rule::in(static::$types)]
            ];
        }
    }

    public static function preformattedBtn($btnType){
        $html = '';
        if($btnType == 1){
            $html = '<div class="row mb-2">
                        <div class="d-grid col-6">
                          <a class="btn btn-outline-secondary">Call Me</a>
                        </div>
                        <div class="d-grid col-6">
                          <a class="btn btn-outline-secondary">Email Me</a>
                        </div>
                      </div>';
        }else if($btnType == 2){
            $html = '<div class="row mb-2">
                        <div class="d-grid col-6">
                          <a class="btn btn-outline-secondary">Share by Text</a>
                        </div>
                        <div class="d-grid col-6">
                          <a class="btn btn-outline-secondary">Share by Email</a>
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="d-grid col-12">
                          <a class="btn btn-outline-secondary">Download Contact</a>
                        </div>
                      </div>';
        }else if($btnType == 3){
            $html = '<div class="row mb-2">
                        <div class="d-grid col-4">
                          <a class="btn btn-outline-secondary">Call Me</a>
                        </div>
                        <div class="d-grid col-4">
                          <a class="btn btn-outline-secondary">Email Me</a>
                        </div>
                        <div class="d-grid col-4">
                          <a class="btn btn-outline-secondary">Text Me</a>
                        </div>
                      </div>';
        }else if($btnType == 4){
            $html = '<div class="row mb-2">
                        <div class="d-grid col-12">
                          <a class="btn btn-outline-secondary">Phone</a>
                        </div>
                      </div>';
        }else if($btnType == 5){
            $html = '<div class="row mb-2">
                        <div class="d-grid col-12">
                          <a class="btn btn-outline-secondary">Email Me</a>
                        </div>
                      </div>';
        }else if($btnType == 6){
            $html = '<div class="row mb-2">
                        <div class="d-grid col-12">
                          <a class="btn btn-outline-secondary">Text Me</a>
                        </div>
                      </div>';
        }else if($btnType == 7){
            $html = '<div class="row mb-2">
                        <div class="d-grid col-12">
                          <a class="btn btn-outline-secondary">Save to my Home Screen</a>
                        </div>
                      </div>';
        }else if($btnType == 8){
            $html = '<div class="row mb-2">
                        <div class="d-grid col-12">
                          <a class="btn btn-outline-secondary">Follow Me</a>
                        </div>
                      </div>';
        }else if($btnType == 9){
            $html = '<div class="row mb-2">
                        <div class="d-grid col-12">
                          <a class="btn btn-outline-secondary">Download Contact</a>
                        </div>
                      </div>';
        }
        return $html;
    }

    public function media($id){
        return Media::find($id);
    }

}
