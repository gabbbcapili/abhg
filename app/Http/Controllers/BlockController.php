<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\Block;
use App\Models\Page;
use Validator;
use Carbon\Carbon;
use DB;

class BlockController extends Controller
{
    public function create(Page $page){
        return view('content.block.create', compact('page'));
    }

    public function createType(Page $page, $type){
        return view('content.block.add.' . $type, compact('page', 'type'));
    }

    public function store(Request $request, Page $page){
        $validator = Validator::make($request->all(), Block::validation($request->type));
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }
        try {
            DB::beginTransaction();
            $data = $request->all();
            foreach($page->blocks()->where('sort', '>=', $data['sort'] ? $data['sort'] : 0)->get() as $blocks){
                $blocks->update(['sort' => $blocks->sort + 1]);
            }

            if($data['type'] == 'text'){
            }else if($data['type'] == 'customBtn'){
                $data['content'] = json_encode($request->only(['btnTitle','linkType','linkUrl','btnColor','btnTxtColor','btnBorderColor','btnBorder','btnWidth','btnFontSize','btnBorderRadius', 'finalCss']));
            }else if($data['type'] == 'socialShare'){
                $data['content'] = json_encode([
                    'facebook' => $request->has('facebook') ? true : false,
                    'googleplus' => $request->has('googleplus') ? true : false,
                    'linkedin' => $request->has('linkedin') ? true : false,
                    'pinterest' => $request->has('pinterest') ? true : false,
                    'twitter' => $request->has('twitter') ? true : false,
                ]);
            }else if($data['type'] == 'preformattedBtn'){
                $data['content'] = json_encode([
                    'btnType' => $data['btnType'],
                ]);
            }else if($data['type'] == 'paypal'){
                $data['content'] = json_encode([
                    'paypalCode' => $data['paypalCode']
                ]);
            }else if($data['type'] == 'html'){
                $data['content'] = json_encode([
                    'height' => $data['height'],
                    'html' => $data['html']
                ]);
            }else if($data['type'] == 'contactForm'){
                $form = [];
                $required = [];
                foreach(Block::$contactForm as $key => $val){
                    $form[$key] = $request->has('form.' . $key) ? true : false;
                    $required[$key] = $request->has('required.' . $key) ? true : false;
                }
                $customField = [];
                if($request->has('custom')){
                    foreach($data['custom'] as $key => $val){
                        if($val['val'] != null){
                            $customField[$key]['show'] = $request->has('custom.'. $key . '.show') ? true : false;
                            $customField[$key]['required'] = $request->has('custom.'. $key . '.required') ? true : false;
                            $customField[$key]['val'] = $val['val'];
                        }
                    }
                }
                $data['content'] = json_encode([
                    'form' => $form,
                    'required' => $required,
                    'customField' => $customField,
                    'headline' => $data['headline'],
                    'formName' => $data['formName'],
                    'recEmail' => $data['recEmail'],
                ]);
            }else if($data['type'] == 'event'){
                $rsvpForm = [];
                foreach(Block::$eventRsvpForm as $key => $val){
                    $rsvpForm[$key] = $request->has('rsvpForm.' . $key) ? true : false;
                }
                $data['content'] = json_encode([
                    'mapit' => $request->has('mapit') ? true : false,
                    'hideOnExpire' => $request->has('hideOnExpire') ? true : false,
                    'shareByText' => $request->has('shareByText') ? true : false,
                    'shareByEmail' => $request->has('shareByEmail') ? true : false,
                    'followMe' => $request->has('followMe') ? true : false,
                    'showRsvpForm' => $request->has('showRsvpForm') ? true : false,
                    'rsvpForm' => $rsvpForm,
                    'title' => $data['title'],
                    'startDate' => $data['startDate'],
                    'endDate' => $data['endDate'],
                    'timezone' => $data['timezone'],
                    'venue' => $data['venue'],
                    'street' => $data['street'],
                    'city' => $data['city'],
                    'state' => $data['state'],
                    'zip' => $data['zip'],
                    'description' => $data['description'],
                    'tickets' => $data['tickets'],
                    'register' => $data['register'],
                    'webinar' => $data['webinar'],
                    'webinarInstructions' => $data['webinarInstructions'],
                ]);
            }else if($data['type'] == 'coupon'){
                $data['content'] = json_encode([
                    'shareByText' => $request->has('shareByText') ? true : false,
                    'shareByEmail' => $request->has('shareByEmail') ? true : false,
                    'followMe' => $request->has('followMe') ? true : false,
                    'borderStyle' => $data['borderStyle'],
                    'borderColor' => $data['borderColor'],
                    'backgroundColor' => $data['backgroundColor'],
                    'backgroundImage' => $data['backgroundImage'],
                    'image' => $data['image'],
                    'description' => $data['description'],
                    'title' => $data['title'],
                    'terms' => $data['terms'],
                    'startDate' => $data['startDate'],
                    'endDate' => $data['endDate'],
                    'expires' => $data['expires'],
                ]);
            }else if($data['type'] == 'document'){
                $data['content'] = json_encode([
                    'document' => $data['document'],
                ]);
            }else if($data['type'] == 'audio'){
                $data['content'] = json_encode([
                    'audio' => $data['audio'],
                ]);
            }else if($data['type'] == 'image'){
                $data['content'] = json_encode([
                    'image' => $data['image'],
                ]);
            }else if($data['type'] == 'slideshow'){
                $data['content'] = json_encode([
                    'slideshow' => $data['slideshow'],
                    'displayType' => $data['displayType'],
                ]);
            }else if($data['type'] == 'video'){
                $data['content'] = json_encode([
                    'embedCode' => $data['embedCode'],
                ]);
            }else if($data['type'] == 'imagetitle'){
                $data['content'] = json_encode([
                    'text' => $data['text'],
                    'image' => $data['image'],
                    'subText' => $data['subText'],
                ]);
            }else if($data['type'] == 'nameinfo'){
                $data['content'] = json_encode([
                    'show_title' => $request->has('show_title') ? true : false,
                    'show_first_name' => $request->has('show_first_name') ? true : false,
                    'show_last_name' => $request->has('show_last_name') ? true : false,
                    'show_job_title' => $request->has('show_job_title') ? true : false,
                    'show_business_name' => $request->has('show_business_name') ? true : false,
                ]);
                $request->user()->update($request->only(['first_name', 'last_name']));
                $request->user()->contact->update($request->only(['title', 'job_title', 'business_name']));
            }else if($data['type'] == 'address'){
                $data['content'] = json_encode([
                    'show_address' => $request->has('show_address') ? true : false,
                    'show_website' => $request->has('show_website') ? true : false,
                    'show_phone' => $request->has('show_phone') ? $request->only(['show_phone']) : [],
                ]);
                $request->user()->contact->update($request->only(['address_1', 'address_2', 'state', 'city', 'zip', 'website']));
            }else if($data['type'] == 'profilephoto'){
                $data['content'] = json_encode([
                    'showimage' => $data['showimage'],
                ]);
            }else if($data['type'] == 'socialmedia'){
                $data['content'] = json_encode([
                    'show_social' => $request->has('show_social') ? $request->only(['show_social']) : [],
                ]);
                $request->user()->contact->update($request->all());
            }else if($data['type'] == 'reachmeonline'){
                $data['content'] = json_encode([
                    'show_reach' => $request->has('show_reach') ? $request->only(['show_reach']) : [],
                ]);
                $request->user()->contact->update($request->all());
            }
            $page->blocks()->create($data);
            DB::commit();
            $output = ['success' => 1,
                        'msg' => 'Block added successfully!',
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

    public function updateSort(Page $page, Request $request){
        $blocks = $page->blocks;
        foreach($request->sort as $key => $sort){
            $block = $blocks->find($sort);
            if ($block != null){
                $block->update(['sort' => $key]);
            }
        }
    }

    public function destroy(Block $block)
    {
        try {
            DB::beginTransaction();
            foreach($block->page->blocks()->where('sort', '>', $block->sort)->get() as $blockSort){
                $blockSort->update(['sort' => $blockSort->sort - 1]);
            }
            $block->delete();
            DB::commit();
            $output = ['success' => 1,
                        'msg' => 'Block successfully deleted!'
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

    public function delete(Block $block){
        $action = route('block.destroy', $block->id);
        $title = 'block from this page';
        return view('layouts.delete', compact('action' , 'title'));
    }
}
