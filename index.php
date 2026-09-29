<?php

//Database Connection
$host = 'localhost';
$db = 'library_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host; dbname=$db; charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try{
    $pdo = new PDO($dsn,$user,$pass, $options);
}catch(PDOException $e){
    die("Database connection failed" . $e->getMessage());
}

// Session
session_start();

// Determine current section
$section = $_GET['section'] ?? 'books';

// Determine CRUD Operation
$action = $_GET['action'] ?? '';

// Fetch Books
if($section==='books'){
    
    $stmt = $pdo->query("
        SELECT *
        FROM books
        ORDER BY book_id DESC
    ");

    $books = $stmt->fetchAll();
}

// Create Book
if($section=='books' && $action==='create'){

    if($_SERVER['REQUEST_METHOD']==='POST'){

        $bookTitle = trim($_POST['book_title'] ?? '');
        $bookAuthor = trim($_POST['book_author'] ?? '');
        $bookCategory = trim($_POST['book_category'] ?? '');

        if($bookTitle !== '' && $bookAuthor !== '' && $bookCategory !== ''){
            $sql = "
                INSERT INTO books(
                    book_title,
                    book_author,
                    book_category
                )
                VALUES (?,?,?)
            ";

            $stmt=$pdo->prepare($sql);

            $stmt->execute([
                $bookTitle,
                $bookAuthor,
                $bookCategory
            ]);

            header("Location: index.php?section=books");
            exit;
        }
    }
}

// update book
if($section==='books' && $action==='update'){
    $bookId = (int) ($_GET['id'] ?? 0);

   if($_SERVER['REQUEST_METHOD']==='POST'){
    
        $bookTitle = trim($_POST['book_title'] ?? '');
        $bookAuthor = trim($_POST['book_author'] ?? '');
        $bookCategory = trim($_POST['book_category'] ?? '');
    
        $sql=("UPDATE books
                SET book_title = ?,
                    book_author = ?,
                    book_category = ?
                WHERE book_id = ?");

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            $bookTitle,
            $bookAuthor,
            $bookCategory,
            $bookId
        ]);

        header("Location: index.php?section=books");
        exit;

   } 

   // retrieve book info
   $stmt = $pdo->prepare("SELECT * FROM books WHERE book_id = ?");
   $stmt->execute([$bookId]);

   $book = $stmt->fetch();

   if(!$book){
        die("Book not found");
   }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System</title>
</head>
<body>
    <h1>Simple Library System</h1>

    <nav>
        <a href="index.php?section=books">Books</a>
        <a href="index.php?section=students">Students</a>
        <a href="index.php?section=borrow">Borrow</a>
    </nav>

    <hr>

    <?php if($section === 'books'): ?>

        <h1>Books</h1>

        <p>
            <a href="index.php?section=books&action=create">
                Add Book
            </a>
        </p>

        <?php if($action==='create'): ?>

            <h2>Create Book</h2>

            <form method="POST">

                <p>
                    <label>Book Title:</label>
                    <br>
                    <input  type="text"
                            name="book_title"
                            required
                    />
                </p>

                <p>
                    <label>Author:</label>
                    <br>
                    <input  type="text"
                            name="book_author"
                            required
                    />
                </p>

                <p>
                    <label>Category:</label>
                    <br>
                    <input  type="text"
                            name="book_category"
                            required
                    />
                </p>

                <button type="submit">
                    Save
                </button>
                
                <a href="index.php?section=books">
                    Cancel
                </a>
                
            </form>

        <?php elseif($action === 'update'): ?>

            <h2>Update Book Info</h2>

            <form method="POST">

                <p>
                    <label>Book Title:</label>
                    <br>
                    <input  type="text"
                            name="book_title"
                            value="<?= htmlspecialchars($book['book_title']) ?>"
                            required
                    />
                </p>

                <p>
                    <label>Author:</label>
                    <br>
                    <input  type="text"
                            name="book_author"
                            value="<?= htmlspecialchars($book['book_author']) ?>"
                            required
                    />
                </p>

                <p>
                    <label>Category:</label>
                    <br>
                    <input  type="text"
                            name="book_category"
                            value="<?= htmlspecialchars($book['book_category']) ?>"
                            required
                    />
                </p>

                <button type="submit">
                    Update
                </button>
                
                <a href="index.php?section=books">
                    Cancel
                </a>
                
            </form>

            <h2><?= htmlspecialchars($book['book_title']) ?></h2>

        <?php else: ?>

            <table>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Created at</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach($books as $book): ?>

                        <tr>

                            <td>
                                <?= htmlspecialchars($book['book_id']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($book['book_title']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($book['book_author']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($book['book_category']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($book['book_created_at']) ?>
                            </td>

                            <td>

                                <a href="index.php?section=books&action=update&id=<?= htmlspecialchars($book['book_id']) ?>">
                                    Edit
                                </a>
                                
                                <a href="index.php?section=books&action=delete&id=<?= htmlspecialchars($book['book_id']) ?>" onclick="return confirm('Are you sure you want to delete this book?');">
                                    Delete
                                </a>

                            </td>

                        </tr>

                    <?php endforeach ?>

                </tbody>

            </table>
        
        <?php endif; ?>

    <?php endif; ?>


    <?php if($section === 'students'): ?>

        <h1>Students</h1>

    <?php endif; ?>


    <?php if($section === 'borrow'): ?>

        <h1>Borrow</h1>

    <?php endif; ?>

    
</body>
</html>

