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
        $data = Todo::all(['name', 'contact_number']);
        
        return response($data);
    }

    public function show($id)
    {
        // $data = Todo::find($id)->get();
        $data = Todo::where('id', $id)->get(['name', 'contact_number']);

        return response($data);
    }

    public function store(Request $request)
    {
        $data = Todo::create($request->all());
        $data['result'] = ['id' => $data->id, 'name' => $data->name, 'contact_number' => $data->contact_number];
        return response($data['result']);
    }
}
