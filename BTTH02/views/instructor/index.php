<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Management</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <div style="display:block;">
    <div>
        <h1>Attendance Management</h1>
    </div>
    <div class="content">
        <h2>Subject List</h2>
        <table class="table table-bordered">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">StudentList</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $stt = 0;
                foreach ($subjects as $subject) {?>
                    <tr>
                        <th scope="row"><?= $stt + 1?></th> 
                        <th><?= $subject['subjID'];?></th>
                        <th><?= $subject['subjName'];?></th>
                        <th><?= $subject['date'];?></th>
                        <td>
                            <a href="?controller=instructor&action=getStudent&subjID=<?=$subject['subjID']; ?>">Details</a>
                        </td>
                    </tr>
                <?php 
                $stt++;
            }; ?>
            </tbody>
        </table>
        
    </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
