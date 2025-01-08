<?php
include 'koneksi.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$bookId = isset($_GET['book_id']) ? $_GET['book_id'] : '';
$searchAll = isset($_GET['search_all']) ? true : false;

if (!empty($search)) {
    $query = "SELECT * FROM books WHERE title LIKE '%$search%' OR author LIKE '%$search%' LIMIT 10";
    $result = $conn->query($query);

    $books = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $books[] = [
                'id' => $row['id'],
                'title' => $row['title'],
                'author' => $row['author'],
                'image' => $row['image']
            ];
        }
    }
    echo json_encode($books);
} elseif (!empty($bookId)) {
    $query = "SELECT * FROM books WHERE id = $bookId";
    $result = $conn->query($query);
    $book = $result->fetch_assoc();

    if ($book) {
        echo json_encode($book);
    } else {
        echo json_encode([]);
    }
} elseif ($searchAll) {
    $query = "SELECT * FROM books";
    $result = $conn->query($query);

    $books = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $books[] = [
                'id' => $row['id'],
                'title' => $row['title'],
                'author' => $row['author'],
                'image' => $row['image']
            ];
        }
    }
    echo json_encode($books);
} else {
    echo json_encode([]);
}
?>
