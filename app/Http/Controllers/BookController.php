<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Book;
use App\Http\Requests\BookRegisterRequest;

class BookController extends Controller
{
	public function index()
	{
		$books = Book::paginate(9);
		return view('index', compact('books'));
	}

	public function search(Request $request)
	{
		try {
			$client = new Client();
			$response = $client->request('GET','https://api.openbd.jp/v1/get?isbn=' . $request->isbn);
		} catch (\GuzzleHttp\Exception\ConnectException $e) {
			return redirect()->route('book.index')->with('ただいま書籍検索に不具合が生じております。しばらくしてから再度お試しください。');
		}
		$return = json_decode($response->getBody(), true);
		$book = $return[0]['summary'];
		return view('search', compact('book'));
	}

	public function store(BookRegisterRequest $request)
	{
		try {
			$client = new Client();
			$response = $client->request('GET','https://api.openbd.jp/v1/get?isbn='.$request->isbn);
		} catch (\GuzzleHttp\Exception\ConnectException $e) {
			return redirect()->route('book.index')->with('ただいま書籍検索に不具合が生じております。しばらくしてから再度お試しください。');
		}
		$return = json_decode($response->getBody(), true);
		$book = $return[0]['summary'];
		if (!$book) {
			return redirect()->route('book.search')->with('error', __('common.message.register_failed'));
		}
		Book::create(['isbn' => $book['isbn'], 'title' => $book['title'], 'author' => $book['author'], 'registered_at' => date('Y-m-d H:i:s')]);
		return redirect()->route('book.index')->with('success', __('common.message.register_success'));
	}
}
