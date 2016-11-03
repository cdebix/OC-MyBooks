<?php
/**
 * Front controller : calls the model, receives the data, launches the view.
 */
require 'model.php';
$books = getBooks();
require 'view.php';
