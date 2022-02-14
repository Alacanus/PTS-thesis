<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ELP is a Electronic Learning PLatform for students who want to continuesly hone their skills">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper //remove with own js css/js-->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Design - External CSS & Scripts Code -->
    <link rel="stylesheet" type="text/css" href="<?= 'http://'. $_SERVER['HTTP_HOST'] . '/PTS-thesis/public/css/grid.css'?>">
    <!-- <link rel="stylesheet" type="text/css" href="/public/css/ionicons.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.jsdelivr.net/selectivizr/1.0.3b/selectivizr.min.js"></script>
    
    <!-- own code -->
    <script type="text/javascript" src= <?= 'http://'. $_SERVER['HTTP_HOST'] . '/PTS-thesis/static/Sitewide.js'?>></script>  
    <link rel="stylesheet" href="<?= 'http://'. $_SERVER['HTTP_HOST'] . '/PTS-thesis/public/css/style.css'?>">
    
    <!-- Title -->
    <title><?= $title ?? 'PTS' ?></title>

</head>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
<body>
    <header>
        <nav>
            <div class="row">
                <div class="logo">PTS</div>
                <ul class="main-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Courses</a></li>
                    <li><a href="login.php"><button class="btn btn-nav btn-full">LOGIN</button></a></li>
                    <li><a href="register.php"><button class="btn btn-nav btn-nav-ghost btn-ghost">REGISTER</button></a></li>
                </ul>
            </div>
        </nav>
    </header>
<main>
    <?php flash(
    'user_register_success',
    'Your account has been created successfully. Please activate your account here.',
    'success'
);
?>