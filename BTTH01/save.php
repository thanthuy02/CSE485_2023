<?php
require_once 'models/StudentDAO.php';
session_start();

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
    foreach ($students as $st){
        if($st->getId() == $_POST['id']){
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
        $_SESSION['error_id'] = $errors['id'];
        $_SESSION['error_name'] = $errors['name'];
        $_SESSION['error_age'] = $errors['age'];
        $_SESSION['error_grade'] = $errors['grade'];
        header('Location: create.php');
        exit();
    } else {                                                     // Otherwise
        $data = "\n" . $_POST['id'] . "," . $_POST['name'] . "," . $_POST['age'] . "," . $_POST['grade'];
        $fp = fopen('assets/StudentData.txt', 'a+') or die("Unable to open file!");     //open file for read/write (a+: don't delete existing data, add at the end)
        fwrite($fp, $data);
        fclose($fp);
        header('Location: index.php');
        exit();
    }
}
?>