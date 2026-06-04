<?php
require_once "";
include "includes/header.php";
include "includes/nav.php";

$query = "SELECT * FROM students ORDER BY id DESC";
$statement = $db->prepare($query);
$statement->execute();
$students = $statement->fetchAll();
$statement->closeCursor();
?>

<main>
    <h2>Student List</h2>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($students as $student) : ?>
            <tr>
                <td><?php echo htmlspecialchars($student['name']); ?></td>
                <td><?php echo htmlspecialchars($student['email']); ?></td>
                <td><?php echo htmlspecialchars($student['course']); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $student['id']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $student['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>

<?php include "includes/footer.php"; ?>