<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

  public function index()
  {
    // get response from API
    $json = json_decode(file_get_contents('https://dog.ceo/api/breeds/list/all'));
    $response = $json->message;
    // return view and response
    return view('welcome' , compact('response'));
  }
  public function breed(Request $request)
  {
    // stroe breed from request
    $breed = $request->breed;
    // generate URL
    $url = 'https://dog.ceo/api/breed/'.$breed.'/images/random';
    // get response from API
    $json = json_decode(file_get_contents($url));
    $response = $json->message;
    // return view and response
    return view('breed', compact('response' , 'breed'));
  }
}
