<?php include 'header.php'; ?>

<h2>Add Student</h2>

<a href="student.php">Back to Students</a>
<br><br>

<form action="add_student_action.php" method="post">
    <label>First Name:</label>
    <input type="text" name="first_name"><br><br>

    <label>Last Name:</label>
    <input type="text" name="last_name"><br><br>

    <label>Email:</label>
    <input type="text" name="email"><br><br>

    <label>Program:</label>
    <input type="text" name="program"><br><br>

    <input type="submit" value="Add Student">
</form>

<?php include 'footer.php'; ?>