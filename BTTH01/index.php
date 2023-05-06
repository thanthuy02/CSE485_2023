<?php
$student = ['id' => '', 'name' => '', 'age' => '', 'grade' => ''];
$errors = ['id' => '', 'name' => '', 'age' => '', 'grade' => ''];
$message = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){                   // if form submitted
    $filters['age']['filter'] = FILTER_VALIDATE_INT;        // integer filter
    $filters['grade']['filter'] = FILTER_VALIDATE_INT;      // integer filter
    $student = filter_input_array(INPUT_POST, $filters);    // validate data
    
    // Create error messages
    $errors['age'] = $student['age'] ? '' : 'Age must be integer';
    $errors['grade'] = $student['grade'] ? '' : 'Grade must be integer';
    $invalid = implode($errors);                            // Join error messages

    if ($invalid) {                                              // If there are errors
        $message = 'Please correct the following errors:';       // Do not process
    } else {                                                     // Otherwise
        $message = 'Create success!';                            // Create success
    }
}

    $students = [
      ['id' => '1', 'name' => 'Nguyễn Văn A', 'age' => 22, 'grade' => 6],
      ['id' => '2', 'name' => 'Trần Thị B', 'age' => 20, 'grade' => 8],
      ['id' => '3', 'name' => 'Phạm Văn C', 'age' => 25, 'grade' => 4]
    ];
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


<?php
   $fp = fopen('assets/StudentData.txt', 'a+') or die("Unable to open file!");  //open file for read/write (a+: don't delete existing data, add at the end)
   echo "<pre>";
   print_r(fread($fp, filesize("assets/Studentdata.txt")));
   
   if($_SERVER['REQUEST_METHOD'] == 'POST'){    // if form submitted
        $id = $_POST["id"];                     // get id
        fwrite($fp, $id);                       // write $id to $fp                   
        $name = $_POST["name"];                 // get name
        fwrite($fp, $name);                     // write $name to $fp 
        $age = $_POST["age"];                   // get age
        fwrite($fp, $age);                      // write $age to $fp 
        $grade = $_POST["grade"];               // get grade
        fwrite($fp, $grade);                    // write $grade to $fp
   }

   echo "<pre>";
   print_r(fread($fp, filesize("assets/Studentdata.txt")));

   fclose($fp);
?>
