<?php
namespace App\BookApi;

class BookApiResult
{
    /**
     * @var string
     */
    private $isbn;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $summary;

    /**
     * @var string
     */
    private $author;

    /**
     * @var string
     */
    private $registeredAt;

    /**
     * @param string $isbn
     * @param string $title
     * @param string $summary
     * @param string $author
     * @param string $registeredAt
     */
    public function __construct(string $isbn, string $title, string $summary, string $author, string $registeredAt)
    {
        $this->isbn = $isbn;
        $this->title = $title;
        $this->summary = $summary;
        $this->author = $author;
        $this->registeredAt = $registeredAt;
    }

    /**
     * @return string
     */
    public function getIsbn(): string
    {
        return $this->isbn;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getRegisteredAt(): string
    {
        return $this->registeredAt;
    }
}
