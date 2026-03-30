<?php
require_once('models/database.php');

$query = 'SELECT * FROM Course ORDER BY course_id';
$statement = $database->prepare($query);
$statement->execute();
$courses = $statement->fetchAll();
$statement->closeCursor();
?>

<?php include 'header.php'; ?>

<h2>Course List</h2>
<a href="add_course.php" class="btn">Add Course</a>
<br><br>



<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Code</th>
        <th>Name</th>
        <th>Credits</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php foreach ($courses as $course) : ?>
        <tr>
            <td><?php echo $course['course_id']; ?></td>
            <td><?php echo $course['course_code']; ?></td>
            <td><?php echo $course['course_name']; ?></td>
            <td><?php echo $course['credits']; ?></td>

            <td>
                <form action="edit_course.php" method="get">
                    <input type="hidden" name="course_id"
                           value="<?php echo $course['course_id']; ?>">
                    <input type="submit" value="Edit">
                </form>
            </td>

            <td>
                <form action="delete_course.php" method="post">
                    <input type="hidden" name="course_id"
                           value="<?php echo $course['course_id']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>

</table>


<br><br>
<h2>Add Course</h2>
<form action="add_course_action.php" method="post">
    <label>Code:</label>
    <input type="text" name="course_code" required><br><br>

    <label>Name:</label>
    <input type="text" name="course_name" required><br><br>

    <label>Credits:</label>
    <input type="number" name="credits" min="0" required><br><br>

    <input type="submit" value="Add Course"><br><br>
</form>


<br><br>
<h2>Update Course</h2>
<form action="edit_course_action.php" method="post">
    <label>Course:</label>
    <select name="course_id" required>
        <option value="">Select Course</option>
        <?php foreach ($courses as $course) : ?>
            <option value="<?php echo $course['course_id']; ?>">
                <?php echo $course['course_code'] . ' - ' . $course['course_name']; ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>New Code:</label>
    <input type="text" name="course_code" required><br><br>

    <label>New Name:</label>
    <input type="text" name="course_name" required><br><br>

    <label>New Credits:</label>
    <input type="number" name="credits" min="0" required><br><br>

    <input type="submit" value="Update Course"><br><br>
</form>


<br><br>
<h2>Delete Course</h2>
<form action="delete_course.php" method="post">
    <label>Course:</label>
    <select name="course_id" required>
        <option value="">Select Course</option>
        <?php foreach ($courses as $course) : ?>
            <option value="<?php echo $course['course_id']; ?>">
                <?php echo $course['course_code'] . ' - ' . $course['course_name']; ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <input type="submit" value="Delete Course"><br><br>
</form>

<?php include 'footer.php'; ?>