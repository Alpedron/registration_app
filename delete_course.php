<?php
require_once('models/database.php');

$course_id = filter_input(INPUT_POST, 'course_id', FILTER_VALIDATE_INT);

$query = 'DELETE FROM Course
          WHERE course_id = :course_id';

$statement = $database->prepare($query);
$statement->bindValue(':course_id', $course_id);
$statement->execute();
$statement->closeCursor();

header('Location: courses.php');
?>