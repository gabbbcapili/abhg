<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Utilities;
use Auth;
use Validator;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $subscription = $request->user()->subscription()->orderBy('updated_at', 'desc');
            return Datatables::eloquent($subscription)
            ->addColumn('action', function(Subscription $subscription) {
                            $html = Utilities::actions([
                                ['route' => route('plan.invoice', $subscription->id), 'name' => 'Show'],
                                // ['route' => route('media.delete', $media->id), 'name' => 'Delete']
                            ]);
                            return $html;
                        })
            ->addColumn('expire_at', function(Subscription $subscription) {
                            return Carbon::parse($subscription->expire_at)->format('M d, Y H:i');
                        })
            ->addColumn('status', function(Subscription $subscription) {
                            return $subscription->statusDisplay;
                        })
            ->rawColumns(['action'])
            ->make(true);
        }
        $breadcrumbs = [
            ['link'=>"/",'name'=>"Home"], ['name' => 'My Subscription'],
        ];
        return view('content.subscription.index', compact('breadcrumbs'));
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
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        //
    }

    public function notfound(){
        return view('content.misc.subscribe');
    }
}
