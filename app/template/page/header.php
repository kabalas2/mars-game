<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mars game</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="navbar-nav mr-auto">
            <?php if(!$this->isLogedIn()): ?>
                <li class="nav-item"><a href="<?php echo BASE_URL ?>/user/registration">Register</a> </li>
                <li class="nav-item"><a href="<?php echo BASE_URL ?>/user/login">Login</a></li>
            <?php else: ?>
                <li class="nav-item"><a href="<?php echo BASE_URL ?>/user/logout">Logout</a></li>
                <li class="nav-item"><a href="<?php echo BASE_URL ?>/user/account">My account</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
<?php if(isset($data['error']) && $data['error']): ?>
<div class="alert alert-danger">
    <?php echo $data['error']; ?>
</div>
<?php endif; ?>