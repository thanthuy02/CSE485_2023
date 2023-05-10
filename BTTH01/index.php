<?php
require_once 'models/StudentDAO.php';

$studentDAO = new StudentDAO();

// save the data of the file into the studentDAO array
$fname = "assets/StudentData.txt";                        // file name
$farray = file($fname);                                   // reading file into an array
for($i = 1; $i < count($farray); $i++){                   // loop from line 2
    $values = explode(',', $farray[$i]);                  // convert string to array
    $student = new Student($values[0], $values[1], $values[2], $values[3]);   // create a new student
    $studentDAO->create($student);   
}

$students = $studentDAO->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        th, td {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="d-flex align-items-center my-4">
            <h1>Student List</h1>
            <a href="create.php" class="btn btn-success ms-auto p-3">Add new student</a>
        </div>

        <div class="studentDAO">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach ($students as $stu) { ?>
                <tr>
                    <td><?= $stu->getId() ?></td>
                    <td><?= $stu->getName() ?></td>
                    <td><?= $stu->getAge() ?></td>
                    <td><?= $stu->getGrade() ?></td>
                </tr>
            <?php } ?>
                </tbody>
            </table>
        </div> 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>   
    
</body>
</html>
