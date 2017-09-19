<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Slavik</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../vendor//fancybox/jquery.fancybox.css"/>
    <link rel="stylesheet" href="../vendor/font-awesome-4.2.0/css/font-awesome.min.css"/>

    <link rel="stylesheet" type="text/css" href="../css/style.css"/>

</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Slavik</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Головна</a></li>
                <li><a href="/main/autor">Про нас</a></li>
            </ul>
            <?php if (!empty($_SESSION['admin'])) { ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/admin?do=logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Вийти</a></li>
                </ul>
            <?php } ?>
        </div>
    </div>
</nav>
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <p><a href="/main/add">Додати завдання</a></p>
        </div>
        <div class="col-sm-8 text-center">
            <?php echo $contend; ?>
        </div>
        <div class="col-sm-2 sidenav">
            <div class="well">
                <p>Місце для реклами</p>
            </div>
        </div>
    </div>
</div>

<footer class="container-fluid text-center navbar-fixed-bottom">
    <p><?= date('Y')?> &copy; В'ячеслав Гантюк</p>
</footer>

<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/fancybox/jquery.fancybox.pack.js"></script>
<script src="../js/my.js"></script>

</body>
</html>
