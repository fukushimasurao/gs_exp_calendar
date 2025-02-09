<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Gemini\Laravel\Facades\Gemini;

class GeminiController extends Controller
{
//    public function generateResponse()
//    {
//        $result = Gemini::geminiPro()->generateContent('こんにちは。椎茸を利用したおすすめのレシピ教えてください。');
//        $markdownText = $result->text();
//
//        // Blade に渡すために、HTML に変換
//        $html = Str::markdown($markdownText);
//
//        // Blade にデータを渡す
//        return view('gemini-response', ['response' => $html]);
//    }

//    public function generateResponse(Request $request)
//    {
//        $query = $request->input('ai_query');
//        $result = Gemini::geminiPro()->generateContent($query);
//        $markdownText = $result->text();
//
//        // Convert Markdown to HTML
//        $html = Str::markdown($markdownText);
//
//        // Pass data to the Blade view
//        return view('gemini-response', ['response' => $html]);
//    }

    public function showConsultPage()
    {
        return view('ai-consult');
    }

    public function generateResponse(Request $request)
    {
        $query = $request->input('ai_query');
        $result = Gemini::geminiPro()->generateContent($query);
        $markdownText = $result->text();

        // Convert Markdown to HTML
        $html = Str::markdown($markdownText);

        // Pass data to the Blade view
        return view('ai-consult', ['response' => $html]);
    }
}
