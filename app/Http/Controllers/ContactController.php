<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use DB;
use App\Models\PhoneNumber;
use App\Models\Link;
use App\Models\Media;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $validator = Validator::make($request->all(), [
            'website' => ['nullable', 'url'],
            'skype' => ['nullable', 'url'],
            'whatsapp' => ['nullable', 'url'],
            'wechat' => ['nullable', 'url'],
            'zoom' => ['nullable', 'url'],
            'joinme' => ['nullable', 'url'],
            'viber' => ['nullable', 'url'],
            'googlehangout' => ['nullable', 'url'],
            'voxer' => ['nullable', 'url'],
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
            'profile_photo_path' => ['nullable', 'file', 'mimes:png,jpg,gif,jpeg'],
            'logo_photo_path' => ['nullable', 'file', 'mimes:png,jpg,gif,jpeg'],
            'phone.*.val' => ['nullable', 'required', 'integer'],
            'phone.*.ext' => ['nullable', 'integer'],
            'link.*.title' => ['nullable', 'required'],
            'link.*.url' => ['nullable', 'required', 'url'],
            'link.*.type' => ['nullable', 'required'],
        ],[
            'phone.*.val.required' => 'This field is required',
            'phone.*.val.integer' => 'This field must be an integer.',
            'phone.*.ext.integer' => 'This field must be an integer.',
            'link.*.title.required' => 'This field is required',
            'link.*.url.required' => 'This field is required',
            'link.*.url.url' => 'This field format is invalid.',
            'link.*.type.required' => 'This field is required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }
        try {
            DB::beginTransaction();
            $data = $request->all();
            $request->user()->update($request->only(['first_name', 'last_name']));
            if($request->has('phone')){
                $newPhoneNumbers = [];
                $updated_phone_numbers = [];
                foreach($request->phone as $p){
                    $p['extShow'] = $p['extShow'] ?? false;
                    $p['call'] = $p['call'] ?? false;
                    $p['text'] = $p['text'] ?? false;
                    if(isset($p['id'])){
                        $updatephone = PhoneNumber::findOrFail($p['id']);
                        $updated_phone_numbers[] = $updatephone->id;
                        $updatephone->update($p);
                    }else{
                        $phoneNumber = new PhoneNumber($p);
                        $newPhoneNumbers[] = $phoneNumber;
                    }
                }
                $deleteOrderDetails = PhoneNumber::where('user_id', $request->user()->id)
                                ->whereNotIn('id', $updated_phone_numbers)
                                ->delete();
                if (!empty($newPhoneNumbers)) {
                    $request->user()->phones()->saveMany($newPhoneNumbers);
                 }
            }else{
                $request->user()->phones()->delete();
            }

            if($request->has('link')){
                $newLinks = [];
                $updatedLinks = [];
                foreach($request->link as $l){
                    if(isset($l['id'])){
                        $updateLink = Link::findOrFail($l['id']);
                        $updatedLinks[] = $updateLink->id;
                        $updateLink->update($l);
                    }else{
                        $link = new Link($l);
                        $newLinks[] = $link;
                    }
                }
                $deleteOrderDetails = Link::where('user_id', $request->user()->id)
                                ->whereNotIn('id', $updatedLinks)
                                ->delete();
                if (!empty($newLinks)) {
                    $request->user()->links()->saveMany($newLinks);
                 }
            }else{
                $request->user()->links()->delete();
            }

            if($request->hasFile('profile_photo_path')){
              $photo = $data['profile_photo_path'];
              $extension = $photo->getClientOriginalExtension();
              $new_name = 'logo_photo_path_'  . sha1(time()) . '.' . $extension;
              $photo->move(public_path('user/'. $request->user()->id .'') , $new_name);
              $media = $request->user()->medias()->create([
                'type' => $extension,
                'file' => $new_name,
                ]);
              $data['profile_photo_path'] = $media->id;
            }
            if($request->hasFile('logo_photo_path')){
              $photo = $data['logo_photo_path'];
              $extension = $photo->getClientOriginalExtension();
              $new_name = 'logo_photo_path_'  . sha1(time()) . '.' . $extension;
              $photo->move(public_path('user/'. $request->user()->id .'') , $new_name);
              $media = $request->user()->medias()->create([
                'type' => $extension,
                'file' => $new_name,
                ]);
              $data['logo_photo_path'] = $media->id;
            }

            $contact->update($data);
            DB::commit();
            $output = ['success' => 1,
                        'msg' => 'Contact Information updated successfully!',
                        'do_nothing' => true,
                    ];
        } catch (\Exception $e) {
            \Log::emergency("File:" . $e->getFile(). " Line:" . $e->getLine(). " Message:" . $e->getMessage());
            $output = ['success' => 0,
                        'msg' => env('APP_DEBUG') ? $e->getMessage() : 'Sorry something went wrong, please try again later.'
                    ];
             DB::rollBack();
        }
        return response()->json($output);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
