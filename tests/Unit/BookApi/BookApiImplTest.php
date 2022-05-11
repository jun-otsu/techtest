<?php

namespace Unit\BookApi;

use App\BookApi\BookApiImpl;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Tests\TestCase;

class BookApiImplTest extends TestCase
{
    public function testSearch(): void
    {
        $isbn = '1234567890123';
        $title = 'test title';
        $author = 'polidog';
        $summary = 'test summary';

        $mock = new MockHandler([
            new Response(200, [], json_encode([
                0 => [
                    'title' => $title,
                    'author' => $author,
                    'summary' => $summary,
                ]
            ])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $bookApi = new BookApiImpl($client);
        $bookApiResult = $bookApi->search($isbn);

        $this->assertSame($title, $bookApiResult->getTitle());
        $this->assertSame($isbn, $bookApiResult->getIsbn());
        $this->assertSame($author, $bookApiResult->getAuthor());
        $this->assertSame($summary, $bookApiResult->getSummary());
    }
}
