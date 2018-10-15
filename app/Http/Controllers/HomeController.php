<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'totalOfProducts' => Product::all()->count(),
            'totalOfSales'    => Sale::all()->count(),
        ];

        return view('home', compact('data'));
    }

    public function notaccess()
    {
        return view('aborts.notaccess');
    }
}
