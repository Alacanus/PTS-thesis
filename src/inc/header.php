<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ELP is a Electronic Learning PLatform for students who want to continuesly hone their skills">

    <!--<link rel="stylesheet" type="text/css" href="/src/css/normalize.css">-->
    <link rel="stylesheet" type="text/css" href="/src/css/grid.css">
    <link rel="stylesheet" type="text/css" href="/src/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="/src/css/animate.css">
    <link rel="stylesheet" type="text/css" href="/src/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'PTS' ?></title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.jsdelivr.net/selectivizr/1.0.3b/selectivizr.min.js"></script>
<body>
<main>
    <?php flash(
    'user_register_success',
    'Your account has been created successfully. Please activate your account here.',
    'success'
);
?>