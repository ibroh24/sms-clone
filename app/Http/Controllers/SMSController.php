<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Price;
use App\Sms;
use File;

class SMSController extends Controller
{
    public function index()
    {
        return view('sms.sendsms');
    }

    public function processSMS(Request $request)
    {
        $rules = [
            'senderid' => 'required|string',
            'recipientid' => 'required',
            'message' => 'required|min:5'
        ];

        $customMessages = [
            'required' => 'The :attribute is required.'
        ];

        $this->validate($request, $rules, $customMessages);

        $getAllRecipient = $request['recipientid'];
        $recipients = explode(',', $getAllRecipient);

        $recipients = array_map('trim', $recipients);
        foreach ($recipients as $key => $value) {
            if(substr($value, 0, 2) == '08' || substr($value, 0, 2) == '09' || substr($value, 0, 2) == '07'){

                $recipients[$key] = "234".substr($value, 1, strlen($value));
            }
        }

        // return $recipients;
        // $priceList = File::get('PriceList.txt');
        // $priceList = str_replace("\r\n", ",", $priceList);
        $totalPrice = 0;

        // pricelist migrated to db with seeder
        $priceList = Price::all();
        
        foreach ($recipients as $key => $value) {
            // tough, hang, stuck :)
            // if(in_array($numType, array_keys($priceArray))){
            //     $totalPrice += (float) $priceArray['price'];
            // }
            if($priceList[0]['numbertype'] == substr($value, 0, 6)){
                $data = DB::table('prices')->select('price')
                ->where([
                    'numbertype' => substr($value, 0, 6)
                ])->get();
                
                foreach ($data as $price) {
                    $totalPrice += $price->price;
                }

            }elseif($priceList[0]['numbertype'] == substr($value, 0, 5)){
                $data = DB::table('prices')->select('price')
                ->where([
                    'numbertype' => substr($value, 0, 5)
                ])->get();
                foreach ($data as $price) {
                    $totalPrice += $price->price;
                }
            }elseif($priceList[0]['numbertype'] == substr($value, 0, 4)){
                $data = DB::table('prices')->select('price')
                ->where([
                    'numbertype' => substr($value, 0, 4)
                ])->get();
                foreach ($data as $price) {
                    $totalPrice += $price->price;
                }
            }elseif($priceList[0]['numbertype'] == substr($value, 0, 3)){
                $data = DB::table('prices')->select('price')
                ->where([
                    'numbertype' => substr($value, 0, 3)
                ])->get();
                foreach ($data as $price) {
                    $totalPrice += $price->price;
                }
            }elseif($priceList[0]['numbertype'] == substr($value, 0, 2)){
                $data = DB::table('prices')->select('price')
                ->where([
                    'numbertype' => substr($value, 0, 2)
                ])->get();
                foreach ($data as $price) {
                    $totalPrice += $price->price;
                }
            }
           
        }
               
        return $data = [
            'totalReceipient'=> count($recipients),
            'pagecount'=> $request['pagecount'],
            'totalPrice' => $totalPrice
        ];
    }
}
