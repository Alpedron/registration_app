<?php
require_once('models/database.php');

$faculty_id = filter_input(INPUT_POST, 'faculty_id', FILTER_VALIDATE_INT);

$query = 'DELETE FROM Faculty
          WHERE faculty_id = :faculty_id';

$statement = $database->prepare($query);
$statement->bindValue(':faculty_id', $faculty_id);
$statement->execute();
$statement->closeCursor();

header('Location: faculty.php');
?>