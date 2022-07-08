<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Utilities;
use Auth;
use Validator;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Block;
use App\Models\Design;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd(json_decode(Block::first()->content, true));
        $breadcrumbs = [
            ['link'=>"/",'name'=>"Home"],['link'=> route('card.index'), 'name'=>"Card Editor"], ['name'=> $request->user()->card->name . "." . ENV('APP_DOMAIN')]
        ];
        $noFooter = false;
        $card = $request->user()->card;
        $qr = QrCode::format('png')->generate('http://www.simplesoftware.io');
        // $design = Design::all();
        return view('content.card.index', compact('breadcrumbs', 'noFooter', 'card', 'qr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            ['link'=>"/",'name'=>"Home"],['link'=> route('card.create'), 'name'=>"Wizard Form"], ['name'=>"Create your bump card!"]
        ];
        return view('content.wizard.create', compact('breadcrumbs'));
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
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card, $page_url)
    {
        $page = $card->pages()->where('url', $page_url)->first();
        if($page == null){
            abort(404);
        }
        return view('content.card.show', compact('card', 'page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        return view('content.card.edit', compact('card'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:15', 'unique:card,name,' . $card->id],
            'shared_text' => ['required', 'max:140']
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }
        try {
            DB::beginTransaction();
            $data = $request->all();
            $card->update($data);
            DB::commit();
            $output = ['success' => 1,
                        'msg' => 'Card updated successfully!',
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
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        //
    }

    public function downloadqr(Card $card){
        return $message->embedData(QrCode::format('png')->generate('Embed me into an e-mail!'), 'QrCode.png', 'image/png');
    }

    public function addBlock(){

    }

    public function updateDesign(Card $card, Request $request){
        $validator = Validator::make($request->all(), [
            'design_id' => ['required', 'exists:design,id'],
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }
        try {
            DB::beginTransaction();
            $data = $request->only(['design_id']);
            $card->update($data);
            DB::commit();
            $output = ['success' => 1,
                        'msg' => 'Card updated successfully!',
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
}
