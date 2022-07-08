<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use DB;

class PlanController extends Controller
{
    public function checkout(Plan $plan, Request $request){
        $breadcrumbs = [
            ['link'=>"/",'name'=>"Home"], ['name' => 'Checkout']
        ];
        return view('content.plan.checkout', compact('plan', 'breadcrumbs'));
    }

    public function store(Plan $plan, Request $request){
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

    public function initiate(Plan $plan, Request $request){
        try {
            DB::beginTransaction();
            $data = json_decode($request->getContent(), true);
            $data['amount'] = $plan->price;
            $data['currency'] = $plan->currency;
            $data['duration'] = $plan->duration;
            $data['expire_at'] = Carbon::now()->addDays($plan->duration);
            $provider = \PayPal::setProvider();
            $provider->setApiCredentials(config('paypal'));
            $token = $provider->getAccessToken();
            $provider->setAccessToken($token);
            $order = $provider->createOrder([
                "intent"=> "CAPTURE",
                "purchase_units"=> [
                     [
                        "amount"=> [
                            "currency_code"=> $plan->currency,
                            "value"=> $plan->price
                        ],
                         'description' => $plan->duration . ' days access to Card Functions'
                    ]
                ],
            ]);
            $data['payment_reference_id'] = $order['id'];

            $subscription = Subscription::create($data);

            DB::commit();
            $output = ['success' => 1,
                        'msg' => 'Subscription initaited successfully!',
                        'subscription' => $subscription,
                        'order' => $order
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

    public function capture(Request $request){
        $data = json_decode($request->getContent(), true);
        $orderId = $data['orderId'];
        $provider = \PayPal::setProvider();
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);
        $result = $provider->capturePaymentOrder($orderId);

        try {
            DB::beginTransaction();
            if($result['status'] === "COMPLETED"){
                $subscription = Subscription::where('payment_reference_id', $orderId)->first();
                $subscription->status = 2;
                $subscription->save();
                $response = [
                    'result' => $result,
                    'msg' => 'Subscription successfully paid. Thank you!',
                    'redirect' => route('plan.invoice', $subscription)
                ];
                DB::commit();
            }
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
        }
        return response()->json($response);
    }

    public function invoice(Subscription $subscription){
        $breadcrumbs = [
            ['link'=>"/",'name'=>"Home"], ['name' => 'My Subscription', 'link' => route('subscription.index')],['name' => 'Invoice Details']
        ];
        return view('content.plan.invoice', compact('subscription', 'breadcrumbs'));
    }



}
