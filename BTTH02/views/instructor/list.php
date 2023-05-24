<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Student Management</title>
    <style>
         body {
        background-color: #f1f1f1;
    }

    h1 {
      text-align: center;
      margin-top: 50px;
    }

    .content {
      max-width: 1000px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    th, td {
      padding: 10px;
      border: 1px solid #ccc;
    }

    th {
      background-color: #f1f1f1;
      text-align: left;
    }
    </style>
</head>
<body>
    <h1>Attendance Management</h1>
    <div class="content">
        <h2>Student List</h2>
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Class</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php 
                    $stt = 0;
                    foreach ($students as $student) {
                ?>
                    <tr>
                        <td><?= $stt+1;?></td>
                        <td><?= $student['stdID'] ?></td>
                        <td><?= $student['stdName'] ?></td>
                        <td><?= $student['stdClass'] ?></td>
                        
                    </tr>
               <?php $stt++; } ?>
            </tbody>
        </table>
</body>
</html>
