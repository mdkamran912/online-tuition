<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function messagesbytutor(){

        return view('tutor.message');
    }
}
