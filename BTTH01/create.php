<?php
session_start();                                                         // create session 

$errors = ['id' => '', 'name' => '', 'age' => '', 'grade' => ''];
$errors['id'] = $_SESSION['error_id'];
$errors['name'] = $_SESSION['error_name'];
$errors['age'] = $_SESSION['error_age'];
$errors['grade'] = $_SESSION['error_grade'];

session_unset();                                                         // delete all variables stored in session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="container bg-warning mt-5 w-50 p-3">
        <h1 class="text-center">Add Student</h1>
        <form action="save.php" method="post">
            <!-- id -->
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" name="id" id="id" class="form-control" value="<?= $student['id'] ?>">
            </div>
            <!-- id error -->
            <div class="error text-end">
                <span><?= $errors['id'] ?></span>
            </div>
            <!-- name -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?= $student['name'] ?>">
            </div>
            <!-- name error -->
            <div class="error text-end">
                <span><?= $errors['name'] ?></span>
            </div>
            <!-- age -->
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="text" name="age" id="age" class="form-control" value="<?= $student['age'] ?>">
            </div>
            <!-- age error -->
            <div class="error text-end">
                <span><?= $errors['age'] ?></span>
            </div>
            <!-- grade -->
            <div class="mb-3">
                <label for="grade" class="form-label">Grade</label>
                <input type="text" name="grade" id="grade" class="form-control" value="<?= $student['grade'] ?>">
            </div>
            <!-- grade error -->
            <div class="error text-end">
                <span><?= $errors['grade'] ?></span>
            </div>
            <div class="d-flex justify-content-end">
                <input type="submit" class="btn btn-primary px-3" value="Save">
            </div>   
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>

