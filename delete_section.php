<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('models/database.php');

try {
    $section_id = filter_input(INPUT_POST, 'section_id', FILTER_VALIDATE_INT);

    $query = 'DELETE FROM Section
              WHERE section_id = :section_id';

    $statement = $database->prepare($query);
    $statement->bindValue(':section_id', $section_id);
    $statement->execute();
    $statement->closeCursor();

    header('Location: section.php');
    exit();
} catch (PDOException $e) {
    echo 'Database error: ' . $e->getMessage();
}
?>