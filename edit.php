<?php
require_once "";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
    $name = filter_input(INPUT_POST, "name");
    $email = filter_input(INPUT_POST, "email");
    $course = filter_input(INPUT_POST, "course");

    if ($id && $name && $email && $course) {
        $query = "UPDATE students
                  SET name = :name, email = :email, course = :course
                  WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(":id", $id);
        $statement->bindValue(":name", $name);
        $statement->bindValue(":email", $email);
        $statement->bindValue(":course", $course);
        $statement->execute();
        $statement->closeCursor();

        header("Location: index.php");
        exit();
    }
}

$query = "SELECT * FROM students WHERE id = :id";
$statement = $db->prepare($query);
$statement->bindValue(":id", $id);
$statement->execute();
$student = $statement->fetch();
$statement->closeCursor();

include "includes/header.php";
include "includes/nav.php";
?>

<main>
    <h2>Edit Student</h2>

    <form method="post">
        <input type="hidden" name="id" value="<?php echo $student['id']; ?>">

        <label>Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($student['name']); ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($student['email']); ?>" required>

        <label>Course:</label>
        <input type="text" name="course" value="<?php echo htmlspecialchars($student['course']); ?>" required>

        <button type="submit">Update Student</button>
    </form>
</main>

<?php include "includes/footer.php"; ?>