<?php

namespace App\Http\Controllers;

use App\Models\Clicklog;
use App\Models\Shortnar;

use Illuminate\Http\Request;
use Facades\Spatie\Referer\Referer;
use Illuminate\Support\Facades\Auth;
use Crisu83\ShortId\ShortId;
use Illuminate\Support\Facades\Redis;

class DashboardController extends Controller
{
    public function checkEmail(Request $request)
    {
        $email = $request->input('email');
        $isExists = Shortnar::whereRaw('keyword', $email)->first();
        if ($isExists) {
            return response()->json(array("exists" => true, "data" => $isExists));
        } else {
            return response()->json(array("exists" => false));
        }
    }

    function storeCustomLink(Request $request)
    {
        $validated = $request->validate([
            'long_url' => 'required|url',
            'keyword'  => 'nullable|unique:shortnars|min:6'
        ]);
 
        //return $request->all();

        $shortid = $request->keyword ? $request->keyword : ShortId::create()->generate();
        $shortnar = new Shortnar();
        $shortnar->user_id = Auth::user()->id;
        $shortnar->long_url = $request->long_url;
        $shortnar->session_id = $_COOKIE["user_cid"] ? $_COOKIE["user_cid"] : '';
        $shortnar->short_url = str_replace(['www.', 'http://'], ['', 'https://'], url($shortid));
        $shortnar->keyword = $shortid;
        $saved = $shortnar->save();

        if ($saved) {
            return back()->with(['status' => 'success', 'message' => 'Short url created!', 'short_url' => $shortnar->short_url, 'long_url' => $shortnar->long_url]);
        }
    }
    function myLinks()
    {
        $links = Shortnar::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(10);
        //$links = Shortnar::paginate(120);
        return view('mylinks', compact('links'));
    }

    function zehadLinks()
    {
        $links = Shortnar::where('user_id')->orderBy('id', 'desc')->paginate(10);
        //$links = Shortnar::paginate(120);
        return view('mylinks', compact('links'));
    }

    function myLink($id)
    {

        $id = base64_decode($id);
        $clicklog = Shortnar::where('keyword', $id)->with('logs')->first();
        //return $clicklog->logs;
        $number_of_row = sizeof($clicklog->logs);
        $group_clicklog = $this->array_groups($clicklog->logs->toArray(), ['country', 'city', 'referer', 'device_type', 'language', 'browser', 'platform', 'day','ip']);

        $ips = $group_clicklog ? array_values($group_clicklog['ip']) : [];
        

       //return $ips;
       
        //return count($ips);

        //calculate total count and unique count
       $total_count = 0;
       $unique_count = count($ips);
       for($i = 0; $i < count($ips); $i++)
       {
           $total_count += count($ips[$i]);
       }
 
        // echo "total count = ". $total_count;
        // echo "<br/>";
        // echo "unique count = ".$unique_count;

        $countries = $group_clicklog ? array_values($group_clicklog['country']) : [];
        $country_data = [];
        foreach ($countries as $country) {
            $country_data[strtolower($country[0]['countryCode'])] = sizeof($country) * 10;
        }
        
        $cities = $group_clicklog ? array_values($group_clicklog['city']) : [];
        $city_data = [];
        foreach ($cities as $city) {
            $coun['name'] = $city[0]['city'];
            $coun['percentage'] = round((sizeof($city) * 100) / $number_of_row);
            $city_data[] = $coun;
        }

        $referers = $group_clicklog ? array_values($group_clicklog['referer']) : [];
        $referer_data = [];
        foreach ($referers as $referer) {
            $coun['name'] = $referer[0]['referer'] ? $referer[0]['referer'] : 'unknown';
            $coun['percentage'] = round((sizeof($referer) * 100) / $number_of_row);
            $referer_data[] = $coun;
        }

        $device_types = $group_clicklog ? array_values($group_clicklog['device_type']) : [];


        $device_data = [];
        $labels = [];
        $data = [];
        foreach ($device_types as $device) {
            $labels[] = $device[0]['device_type'];
            $data[] = round((sizeof($device) * 100) / $number_of_row);
        }

        $device_data["labels"] = $labels;
        $device_data["data"] = $data;


        $languages = $group_clicklog ? array_values($group_clicklog['language']) : [];
        $language_data = [];
        foreach ($languages as $language) {
            $coun['name'] = $language[0]['language'];
            $coun['percentage'] = round((sizeof($language) * 100) / $number_of_row);
            $language_data[] = $coun;
        }


        $browsers = $group_clicklog ? array_values($group_clicklog['browser']) : [];
        $browser_data = [];
        foreach ($browsers as $browser) {
            $coun['name'] = $browser[0]['browser'];
            $coun['percentage'] = round((sizeof($browser) * 100) / $number_of_row);
            $browser_data[] = $coun;
        }


        //data for platform wise analysis

        $platforms = $group_clicklog ? array_values($group_clicklog['platform']) : [];
        $platform_data = [];
        $labels = [];
        $data = [];
        foreach ($platforms as $platform) {
            $labels[] = $platform[0]['platform'];
            $data[] = round((sizeof($platform) * 100) / $number_of_row);
        }

        $platform_data['labels'] = $labels;
        $platform_data['data'] = $data;







        //data fro day-by analysis

        $days = $group_clicklog ? array_values($group_clicklog['day']) : [];
        $day_charts = ["Monday" => 0, "Tuesday" => 0, "Wednesday" => 0, "Thursday" => 0, "Friday" => 0, "Saturday" => 0, "Sunday" => 0];

        foreach ($days as $day) {
            $day_charts[$day[0]['day']] = round((sizeof($day) * 100) / $number_of_row);
        }

       // return $day_charts;
       $d = []; //$day
       $v = []; // $value

       foreach ($day_charts as $day => $value)
        {
            $d[] = $day;
            $v[] = $value;
        }


        $day_data["label"] = $d;
        $day_data["data"] = $v;

        return view('mylink-details', compact('clicklog', 'browser_data', 'city_data', 'country_data', 'language_data', 'device_data', 'platform_data', 'referer_data', 'day_data','total_count','unique_count'));
    }

    public function array_group(array $data, $by_column)
    {
        $results = [];
        foreach ($data as $item) {
            $column = $item[$by_column];
            unset($item[$by_column]);
            $results[$column][] = $item;
        }
        return $results;
    }

    public function array_groups(array $data, $by_columns, $row = 3)
    {
        $results = [];
        foreach ($data as $item) {
            foreach ($by_columns as $by_column) {
                $column = $item[$by_column];
                //unset($item[$by_column]);
                $results[$by_column][$column][] = $item;
            }
        }
        return $results;
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function sessionChecker()
    {
        if (isset($_COOKIE["user_cid"])) {
            $links = Shortnar::where('user_id', '')->where('session_id', $_COOKIE["user_cid"])->update(['user_id' => Auth::user()->id]);
        }
        return redirect('/my-links');
    }
}
