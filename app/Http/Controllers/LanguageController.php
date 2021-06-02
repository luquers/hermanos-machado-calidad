<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function swap($locale){
        // TODO introducir los idiomas en base de datos
        $availLocale=['en'=>'en', 'es' => 'es'];

        if(array_key_exists($locale,$availLocale)){
            session()->put('locale',$locale);
        }

        return redirect()->back();
    }
}
