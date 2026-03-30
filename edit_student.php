<?php
require_once('models/database.php');

$student_id = filter_input(INPUT_GET, 'student_id', FILTER_VALIDATE_INT);

$query = 'SELECT * FROM Student
          WHERE student_id = :student_id';

$statement = $database->prepare($query);
$statement->bindValue(':student_id', $student_id);
$statement->execute();
$student = $statement->fetch();
$statement->closeCursor();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>

<h2>Edit Student</h2>

<a href="student.php">Back to Students</a>
<br><br>

<form action="edit_student_action.php" method="post">
    <input type="hidden" name="student_id"
           value="<?php echo $student['student_id']; ?>">

    <label>First Name:</label>
    <input type="text" name="first_name"
           value="<?php echo $student['first_name']; ?>"><br><br>

    <label>Last Name:</label>
    <input type="text" name="last_name"
           value="<?php echo $student['last_name']; ?>"><br><br>

    <label>Email:</label>
    <input type="text" name="email"
           value="<?php echo $student['email']; ?>"><br><br>

    <label>Program:</label>
    <input type="text" name="program"
           value="<?php echo $student['program']; ?>"><br><br>

    <input type="submit" value="Update Student">
</form>

</body>
</html>