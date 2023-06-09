<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            padding: 10px 10px 0 10px;
            width: 250px;
            background: rgb(0, 28, 64);
}
.sidebar::-webkit-scrollbar {
    display: none;
}

.avt {
    background: white;
    border-radius: 50%;
    width: 120px;
    height: 120px;
    border: 2px solid white;
    margin-bottom: 10px;
    margin-top: 16px;
}

.menu{
    padding-left: 0;
}
.menu-item {
    position: relative;
    display: flex;
    align-items: center;
    padding: 15px;
    font-size: 1.08em;
    color: white;
    border: 1px solid transparent;
    text-decoration: none;
}

.menu-item:active, .menu-item:hover, .menu-item:focus {
    background: #c6defd;
    text-decoration: none;
    color: rgb(22 22 72);
    box-shadow: none;
    border: 1px solid rgb(22 22 72);
    border-radius: 8px;
}

    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
            <div class="sidebar">
                <!--instructor information-->
                <div class="text-light text-center p-2">
                    <img class="avt" src="../assets/images/admin.jpg" alt="">
                    <div>
                        <p class="username"><b><?= $instructor->getInstName(); ?></b></p>
                        <p class="position">Instructor</p>
                    </div>
                </div>
                <hr  width="30%"/>

                <!--Menu-->
                <ul class="menu">
                    <li>
                        <a class="menu-item" href="?controller=instructor">
                            <span>Attendance Management</span>
                        </a>
                    </li>
                </ul>
            </div>
            </div>
            <div class="col-md-10">	
                <div class="my-3">
                    <h3 class="text-center my-3">Student List</h3>
                    <p><b>Subject: </b> <?= $_GET['subjName']; ?><p>
                    <p><b>Semester: </b> <?= $_GET['semester']; ?> - <b>Period: </b> <?= $_GET['period']; ?><p>
                    <p><b>Student total: </b> <?= count($students) ?><p>

                </div>
                <div class="content">
                
                    <table class="table table-bordered">
                        <thead class="text-white" style="background-color: rgb(0, 28, 64);">
                            <tr>
                                <th scope="col">NO.</th>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Class</th>
                                <th scope="col">Update</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $stt = 0;
                            foreach ($students as $student) {?>
                                <tr>
                                    <td scope="row"><?= $stt + 1?></td> 
                                    <td><?= $student['stdID'];?></td>
                                    <td><?= $student['stdName'];?></td>
                                    <td><?= $student['stdClass'];?></td>
                                    <td>
                                        <a href="?controller=instructor&action=updateStudent&stdID=<?=$student['stdID'];?>"><i class="bi bi-pencil-square"></i></a>
                                    </td>
                                    <td>
                                        <a href="?controller=instructor&action=deleteStudent&stdID=<?=$student['stdID'];?>"><i class="bi bi-trash3-fill"></i></a>
                                    </td>
                                </tr>
                            <?php 
                            $stt++;
                        }; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
