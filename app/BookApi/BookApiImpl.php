<?php
namespace App\BookApi;

use GuzzleHttp\Client;
use Psr\Http\Client\ClientExceptionInterface;

class BookApiImpl implements BookApi
{
    /**
     * @var Client
     */
    private $client;

    public function __construct(Client  $client)
    {
        $this->client = $client;
    }

    public function search(string $isbn): BookApiResult
    {
        try {
            $response = $this->client->get('https://www.googleapis.com/books/v1/volumes?q=isbn:' . $isbn);
            $data = json_decode($response->getBody()->getContents(), true);

            return new BookApiResult($isbn, $data[0]['title'], $data[ ]['summary'], $data[0]['author'], date('Y-m-d H:i:s'));
        } catch (ClientExceptionInterface $e) {
            throw new BookApiException('book api error', 0, $e);
        }
    }
}
