<?php include 'header.php'; ?>

<h2>Add Faculty</h2>

<a href="faculty.php">Back to Faculty</a>
<br><br>

<form action="add_faculty_action.php" method="post">
    <label>First Name:</label>
    <input type="text" name="first_name"><br><br>

    <label>Last Name:</label>
    <input type="text" name="last_name"><br><br>

    <label>Email:</label>
    <input type="text" name="email"><br><br>

    <label>Department:</label>
    <input type="text" name="department"><br><br>

    <input type="submit" value="Add Faculty">
</form>

<?php include 'footer.php'; ?>