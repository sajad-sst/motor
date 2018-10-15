<?php

namespace App\Http\Controllers;

use App\Motor;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\DeclareDeclare;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    // Show All Function
    public function show_all()
    {
        $items = Motor::paginate('5');

        return view('all', compact('items'));
    }

    // detail function
    public function detail($id)
    {
        $item = Motor::findOrFail($id);

        return view('detail', compact('item'));
    }

    //sort function
    public function sort(Request $request)
    {
        if ($request->sort == 'price') {
            $items = Motor::orderBy('price','ASC')->paginate('5');
        }else{
            $items = Motor::orderBy('created_at','DESC')->paginate('5');
        }

        return view('all', compact('items'));
    }

    //filter function
    public function filter(Request $request)
    {
        if ($request->color) {
            $items = Motor::where('color', 'LIKE' , '%'.$request->color.'%')->paginate('5');
        }

        return view('all', compact('items'));
    }

}
