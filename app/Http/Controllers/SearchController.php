<?php

namespace App\Http\Controllers;
use App\Item;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class SearchController extends Controller
{
    public function index()
    {
        return view('search');
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request)
    {
        echo $request->query;
    }
}
