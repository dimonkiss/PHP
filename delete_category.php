<?php
global $pdo;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include database connection
    include $_SERVER['DOCUMENT_ROOT'] . "/config/connection-database.php";

    // Get category ID from the POST data
    $id = $_POST['id'];

    // Perform the deletion query
    $sql = "DELETE FROM categories WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    try {
        $stmt->execute();
        // Return success response if needed
        echo json_encode(['success' => true]);
        exit;
    } catch (PDOException $e) {
        // Handle the error and return an error response
        echo json_encode(['error' => 'Error deleting category']);
        exit;
    }
}
?>

