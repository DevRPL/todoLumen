<?php
 
namespace App\Http\Controllers;
use App\Entities\Information;
use Illuminate\Http\Request;
use hisorange\BrowserDetect\Parser as Browser;
use Illuminate\Support\Facades\DB;

class InformationController extends Controller
{
    public function index()
    { 
        return response(Information::get());

    }

    public function getPortofolio()
    {
        DB::table('porotolioes')->get();
        
        return response('berhasil');
    }

    public function store(Request $request)
    {
        $information = Information::where('ip_address',  $request->ip())
            ->first();
        if (!$information->ip_address && !$information->computer_name) {
            $result = Information::create(
                [
                    'computer_name' => php_uname('n'),
                    'ip_address' => $request->ip(),
                    'browser' =>  Browser::browserName(),
                    'platform' => Browser::platformName(),
                    'user_agent' => Browser::userAgent(),
                    'visit' => 1
                ]
            );
        } else {
            $result = Information::find($information->id)
                ->update([
                    'computer_name' => php_uname('n'),
                    'ip_address' => $request->ip(),
                    'browser' =>  Browser::browserName(),
                    'platform' => Browser::platformName(),
                    'user_agent' => Browser::userAgent(),
                    'visit' => $information->visit + 1
                ]);
        }

        return response('berhasil');
    }

    public function destroy($id)
    {
        Information::find($id)->delete();

        return response('berhasil');
    }

    public function deleteAll()
    {
        Information::query()->delete();
        return response('berhasil');
    }
}
