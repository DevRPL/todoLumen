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
    }

    public function show($id)
    {
        $data = Todo::with('user')->find($id);

        return response($data);
    }

    public function update(Request $request, $id)
    {
        $data = Todo::find($id)
            ->update($request->all());
        return response($data);
    }

    public function store(Request $request)
    {   
        $request->merge(['user_id' => 1]);

        $data = Todo::create($request->all());

        return response($data);
    }

    public function destroy($id)
    {
        $data = Todo::find($id)->delete();
        
        return response($data);
    }
}
