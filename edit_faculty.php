<?php
require_once('models/database.php');

$faculty_id = filter_input(INPUT_GET, 'faculty_id', FILTER_VALIDATE_INT);

$query = 'SELECT * FROM Faculty
          WHERE faculty_id = :faculty_id';

$statement = $database->prepare($query);
$statement->bindValue(':faculty_id', $faculty_id);
$statement->execute();
$faculty = $statement->fetch();
$statement->closeCursor();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Faculty</title>
</head>
<body>

<h2>Edit Faculty</h2>

<a href="faculty.php">Back to Faculty</a>
<br><br>

<form action="edit_faculty_action.php" method="post">
    <input type="hidden" name="faculty_id"
           value="<?php echo $faculty['faculty_id']; ?>">

    <label>First Name:</label>
    <input type="text" name="first_name"
           value="<?php echo $faculty['first_name']; ?>"><br><br>

    <label>Last Name:</label>
    <input type="text" name="last_name"
           value="<?php echo $faculty['last_name']; ?>"><br><br>

    <label>Email:</label>
    <input type="text" name="email"
           value="<?php echo $faculty['email']; ?>"><br><br>

    <label>Department:</label>
    <input type="text" name="department"
           value="<?php echo $faculty['department']; ?>"><br><br>

    <input type="submit" value="Update Faculty">
</form>

</body>
</html>