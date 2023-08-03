<?php
include('db.php');

class Member
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllMembers()
{
    try {
        // Retrieve all members from the database
        $query = "SELECT * FROM members";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $members = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $members;
    } catch (PDOException $e) {
        // Handle the exception, e.g., log the error or show a user-friendly message
        die("Error fetching members: " . $e->getMessage());
    }
}

}
?>
