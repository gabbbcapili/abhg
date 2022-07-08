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
        else if($type == 'nameinfo'){
            return [
                'website' => ['nullable', 'url'],
            ];
        }else if($type == 'address'){
            return [
            ];
        }else if($type == 'profilephoto'){
            return [
            ];
        }else if($type == 'socialmedia'){
            return [
                'facebook' => ['nullable', 'url'],
                'twitter' => ['nullable', 'url'],
                'googleplus' => ['nullable', 'url'],
                'pinterest' => ['nullable', 'url'],
                'instagram' => ['nullable', 'url'],
                'linkedin' => ['nullable', 'url'],
                'youtube' => ['nullable', 'url'],
                'yelp' => ['nullable', 'url'],
                'myspace' => ['nullable', 'url'],
                'foursquare' => ['nullable', 'url'],
                'tumblr' => ['nullable', 'url'],
                'spotify' => ['nullable', 'url'],
                'soundcloud' => ['nullable', 'url'],
                'bandcamp' => ['nullable', 'url'],
                'vilmeo' => ['nullable', 'url'],
                'snapchat' => ['nullable', 'url'],
                'reddit' => ['nullable', 'url'],
                'twitch' => ['nullable', 'url'],
            ];
        }else if($type == 'reachmeonline'){
            return [
                'skype' => ['nullable', 'url'],
                'whatsapp' => ['nullable', 'url'],
                'wechat' => ['nullable', 'url'],
                'zoom' => ['nullable', 'url'],
                'joinme' => ['nullable', 'url'],
                'viber' => ['nullable', 'url'],
                'googlehangout' => ['nullable', 'url'],
                'voxer' => ['nullable', 'url'],
            ];
        }
        else{
            return [
                'type' => ['required', Rule::in(static::$types)]
            ];
        }
    }

    public function preformattedBtn($btnType, $design_id = null){
        $html = '';
        // $phone = $this->page->card->user->phone ? $this->page->card->user->phone->first() : null;


        if($btnType == 1){
            $html = '<div class="row mb-2">
                        <div class="d-grid col-6">
                          <a class="btn btn-outline-secondary button-'. $design_id .'"><span data-feather="phone-call"></span> Call Me</a>
                        </div>
                        <div class="d-grid col-6">
                          <a class="btn btn-outline-secondary button-'. $design_id .'""><span data-feather="mail"></span> Email Me</a>
                        </div>
                      </div>';
        }else if($btnType == 2){
            $html = '<div class="row mb-2">
                        <div class="d-grid col-6">
                          <a class="btn btn-outline-secondary button-'. $design_id .'"><span data-feather="smartphone"></span> Share by Text</a>
                        </div>
                        <div class="d-grid col-6">
                          <a class="btn btn-outline-secondary button-'. $design_id .'""><span data-feather="mail"></span> Share by Email</a>
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="d-grid col-12">
                          <a class="btn btn-outline-secondary button-'. $design_id .'""><span data-feather="download"></span> Download Contact</a>
                        </div>
                      </div>';
        }else if($btnType == 3){
            $html = '<div class="row mb-2">
                        <div class="d-grid col-4">
                          <a class="btn btn-outline-secondary button-'. $design_id .'""><span data-feather="phone-call"></span> Call Me</a>
                        </div>
                        <div class="d-grid col-4">
                          <a class="btn btn-outline-secondary button-'. $design_id .'""><span data-feather="mail"></span> Email Me</a>
                        </div>
                        <div class="d-grid col-4">
                          <a class="btn btn-outline-secondary button-'. $design_id .'""><span data-feather="smartphone"></span> Text Me</a>
                        </div>
                      </div>';
        }else if($btnType == 4){
            $html = '<div class="row mb-2">
                        <div class="d-grid col-12">
                          <a class="btn btn-outline-secondary button-'. $design_id .'""><span data-feather="phone-call"></span>Phone</a>
                        </div>
                      </div>';
        }else if($btnType == 5){
            $html = '<div class="row mb-2">
                        <div class="d-grid col-12">
                          <a class="btn btn-outline-secondary button-'. $design_id .'""><span data-feather="mail"></span> Email Me</a>
                        </div>
                      </div>';
        }else if($btnType == 6){
            $html = '<div class="row mb-2">
                        <div class="d-grid col-12">
                          <a class="btn btn-outline-secondary button-'. $design_id .'""><span data-feather="smartphone"></span> Text Me</a>
                        </div>
                      </div>';
        }else if($btnType == 7){
            $html = '<div class="row mb-2">
                        <div class="d-grid col-12">
                          <a class="btn btn-outline-secondary button-'. $design_id .'""><span data-feather="monitor"></span> Save to my Home Screen</a>
                        </div>
                      </div>';
        }else if($btnType == 8){
            $html = '<div class="row mb-2">
                        <div class="d-grid col-12">
                          <a class="btn btn-outline-secondary button-'. $design_id .'""><span data-feather="users"></span> Follow Me</a>
                        </div>
                      </div>';
        }else if($btnType == 9){
            $html = '<div class="row mb-2">
                        <div class="d-grid col-12">
                          <a class="btn btn-outline-secondary button-'. $design_id .'""><span data-feather="download"></span> Download Contact</a>
                        </div>
                      </div>';
        }
        return $html;
    }

    public function media($id){
        return Media::find($id);
    }

}
