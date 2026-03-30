<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('models/database.php');

try {
    $enrollment_id = filter_input(INPUT_POST, 'enrollment_id', FILTER_VALIDATE_INT);

    $query = 'DELETE FROM Enrollment
              WHERE enrollment_id = :enrollment_id';

    $statement = $database->prepare($query);
    $statement->bindValue(':enrollment_id', $enrollment_id);
    $statement->execute();
    $statement->closeCursor();

    header('Location: index.php#enrollments');
    exit();

} catch (PDOException $e) {
    echo 'Database error: ' . $e->getMessage();
}
?>