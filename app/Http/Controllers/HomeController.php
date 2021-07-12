<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $books = Products::orderBy('id', 'ASC')->get();

        return view('home', compact('books'));
    }

    public function add()
    {
        return view('user.add');
    }

    public function store(Request $request)
    {
        $input = $request->except('_token');


        $res = Products::create($input);

        if($res){
            return redirect('home');
        }else{
            return back();
        }
    }

    public function edit($id)
    {
        $books = Products::find($id);

        return view('user.edit', compact('books'));
    }

    public function update(Request $request)
    {
        $input = $request->all();

        $books = Products::find($input['id']);

        $res = $books->update(['price'=>$input['price']]);

        if($res){
            return redirect('home');
        }else{
            return back();
        }
    }

    public function delete($id)
    {
        $books = Products::find($id);

        if($books){
            $books->delete();
            return redirect('home');
        }else{
            return back();
        }

    }
}
