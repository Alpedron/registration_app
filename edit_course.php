<?php
require_once('models/database.php');

$course_id = filter_input(INPUT_GET, 'course_id', FILTER_VALIDATE_INT);

$query = 'SELECT * FROM Course
          WHERE course_id = :course_id';

$statement = $database->prepare($query);
$statement->bindValue(':course_id', $course_id);
$statement->execute();
$course = $statement->fetch();
$statement->closeCursor();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Course</title>
</head>
<body>

<h2>Edit Course</h2>

<a href="courses.php">Back to Courses</a>
<br><br>

<form action="edit_course_action.php" method="post">
    <input type="hidden" name="course_id"
           value="<?php echo $course['course_id']; ?>">

    <label>Course Code:</label>
    <input type="text" name="course_code"
           value="<?php echo $course['course_code']; ?>"><br><br>

    <label>Course Name:</label>
    <input type="text" name="course_name"
           value="<?php echo $course['course_name']; ?>"><br><br>

    <label>Credits:</label>
    <input type="number" name="credits"
           value="<?php echo $course['credits']; ?>"><br><br>

    <input type="submit" value="Update Course">
</form>

</body>
</html>