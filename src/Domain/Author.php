<?php
namespace MyBooks\Domain;

class Author
{
  /**
     * Author's id.
     *
     * @var integer
     */
    private $id;

    /**
     * Author's first name.
     *
     * @var string
     */
    private $fname;

    /**
     * Author's last name.
     *
     * @var string
     */
    private $lname;


    public function getId() {
      return $this->id;
    }

    public function setId($id) {
      $this->id = $id;
    }

    public function getFname() {
      return $this->fname;
    }

    public function setFname($fname) {
      $this->fname = $fname;
    }

    public function getLname() {
      return $this->lname;
    }

    public function setLname($lname) {
      $this->lname = $lname;
    }
}
