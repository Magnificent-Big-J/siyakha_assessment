<?php

namespace App\Http\Controllers;

use App\Mail\CurrencyOrders;
use Illuminate\Http\Request;
use App\Order;
use App\Currency;
use Illuminate\Support\Facades\Auth;
use App\User;
class OrderController extends Controller
{
    public function purchase(Request $request){

        $currency = Currency::find($request->id);
        $zarAmount = $this->getZarAmount($currency->name);

        //Checking if the amount is in ZAR
        if($request->isZar){
            $amount = $request->amount;

        }else{
            $amount = $request->amount * $zarAmount;
        }
        $surcharge = $amount * ((float)$currency->surcharge / 100);
        $amount +=$surcharge;
        $foreignAmount = $amount / $zarAmount;

        $order = new Order();
        $order->user_id = Auth::id();
        $order->currency_id = $request->id;
        $order->foreign_amt = $foreignAmount;
        $order->zar_amt = $amount;
        $order->surcharge_amt = $surcharge;
        $order->save();
        return ['message'=>'Order Created successfully'];


    }
    protected function getZarAmount($value){




        $value = $value."_ZAR";
        $url = 'http://free.currencyconverterapi.com/api/v5/convert?q='.$value.'&compact=y';
        // Initialize CURL:
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Store the data:
        $json = curl_exec($ch);
        curl_close($ch);
        $curr_obj = json_decode($json, true);
        $val = null;
        //Get the value ZAR amount
      foreach ($curr_obj as $obj){
            $val = $obj['val'];
        }

        return $val;
    }

    public function orders(){

        return Order::with('currency')->with('user')->get();
    }
    public function sendOrders(){

        $orders = Order::with('currency')
                    ->with('user')
                    ->where('order_status',0)
                    ->get();
        foreach ($orders as $order){
            if($order->currency->action){
                \Mail::to(User::find($order->user_id))->send(new CurrencyOrders($order));
            }


            //Change the status of an order
            $uOrder = Order::find($order->id);
            $uOrder->order_status = 1;
            $uOrder->save();

        }

        return ['message'=>'Orders Successfully sent'];
    }

}
