<?php
require_once('models/database.php');

$course_id = $_POST['course_id'];
$course_code = $_POST['course_code'];
$course_name = $_POST['course_name'];
$credits = $_POST['credits'];

$query = 'UPDATE Course
          SET course_code = :course_code,
              course_name = :course_name,
              credits = :credits
          WHERE course_id = :course_id';

$statement = $database->prepare($query);
$statement->bindValue(':course_id', $course_id);
$statement->bindValue(':course_code', $course_code);
$statement->bindValue(':course_name', $course_name);
$statement->bindValue(':credits', $credits);
$statement->execute();
$statement->closeCursor();

header('Location: courses.php');
?>