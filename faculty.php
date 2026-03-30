<?php
require_once('models/database.php');

$query = 'SELECT * FROM Faculty ORDER BY faculty_id';
$statement = $database->prepare($query);
$statement->execute();
$faculty_members = $statement->fetchAll();
$statement->closeCursor();
?>

<?php include 'header.php'; ?>

<h2>Faculty List</h2>
<a href="add_faculty.php" class="btn">Add Faculty</a>
<br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Department</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php foreach ($faculty_members as $faculty) : ?>
        <tr>
            <td><?php echo $faculty['faculty_id']; ?></td>
            <td><?php echo $faculty['first_name']; ?></td>
            <td><?php echo $faculty['last_name']; ?></td>
            <td><?php echo $faculty['email']; ?></td>
            <td><?php echo $faculty['department']; ?></td>

            <td>
                <form action="edit_faculty.php" method="get">
                    <input type="hidden" name="faculty_id"
                           value="<?php echo $faculty['faculty_id']; ?>">
                    <input type="submit" value="Edit">
                </form>
            </td>

            <td>
                <form action="delete_faculty.php" method="post">
                    <input type="hidden" name="faculty_id"
                           value="<?php echo $faculty['faculty_id']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

<br><br>
<h2>Add Faculty</h2>
<form action="add_faculty_action.php" method="post">
    <label>First Name:</label>
    <input type="text" name="first_name" required><br><br>

    <label>Last Name:</label>
    <input type="text" name="last_name" required><br><br>

    <label>Email:</label>
    <input type="text" name="email" required><br><br>

    <label>Department:</label>
    <input type="text" name="department" required><br><br>

    <input type="submit" value="Add Faculty"><br><br>
</form>

<br><br>
<h2>Update Faculty</h2>
<form action="edit_faculty_action.php" method="post">
    <label>Faculty:</label>
    <select name="faculty_id" required>
        <option value="">Select Faculty</option>
        <?php foreach ($faculty_members as $faculty) : ?>
            <option value="<?php echo $faculty['faculty_id']; ?>">
                <?php echo $faculty['first_name'] . ' ' . $faculty['last_name']; ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>New First Name:</label>
    <input type="text" name="first_name" required><br><br>

    <label>New Last Name:</label>
    <input type="text" name="last_name" required><br><br>

    <label>New Email:</label>
    <input type="text" name="email" required><br><br>

    <label>New Department:</label>
    <input type="text" name="department" required><br><br>

    <input type="submit" value="Update Faculty"><br><br>
</form>

<br><br>
<h2>Delete Faculty</h2>
<form action="delete_faculty.php" method="post">
    <label>Faculty:</label>
    <select name="faculty_id" required>
        <option value="">Select Faculty</option>
        <?php foreach ($faculty_members as $faculty) : ?>
            <option value="<?php echo $faculty['faculty_id']; ?>">
                <?php echo $faculty['first_name'] . ' ' . $faculty['last_name']; ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <input type="submit" value="Delete Faculty"><br><br>
</form>

<?php include 'footer.php'; ?>