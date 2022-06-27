<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Utilities;
use Illuminate\Http\Request;
use App\Models\Card;
use Validator;
use Carbon\Carbon;
use DB;
use Yajra\DataTables\Facades\DataTables;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $media = $request->user()->medias()->orderBy('updated_at', 'desc');
            return Datatables::eloquent($media)
            ->addColumn('action', function(Media $media) {
                            $html = Utilities::actions([
                                ['route' => route('media.edit', $media->id), 'name' => 'Edit'],
                                // ['route' => route('media.delete', $media->id), 'name' => 'Delete']
                            ]);
                            return $html;
                        })
            ->addColumn('title', function(Media $media) {
                            if(in_array($media->type, Media::$imagesType)){
                                return '<a target="_blank" href="'. $media->fileUrl() .'"><span><img width="100px" src="'. $media->fileUrl() .'"> '. $media->title .' </span></a>';
                            }else{
                                return '<a target="_blank" href="'. $media->fileUrl() .'">'. $media->title .'</a>';
                            }

                        })

            ->rawColumns(['action', 'title'])
            ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.media.create');
    }

    public function qcreate($type)
    {
        return view('content.media.qcreate', compact('type'));
    }

    public function upload(Request $request, $type)
    {
        $validator = Validator::make($request->all(), [
                'file' => ['required', 'file',
                'mimes:' . Media::getTypeValidation($type),
                // 'mimetypes:application/pdf,audio/mpeg'
                ],
                'title' => ['required'],
                'link' => ['nullable', 'url']
            ],
            [
                'file.mimes' => 'The file must be a file of type: ' . Media::getTypeValidation($type)
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }
        try {
            DB::beginTransaction();
            $data = $request->all();
            $data['type'] = $request->file('file')->extension();
            if($request->hasFile('file')){
              $photo = $data['file'];
              $new_name = 'file_'  . sha1(time()) . '.' . $photo->getClientOriginalExtension();
              $photo->move(public_path('user/'. $request->user()->id .'') , $new_name);
              $data['file'] = $new_name;
            }
            $media = $request->user()->medias()->create($data);
            DB::commit();
            $output = ['success' => 1,
                        'msg' => 'Media added successfully!',
                        'modalToggle' => 'show_modal',
                        'media' => $media,
                        'uploadImage' => true,
                        'fileUrl' => $media->fileUrl(),
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => ['required', 'file',
            'mimes:png,jpg,gif,jpeg,doc,docx,csv,xls,xlsx,ppt,mpga,mp3,wav,pdf',
            // 'mimetypes:application/pdf,audio/mpeg'
            ],
            'title' => ['required'],
            'link' => ['nullable', 'url']
        ],
        [
            'file.mimes' => 'The file must be a file of type: png, jpg, gif, jpeg, pdf, doc, docx, csv, xls, xlsx, ppt, mp3, mp4'
        ]
    );
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }
        try {
            DB::beginTransaction();
            $data = $request->all();
            $data['type'] = $request->file('file')->extension();
            if($request->hasFile('file')){
              $photo = $data['file'];
              $new_name = 'file_'  . sha1(time()) . '.' . $photo->getClientOriginalExtension();
              $photo->move(public_path('user/'. $request->user()->id .'') , $new_name);
              $data['file'] = $new_name;
            }
            $media = $request->user()->medias()->create($data);
            DB::commit();
            $output = ['success' => 1,
                        'msg' => 'Media added successfully!',
                        'modalToggle' => 'show_modal',
                        'media' => $media,
                        'uploadImage' => true,
                        'fileUrl' => $media->fileUrl(),
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
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        return view('content.media.edit', compact('media'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {
        $validator = Validator::make($request->all(), [
            'file' => ['nullable', 'file',
            'mimes:png,jpg,gif,jpeg,doc,docx,csv,xls,xlsx,ppt,mpga,mp3,wav,pdf',
            ],
            'title' => ['required']
        ],
        [
            'file.mimes' => 'The file must be a file of type: png, jpg, gif, jpeg, pdf, doc, docx, csv, xls, xlsx, ppt, mp3, mp4'
        ]
    );
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }
        try {
            DB::beginTransaction();
            $data = $request->all();
            if($request->hasFile('file')){
              $data['type'] = $request->file('file')->extension();
              $photo = $data['file'];
              $new_name = 'file_'  . sha1(time()) . '.' . $photo->getClientOriginalExtension();
              $photo->move(public_path('user/'. $request->user()->id .'') , $new_name);
              $data['file'] = $new_name;
            }
            $media->update($data);
            DB::commit();
            $output = ['success' => 1,
                        'msg' => 'Media updated successfully!',
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
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media)
    {
        try {
            DB::beginTransaction();
            $media->delete();
            DB::commit();
            $output = ['success' => 1,
                        'msg' => 'Media successfully deleted!'
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

    public function delete(Media $media)
    {
        $action = route('media.destroy', $media);
        $title = 'media ' . $media->title;
        return view('layouts.delete', compact('action' , 'title'));
    }


}
