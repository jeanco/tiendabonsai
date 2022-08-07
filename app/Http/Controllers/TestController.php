<?php

namespace App\Http\Controllers;

use App\User;

class TestController extends Controller
{
    public function users()
    {
        $users = User::all();
        return view('test.datatable')->with('users', $users);
    }

    public function watch_view_email()
    {
        return view('test.email-boyfriends');
    }

    public function watchEmailCustomerOrder()
    {
		return view('test.email_order-customer');
    }

}
