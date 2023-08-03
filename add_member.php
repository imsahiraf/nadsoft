<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $name = $_POST['nameField'];
        $parentId = $_POST['parentDropdown'];

        // Insert the new member into the database
        $query = "INSERT INTO members (name, parentId) VALUES (:name, :parentId)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':parentId', $parentId);
        $stmt->execute();

        // Get the newly inserted member's ID
        $newMemberId = $db->lastInsertId();

        // Fetch the details of the newly inserted member
        $query = "SELECT * FROM members WHERE id = :newMemberId";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':newMemberId', $newMemberId);
        $stmt->execute();
        $newMember = $stmt->fetch(PDO::FETCH_ASSOC);

        // Return the new member's details in JSON format
        header('Content-Type: application/json');
        echo json_encode($newMember);
    } catch (PDOException $e) {
        // Handle the exception, e.g., log the error or show a user-friendly message
        header('HTTP/1.1 500 Internal Server Error');
        echo "Error adding member: " . $e->getMessage();
    }
}
