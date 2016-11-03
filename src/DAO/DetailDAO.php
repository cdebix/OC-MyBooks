<?php

namespace MyBooks\DAO;

use MyBooks\Domain\Detail;

class DetailDAO extends DAO
{
    /**
     * @var \MyBooks\DAO\BookDAO
     */
    private $bookDAO;

    public function setBookDAO(BookDAO $bookDAO) {
        $this->bookDAO = $bookDAO;
    }

    /**
     * Return the book summary with all its details (ISBN, title, author).
     *
     * @param integer $bookId The book's id.
     *
     * @return array All the book's details.
     */
    public function findAllByBook($bookId) {
        // The associated book is retrieved only once
        $book = $this->bookDAO->find($bookId);

        // book_id is not selected by the SQL query
        // The book won't be retrieved during domain objet construction
        $sql = "select com_id, com_content, com_author from t_comment where art_id=? order by com_id";
        $result = $this->getDb()->fetchAll($sql, array($bookId));

        // Convert query result to an array of domain objects
        $comments = array();

        foreach ($result as $key => $row) {
          $comment = $this->buildDomainObject($row);
          // The associated article is defined for the constructed comment
          $comment->setArticle($article);
          $comments[$key] = $comment;
        }
        return $comments;
    }

    /**
     * Creates an Comment object based on a DB row.
     *
     * @param array $row The DB row containing Comment data.
     * @return \MicroCMS\Domain\Comment
     */
    protected function buildDomainObject($row) {
        $comment = new Comment();
        $comment->setId($row['com_id']);
        $comment->setContent($row['com_content']);
        $comment->setAuthor($row['com_author']);

        if (array_key_exists('art_id', $row)) {
            // Find and set the associated article
            $articleId = $row['art_id'];
            $article = $this->articleDAO->find($articleId);
            $comment->setArticle($article);
        }

        return $comment;
    }
}
