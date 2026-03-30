<?php
require_once('models/database.php');

$query = 'SELECT * FROM Student ORDER BY student_id';
$statement = $database->prepare($query);
$statement->execute();
$students = $statement->fetchAll();
$statement->closeCursor();
?>

<?php include 'header.php'; ?>

<h2>Student List</h2>
<a href="add_student.php" class="btn">Add Student</a>
<br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Program</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php foreach ($students as $student) : ?>
        <tr>
            <td><?php echo $student['student_id']; ?></td>
            <td><?php echo $student['first_name']; ?></td>
            <td><?php echo $student['last_name']; ?></td>
            <td><?php echo $student['email']; ?></td>
            <td><?php echo $student['program']; ?></td>

            <td>
                <form action="edit_student.php" method="get">
                    <input type="hidden" name="student_id"
                           value="<?php echo $student['student_id']; ?>">
                    <input type="submit" value="Edit">
                </form>
            </td>

            <td>
                <form action="delete_student.php" method="post">
                    <input type="hidden" name="student_id"
                           value="<?php echo $student['student_id']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

<br><br>
<h2>Add Student</h2>
<form action="add_student_action.php" method="post">
    <label>First Name:</label>
    <input type="text" name="first_name" required><br><br>

    <label>Last Name:</label>
    <input type="text" name="last_name" required><br><br>

    <label>Email:</label>
    <input type="text" name="email" required><br><br>

    <label>Program:</label>
    <input type="text" name="program" required><br><br>

    <input type="submit" value="Add Student"><br><br>
</form>

<br><br>
<h2>Update Student</h2>
<form action="edit_student_action.php" method="post">
    <label>Student:</label>
    <select name="student_id" required>
        <option value="">Select Student</option>
        <?php foreach ($students as $student) : ?>
            <option value="<?php echo $student['student_id']; ?>">
                <?php echo $student['first_name'] . ' ' . $student['last_name']; ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>New First Name:</label>
    <input type="text" name="first_name" required><br><br>

    <label>New Last Name:</label>
    <input type="text" name="last_name" required><br><br>

    <label>New Email:</label>
    <input type="text" name="email" required><br><br>

    <label>New Program:</label>
    <input type="text" name="program" required><br><br>

    <input type="submit" value="Update Student"><br><br>
</form>

<br><br>
<h2>Delete Student</h2>
<form action="delete_student.php" method="post">
    <label>Student:</label>
    <select name="student_id" required>
        <option value="">Select Student</option>
        <?php foreach ($students as $student) : ?>
            <option value="<?php echo $student['student_id']; ?>">
                <?php echo $student['first_name'] . ' ' . $student['last_name']; ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <input type="submit" value="Delete Student"><br><br>
</form>

<?php include 'footer.php'; ?>