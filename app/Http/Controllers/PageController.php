<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Card;
use Validator;
use Carbon\Carbon;
use DB;
use Illuminate\Validation\Rule;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Card $card)
    {
        return view('content.card.load.pages', compact('card'));
    }

    public function content(Page $page){
        return view('content.card.load.blocks', compact('page'));
    }

    public function phone(Page $page){
        return view('content.card.load.phone', compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Card $card)
    {
    return view('content.page.create', compact('card'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Card $card)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:50',
            Rule::unique('page')->where(function ($query) use($card){
                return $query->where('card_id', $card->id);
            })
        ],
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }
        try {
            DB::beginTransaction();
            $data = $request->all();
            $data['url'] = str_replace(' ', '_', $data['name']);
            $data['sort'] = $card->pages()->orderBy('sort', 'desc')->first()->sort + 1;
            $card->pages()->create($data);
            DB::commit();
            $output = ['success' => 1,
                        'msg' => 'Page added successfully!',
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
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        //
    }


    public function editName(Request $request, Page $page)
    {
        return view('content.page.editName', compact('page'));
    }

    public function updateName(Request $request, Page $page)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:50',
            Rule::unique('page')->where(function ($query) use($page){
                return $query->where('card_id', $page->card->id);
            })
        ],
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }
        try {
            DB::beginTransaction();
            $data = $request->all();
            $data['url'] = str_replace(' ', '_', $data['name']);
            $page->update($data);
            DB::commit();
            $output = ['success' => 1,
                        'msg' => 'Page updated successfully!',
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

    public function updateSort(Card $card, Request $request){
        $pages = $card->pages;
        foreach($request->sort as $key => $sort){
            $page = $pages->find($sort);
            if ($page != null){
                $page->update(['sort' => $key += 3]);
            }
        }
    }

    public function destroy(Page $page)
    {
        try {
            DB::beginTransaction();
            $page->blocks()->delete();
            $page->delete();
            DB::commit();
            $output = ['success' => 1,
                        'msg' => 'Page successfully deleted!'
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

    public function delete(Page $page){
        $action = route('page.destroy', $page->id);
        $title = 'page ' . $page->name;
        $description = 'Content for this page will be deleted.';
        return view('layouts.delete', compact('action' , 'title', 'description'));
    }
}
