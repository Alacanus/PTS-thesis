<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ELP is a Electronic Learning PLatform for students who want to continuesly hone their skills">
    <script
    src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
    integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
    crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="../src/inc/Sitewide.js"></script> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'PTS' ?></title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<body>
<main>
    <?php flash(
    'user_register_success',
    'Your account has been created successfully. Please activate your account here.',
    'success'
);
?>