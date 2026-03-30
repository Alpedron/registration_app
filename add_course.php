<?php include 'header.php'; ?>

<h2>Add Course</h2>

<a href="courses.php">Back to Courses</a>
<br><br>

<form action="add_course_action.php" method="post">
    <label>Course Code:</label>
    <input type="text" name="course_code"><br><br>

    <label>Course Name:</label>
    <input type="text" name="course_name"><br><br>

    <label>Credits:</label>
    <input type="number" name="credits"><br><br>

    <input type="submit" value="Add Course">
</form>

<?php include 'footer.php'; ?>
