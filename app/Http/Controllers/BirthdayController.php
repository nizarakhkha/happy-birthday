<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BirthdayController extends Controller
{
    public function index()
    {
        $birthdayPerson = "swety";
        $birthdayText = "I don’t know what to write to let you know what you mean to me…
you were, and you still are, someone very special in my heart.
No matter how things change or how time passes,
there’s always a part of me that keeps you with it.
I wish you happiness, peace, and everything beautiful in life…
because you truly deserve it.💫.";

        return view('birthday', compact('birthdayPerson', 'birthdayText'));
    }
}