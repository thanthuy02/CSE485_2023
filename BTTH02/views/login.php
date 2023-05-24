<?php
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="./assets/css/style.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <header>Login Form</header>
            <form method="post" action="?controller=Login&action=login">
                <div class="field email">
                    <div class="input-area">
                        <input type="email" placeholder="Email Address" name="email" required>
                        <i class="icon fas fa-envelope"></i>
                        <?php if ($error === 'Email does not exist'): ?>
                            <div class="err">
                            <i class="error error-icon fas fa-exclamation-circle"></i>
                            <div class="error error-txt"><?php echo ($error); ?></div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="field password">
                    <div class="input-area">
                        <input type="password" placeholder="Password" name="password" required>
                        <i class="icon fas fa-lock"></i>
                        <?php if ($error === 'Incorrect password'): ?>
                            <i class="error error-icon fas fa-exclamation-circle"></i>
                            <div class="error error-txt"><?php echo $error; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="pass-txt"><a href="#">Forgot password?</a></div>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>
</body>
</html>