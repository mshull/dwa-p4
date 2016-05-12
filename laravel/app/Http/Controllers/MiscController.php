<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MiscController extends Controller
{
    /**
     * Show search page
     *
     * @return \Illuminate\Http\Response
     */
    public function postSearch(Request $request)
    {
        return view('misc.search');
    }
}
