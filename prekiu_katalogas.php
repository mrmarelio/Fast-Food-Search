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

   
    </style>
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

    <!--Container nustatymai-->
    <div class="container-fluid nustatymai">
        <div class="container container-center">
            <div class="col-lg-3 text-right">
                <h5 style ="padding-top:5px;">Nustatymai:</h5>
            </div>
            <div class="col-lg-3">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                        Kategorija
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <?php
                            $sql = "SELECT * FROM kategorijos";
                            $run = mysqli_query($conn, $sql);
                            while($result = mysqli_fetch_assoc($run)){
                                echo "
                                <li><a class ='dropdown-item' href='kategorijos.php?kategorija=".$result['Cat_ID']."'>".$result['Cat_Name']."</a></li>
                                
                                ";
                            }
                        ?>
                    </ul>
                </div>
            </div>
            
        </div>
    </div>

    <!--Container-->
    <div class="container">
    <?php
        $sql = "SELECT * FROM produktas";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);

        if($queryResult > 0){
            while($row = mysqli_fetch_assoc($result)){
                    echo "<div class='row'>
                    <div class='col-lg-4 text-center'>
                        <img style='height:200px; widht:200px;' class='kategorijos' src=productPhoto/".$row['Product_Photo']." />
                        <div class='dot_all'>
                            <span class='dot'></span>
                        </div>
                    </div>
                    <div class='col-lg-8 kategorijos_tekstas'>
                        <h3>".$row['Product_Name']."</h3>
                        <h4 style='padding: 2%; font-weight:bold;'>Kaina: ".$row['Product_Price']."</h4>
        
                        <p>
                           ".$row['Product_Desc']."
                        </p>
        
                        <a href='prekes_puslapis.php?productName=".$row['Product_Name']."'><button class='btn btn-primary dropdown-toggle' type='button'>
                            Daugiau
                        </button></a>
                    </div>
                </div>";
                }
            } else {
                echo 'Nėra rezultatų !';
            }

    ?>

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