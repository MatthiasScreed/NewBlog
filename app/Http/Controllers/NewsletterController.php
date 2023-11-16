<?php

namespace App\Http\Controllers;

use App\Services\Newsletters;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function __invoke(Newsletters $newsletter)
    {
        request()->validate(['email' => 'required|email']);

        try {

            $newsletter->subscribe(request('email'));

        } catch (\Exception $e) {
            \Illuminate\Validation\ValidationException::withMessages([
                'email' => 'This email could not be added'
            ]);
        }


        return redirect('/')->with('success', 'Your are now signed up for our newsletter!');
    }
}
