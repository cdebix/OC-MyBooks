<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <link href="mybooks.css" rel="stylesheet" />
    <title>MyBooks - Home</title>
</head>
<body>
    <header>
        <h1>My Books</h1>
    </header>
    <?php foreach ($books as $book): ?>
    <article>
        <h2><?php echo $book['book_title'] ?></h2>
        <p><?php echo $book['book_summary'] ?></p>
    </article>
    <?php endforeach ?>
    <footer class="footer">
        <strong>MyBooks</strong> is a student project made with PHP, Silex, Twig and Bootstrap.
    </footer>
</body>
</html>
