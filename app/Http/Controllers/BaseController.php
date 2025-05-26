<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class BaseController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->get();
        return view('index', compact('messages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required|min:5',
        ]);

        Message::create($validated);
        return redirect('/')->with('success', 'Message sent!');
    }
}

