<?php

namespace MyBooks\Domain;

class Book
{
  /**
   * Book id.
   *
   * @var integer
   */
  private $id;

  /**
   * Book title.
   *
   * @var string
   */
  private $title;

  /**
   * Book summary.
   *
   * @var string
   */
  private $summary;

  /**
   * Book ISBN
   * @var string
   */
  private $isbn;

  /**
   * Author.
   *
   * @var \MyBooks\Domain\Author
   */
  private $author;

  public function getId() {
      return $this->id;
  }

  public function setId($id) {
      $this->id = $id;
  }

  public function getTitle() {
      return $this->title;
  }

  public function setTitle($title) {
      $this->title = $title;
  }

  public function getSummary() {
      return $this->summary;
  }

  public function setSummary($summary) {
      $this->summary = $summary;
  }

  public function getIsbn() {
      return $this->isbn;
  }

  public function setIsbn($isbn) {
      $this->isbn = $isbn;
  }

  public function getAuthor() {
    return $this->author;
  }

  public function setAuthor($author) {
    $this->author = $author;
  }
}
