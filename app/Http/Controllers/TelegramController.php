<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{
    public function updatedActivity()
    {
//        $proxyUrl = 'http://proxy.hcm.fpt.vn'; // Địa chỉ proxy và cổng
//        $activity = Telegram::getUpdates([
//            CURLOPT_PROXY => $proxyUrl,
//            CURLOPT_PROXYPORT => 80,
//        ]);

        $ch = curl_init('https://api.telegram.org/bot6288276952:AAGIn1-nuvuyZ-L4gzt0bcx5_19cAO_o0vQ/getUpdates');
        $proxyUrl = 'http://proxy.hcm.fpt.vn:80';
        curl_setopt($ch, CURLOPT_PROXY, $proxyUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $activity = curl_exec($ch);

        if ($activity === false) {
            echo 'Lỗi cURL: ' . curl_error($ch);
        }
        curl_close($ch);


        dd(json_decode($activity, true));

    }
    public function contactForm()
    {
        return view('contactform');
    }
    public function storeMessage(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'message' => 'required'
        ]);

        $text = "<b>Omniagent Logs Message:</b> \n"
            . "<b>Title Error: </b>\n"
            . " - $request->title\n"
            . "<b>Message: </b>\n"
            . " - " . $request->message;

        $curl = curl_init();

        $proxyUrl = 'http://proxy.hcm.fpt.vn:80';
        $data =  [
            'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001738435883'),
            'parse_mode' => 'HTML',
            'text' => $text
        ];

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.telegram.org/bot6288276952:AAGIn1-nuvuyZ-L4gzt0bcx5_19cAO_o0vQ/sendMessage',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 10, // Timeout 10 giây
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
            CURLOPT_PROXY => $proxyUrl,
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        dd(json_decode($response, true));


//        Telegram::sendMessage([
//            'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001738435883'),
//            'parse_mode' => 'HTML',
//            'text' => $text
//        ]);

        return redirect()->back();
    }
}
