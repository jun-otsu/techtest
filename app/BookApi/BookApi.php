<?php
namespace App\BookApi;

interface BookApi
{
    /**
     * @throws BookApiException
     */
    public function search(string $isbn): BookApiResult;
}
