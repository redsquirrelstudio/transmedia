<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;

class NewsletterController extends Controller
{
    public function subscribe(Request $request): int
    {
        $request->validate([
            'email' => 'required',
            'name' => 'required',
        ]);
        Newsletter::subscribe($request->get('email'), ['FNAME' => $request->get('name')]);
        return http_response_code(200);
    }
}
