<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;



class ApiController extends Controller
{
    public function check()
    {
        $bus = Bus::all();
        return view('user.search', compact('bus'));
    }


    public function store(Request $request)
    {
        $_SERVER['PTX_ID'] = 'FFFFFFFF-FFFF-FFFF-FFFF-FFFFFFFFFFFF';
        $_SERVER['PTX_KEY'] = 'FFFFFFFF-FFFF-FFFF-FFFF-FFFFFFFFFFFF';

        $time_string = gmdate('D, d M Y H:i:s') . ' GMT';
        $signature = base64_encode(hash_hmac("sha1", "x-date: $time_string", $_SERVER['PTX_KEY'], true));

        $opts = [
            "http" => [
                "method" => "GET",
                "header" =>
                    'Authorization:hmac username="' . $_SERVER['PTX_ID'] . '", algorithm="hmac-sha1", headers="x-date", signature="' . "$signature\"\n" .
                    "x-date:$time_string\n",
                "Accept-Encoding: gzip, deflate\n",
            ]
        ];

        $ret = file_get_contents(
            'https://ptx.transportdata.tw/MOTC/v2/Bus/Stop/City/' . $request->get('$city_name') . 'County?$top=100&$format=JSON', false, stream_context_create($opts)
        );
        $ret = substr($ret, 0, -1);
        $ret = substr($ret, 2);
        $ret = explode("},{", $ret);
        $this->delete();
        for ($i = 0; $i < count($ret); $i++) {
            $json = explode(',', $ret[$i]);
            $stop_uid = explode(':', $json[0]);
            $time = explode(':', $json[15]);
            $city = explode(':', $json[12]);
            $bus = new Bus([
                'stopuid' => $stop_uid[1],
                'time' => $time[1],
                'city' => $city[1],
            ]);
            $bus->save();
        }
        return back();
    }

    public function delete()
    {
        Bus::truncate();

    }
}
