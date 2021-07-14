<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Filesystem\Cache;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
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
    public function index(Request $request)
    {
//        $user = Cache::get('user'.$id)
        $books = Products::all();
        if (Gate::allows('user')) {
            return view('home', compact('books'));
        }
//        if (Gate::allows('admin')) {
//            $books = Products::all();
//            return view('admin.home', compact('books'));
//        }
        return view('admin.home', compact('books'));
//        dd($request);
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

    public function buy($id)
    {
        return view('user.buy');
    }
}
