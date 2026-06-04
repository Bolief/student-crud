<?php
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_input(INPUT_POST, "name");
    $email = filter_input(INPUT_POST, "email");
    $course = filter_input(INPUT_POST, "course");

    if ($name && $email && $course) {
        $query = "INSERT INTO students (name, email, course)
                  VALUES (:name, :email, :course)";
        $statement = $db->prepare($query);
        $statement->bindValue(":name", $name);
        $statement->bindValue(":email", $email);
        $statement->bindValue(":course", $course);
        $statement->execute();
        $statement->closeCursor();

        header("Location: index.php");
        exit();
    }
}

include "includes/header.php";
include "includes/nav.php";
?>

<main>
    <h2>Add Student</h2>

    <form method="post">
        <label>Name:</label>
        <input type="text" name="name" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Course:</label>
        <input type="text" name="course" required>

        <button type="submit">Add Student</button>
    </form>
</main>

<?php include "includes/footer.php"; ?>