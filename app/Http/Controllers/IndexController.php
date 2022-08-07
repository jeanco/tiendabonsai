<?php

namespace App\Http\Controllers;

use App\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class IndexController extends Controller
{
    public function view_login(Request $request){

        $path = $this->get_current_company_path();

        $campaigns = Campaign::wherePublished(1)
            ->select(['id', 'image'])
            ->get();

        Session::put('redirect', $request->path());

        // return count($campaigns);
        // return "ok";
        return view("{$path}.login.index", compact('campaigns'));
    }

}
