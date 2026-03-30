<?php
require_once('models/database.php');

$course_code = $_POST['course_code'];
$course_name = $_POST['course_name'];
$credits = $_POST['credits'];

$query = 'INSERT INTO Course
            (course_code, course_name, credits)
          VALUES
            (:course_code, :course_name, :credits)';

$statement = $database->prepare($query);
$statement->bindValue(':course_code', $course_code);
$statement->bindValue(':course_name', $course_name);
$statement->bindValue(':credits', $credits);
$statement->execute();
$statement->closeCursor();

header('Location: courses.php');
?>