<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\contacts;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $active = 'Message';
        $messages = contacts::paginate(10);

        return view('admin.contact.index', compact('active', 'messages'));
    }

    public function show($id){
        $active = 'Message';
        $message = contacts::find($id);

        return view('admin.contact.show', compact('active', 'message'));
    }
}