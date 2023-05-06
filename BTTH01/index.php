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
    <h1>Danh sách sinh viên</h1>
    <form action="" method="post">
        <div class="info">
            <div class="left">
                <div>
                    <label for="id">ID:</label>
                    <input type="text" name="id" id="id">
                </div>

                <div>
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name">
                </div>
            </div>
        
            <div class="right">
                <div>
                    <label for="age">Age:</label>
                    <input type="text" name="age" id="age">
                </div>

                <div>
                    <label for="grade">Grade:</label>
                    <input type="text" name="grade" id="grade">
                </div>
            </div>
        </div>

        <div class="func_btn">
            <input type="submit" value="Create">
            <input type="submit" value="Save">
        </div>
    </form>
</body>
</html>


