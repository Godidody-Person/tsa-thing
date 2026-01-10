<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Gemini\Laravel\Facades\Gemini;

class AppController extends Controller
{
    function send(Request $request){
        $message = $request->input('message');

        $answer = $this->query($message);

        return response()->json([
            'message' => $message,
            'answer' => $answer,
        ]);
    }

    public function query($query){
        $response = Gemini::generativeModel('gemma-3n-e2b-it')->generateContent($query);
        $text = $response->text();

        return $text;
    }
}
