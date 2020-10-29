<?php
 
namespace App\Http\Controllers;
use App\Entities\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Create a Todo controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $data = Todo::with('user')->get();
        
        return response($data);
        
            // return response()->json(['status' => 'success', 'data' => $doctors]);
    }

    public function show($id)
    {
        // $data = Todo::find($id)->get();
        $data = Todo::where('id', $id)->get();

        return response($data);
    }

    public function store(Request $request)
    {
        $data = Todo::create($request->all());

        return response($data);
    }

    public function destroy($id)
    {
        $data = Todo::find($id)->delete();
        
        return response($data);
    }
}
