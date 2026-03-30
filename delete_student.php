<?php
require_once('models/database.php');

$student_id = filter_input(INPUT_POST, 'student_id', FILTER_VALIDATE_INT);

$query = 'DELETE FROM Student
          WHERE student_id = :student_id';

$statement = $database->prepare($query);
$statement->bindValue(':student_id', $student_id);
$statement->execute();
$statement->closeCursor();

header('Location: student.php');
?>