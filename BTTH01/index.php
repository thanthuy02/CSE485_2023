<?php
require_once 'models/StudentDAO.php';

$studentDAO = new StudentDAO();

// save the data of the file into the studentDAO array
$fname = "assets/StudentData.txt";                        // file name
$farray = file($fname);                                   // reading file into an array
$students = array();                                      // empty array
$keys = ['id', 'name', 'age', 'grade'];                   // keys array
for($i = 1; $i < count($farray); $i++){                   // loop from line 2
    $values = explode(',', $farray[$i]);                  // convert string to array
    $student = new Student($values[0], $values[1], $values[2], $values[3]);   // create a new student
    $studentDAO->create($student);   
}

// error
$student = ['id' => '', 'name' => '', 'age' => '', 'grade' => ''];
$errors = ['id' => '', 'name' => '', 'age' => '', 'grade' => ''];
$message = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){                                      // if form submitted
    $filters['age']['filter'] = FILTER_VALIDATE_INT;                           // integer filter
    $filters['grade']['filter'] = FILTER_VALIDATE_INT;                         // integer filter
    $student = filter_input_array(INPUT_POST, $filters);                       // validate data
    
    // Create error messages
    $exists = false;                                                           // duplicate state variable
    for($i = 0; $i < count($students); $i++){
        if($students[$i]['id'] == $_POST['id']){                               // duplicate check
            $exists = true;
            break;
        }
    }
    if(empty($_POST['id'])){                                                 // id error
        $errors['id'] = 'Please enter your ID';
    } else if ($exists){
        $errors['id'] = 'ID already exists';
    } else {
        $errors['id'] = '';
    }
          

    if(empty($_POST['age'])){                                                 // age error
        $errors['age'] = 'Please enter your age';
    } else if ($student['age'] == NULL){
        $errors['age'] = 'Age must be integer';
    } else {
        $errors['age'] = '';
    }

    $errors['name'] = !empty($_POST['name']) ? '' : 'Please enter your name';   // name error

    if(empty($_POST['grade'])){                                               // grade error
        $errors['grade'] = 'Please enter your grade';
    } else if ($student['grade'] == NULL){
        $errors['grade'] = 'Grade must be integer';
    } else {
        $errors['grade'] = '';
    }

    $invalid = implode($errors);                                 // Join error messages

    if ($invalid) {                                              // If there are errors
        $message = 'Please correct the following errors:';       // Do not process
    } else {                                                     // Otherwise
        $message = 'Create success!';                            // Create success
        $data = "\n" . $_POST['id'] . "," . $_POST['name'] . "," . $_POST['age'] . "," . $_POST['grade'];
        $fp = fopen('assets/StudentData.txt', 'a+') or die("Unable to open file!");     //open file for read/write (a+: don't delete existing data, add at the end)
        fwrite($fp, $data);
        fclose($fp);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Student Management</title> 
</head>
<body>
    <h1>Create Students</h1>
    <!-- Start: Student creation form -->
    <form action="" method="post">
        <div class="info">
            <div class="left">
                <!-- id -->
                <div>
                    <label for="id">ID:</label>
                    <input type="text" name="id" id="id" value="<?= $student['id'] ?>">
                </div>
                <!-- id error -->
                <div class="error">
                    <span><?= $errors['id'] ?></span>
                </div>
                <!-- name -->
                <div>
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name"  value="<?= $student['name'] ?>">
                </div>
                 <!-- name error -->
                 <div class="error">
                    <span><?= $errors['name'] ?></span>
                </div>
            </div>
        
            <div class="right">
                <!-- age -->
                <div>
                    <label for="age">Age:</label>
                    <input type="text" name="age" id="age" value="<?= $student['age'] ?>">
                </div>
                <!-- age error -->
                <div class="error">
                    <span><?= $errors['age'] ?></span>
                </div>
                <!-- grade -->
                <div>
                    <label for="grade">Grade:</label>
                    <input type="text" name="grade" id="grade"  value="<?= $student['grage'] ?>">
                </div>
                <!-- grade error -->
                <div class="error">
                    <span><?= $errors['grade'] ?></span>
                </div>
            </div>
        </div>

        <div class="func_btn">
            <input type="submit" value="Save">
        </div>
    </form>
    <!-- End: Student creation form -->

    <!-- Start: Student list -->
    <h1>Student List</h1>
    <div class="studentDAO">
        <table>
            <thead>
                <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Grade</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($students); $i++): ?>
                <tr>
                    <td><?= $students[$i]['id'] ?></td>
                    <td><?= $students[$i]['name'] ?></td>
                    <td><?= $students[$i]['age'] ?></td>
                    <td><?= $students[$i]['grade'] ?></td>
                </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>    
    <!-- End: Student list -->

</body>
</html>

