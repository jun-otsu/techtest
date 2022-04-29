<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Book;

class BookController extends Controller
{
	public function index()
	{
		$books = Book::paginate(9);
		return view('index', compact('books'));
	}

	public function search(Request $request)
	{
		$client = new Client();
		$response = $client->request('GET','https://api.openbd.jp/v1/get?isbn=' . $request->isbn);
		$return = json_decode($response->getBody(), true);
		$book = $return[0]['summary'];
		return view('search', compact('book'));
	}
}
