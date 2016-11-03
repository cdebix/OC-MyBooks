<?php

namespace MyBooks\DAO;

use MyBooks\Domain\Book;

class BookDAO extends DAO
{
    /**
     * Return a list of all books, sorted by author's last name, first name, book title.
     *
     * @return array A list of all books.
     */
    public function findAll() {
        $sql = "SELECT * FROM book INNER JOIN author ON book.auth_id = author.auth_id ORDER BY auth_last_name, auth_first_name, book_title";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $books = array();
        foreach ($result as $key => $row) {
          $books[$key] = $this->buildDomainObject($row);
        }
        return $books;
    }

    /**
     * Returns a book matching the supplied id.
     *
     * @param integer $id
     *
     * @return \MyBooks\Domain\Book|throws an exception if no matching article is found
     */
    public function find($id) {
        $sql = "SELECT * FROM book INNER JOIN author ON book.auth_id = author.auth_id WHERE book_id = ? LIMIT 1";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No book matching this id " . $id);
    }

    /**
     * Creates a Book object based on a DB row.
     *
     * @param array $row The DB row containing Book data.
     * @return \MyBooks\Domain\Book
     */
    protected function buildDomainObject($row) {
        $book = new Book();
        $book->setId($row['book_id']);
        $book->setTitle($row['book_title']);
        $book->setSummary($row['book_summary']);
        $book->setIsbn($row['book_isbn']);
        return $book;
    }
}
