<?php
 
namespace App\Http\Controllers;
use App\Entities\Information;
use Illuminate\Http\Request;

use hisorange\BrowserDetect\Parser as Browser;

class InformationController extends Controller
{
    public function index()
    {
        return response(Information::get());

    }

    public function store(Request $request)
    {
        $information = Information::where('ip_address',  $request->ip())
            ->first();
        if (!$information) {
            $result = Information::create(
                [
                    'ip_address' => $request->ip(),
                    'browser' =>  Browser::browserName(),
                    'platform' => Browser::platformName(),
                    'user_agent' => Browser::userAgent(),
                    'visit' => 1
                ]
            );
        } else {
            $result = Information::find($information->id)
                ->update(['visit' => $information->visit + 1]);
        }

        return response($result);
    }
}
