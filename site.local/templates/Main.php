<?php

/* @var array $params */

require_once __DIR__ . "/../public/header.php";

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScreenShot</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css">
    <script src="js/script.js"></script>
</head>
<body>
<header>
    <div class="menu">
        <?php header_site(); ?>
</header>
<section class="header">
    <div class="container">
        <div>
            <div class="photoAdd">
                <a href="/screenshot">
                    <img class="image1" src="Img/image%201.png">
                </a>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="cards">
            <?php
            foreach ($params['data'] as $k => $v):
                $id = $v['id_screen']
                ?>

                <a href="/infoScreen/<?= $id ?>">
                    <div class="card">
                        <div class="inside">
                            <img src="<?= $v['link'] ?>" class="img">
                            <p><?= $v['dataScreen'] ?></p>
                        </div>
                        <img src="Img/Rectangle%2013.png" class="imgcard">
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<footer id="footer">
    <div class="container">

    </div>
</footer>
<table id="customers" class="table_block">
    <table class="bContentTables" style="overflow:hidden;">

        <div id="zatemnenie" style="display:none"></div>
        <form id="okno" style="display:none" method="POST" action="/enter">
            <div id="okno" style="display:none">
                <a href="index.php"><p class="q">????????</p></a>
                <img src="img/cross.png" class="cross">
                <input type="text" class="name" placeholder="?????????????? ??????????" name="users_log">

                <div class="textbox">
                    <input type="password" class="pword" placeholder="?????????????? ????????????" name="users_pwd">
                </div>
                <a href="/enter">
                    <button type="submit" id="logIN" class="newbut">??????????</button>
                </a>
            </div>
        </form>

        <form action="index.php" method="post" id="form1">

            <div id="okno2" style="display:none">
                <div class="reg">
                    <p>??????????????????????</p>
                </div>
                <img src="img/cross.png" class="cross1">
                <input type="text" class="new_name" placeholder="?????????????? ??????" name="userName">

                <div class="textbox">
                    <input type="text" class="new_email" placeholder="?????????????? email" name="userEmail">
                </div>
                <div class="textbox">
                    <input type="text" class="new_phone" placeholder="?????????????? ??????????????" name="userFone">
                </div>
                <div class="textbox">
                    <input type="password" class="new_password" placeholder="?????????????? ????????????" name="userPass">
                </div>
                <div class="textbox">
                    <input type="password" class="new_password_again" placeholder="?????????????????? ????????????" name="userPassToo">
                </div>
                <div class="yes">
                    <input onclick="checkFluency()" type="checkbox" id="qaz" class="check_box">
                    <p style="color:#64baff" class="agree">???????????????? ???? ?????????????????? ????????????</p>
                </div>
                <button type="submit" id="Register" class="newbut" disabled="true">????????????????????????????????????</button>
            </div>
        </form>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="js/main.js"></script>
</body>
</html>
