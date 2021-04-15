<?php
    include 'db.php';
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="puslapio_css.css">
    <link rel="icon" href="psi_darbo_logo.png" type="image/icon type">
    <title>Fast Food Search</title>

</head>
<body>
    <!--Header-->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="col-lg-2">
                <div class="navbar-header">
                <a href ="index.php">
                    <img class="logo_pagrindinis" src="psi_darbo_logo.png" />
                    </a>
                </div>
            </div>
            <div class="col-lg-10 topnav">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Pagrindinis</a></li>
                    <li><a href="prekiu_katalogas.php">Prekių katalogas</a></li>
                    <li><a href="prekes_paieska.php">Prekės paieška</a></li>
                    <li><a href="kontaktai.php">Kontaktai</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!--Container-->
    <div class="container zinute">
        <div class="row">
            <div class="col-lg-6">
                <img class="logo_pagrindinis" src="psi_darbo_logo.png" />
            </div>
            <div class="col-lg-6">
                <h3>Ši svetainė padės vartotojui lengvai rasti reikiamą informaciją apie ieškomą produktą: jo sudėtį, kainą, dydį, o svarbiausia - kuriose parduotuvėse galima rasti produktą ir jo kiekį parduotuvėje</h3>
            </div>
        </div>
    </div>

    <!--Footer-->
    <footer class="footer">
        <div id="contact" class="container">
            <div class="row">
                <h6>2008-2020 UAB "FFS" | FFS.lt</h6>
                <h6>Be UAB "FFS" sutikimo draudžiama kopijuoti ir platinti svetainėje esančią informaciją.</h6>
            </div>
        </div>
    </footer>



    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>