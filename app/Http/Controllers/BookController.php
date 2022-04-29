<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class BookController extends Controller
{
	public function search(Request $request)
	{
		$client = new Client();
		$response = $client->request('GET','https://api.openbd.jp/v1/get?isbn=' . $request->isbn);
		$return = json_decode($response->getBody(), true);
		$book = $return[0]['summary'];
		return view('search', compact('book'));
	}
}
