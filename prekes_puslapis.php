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


    <div class="container">
    <?php
        $title = mysqli_real_escape_string($conn, $_GET['productName']);
        $sql = "SELECT * FROM produktas WHERE Product_Name = '$title'";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);
        if($queryResult > 0){
                while($row = mysqli_fetch_assoc($result)){
                    echo " <div class='row'>
                    <div class='col-lg-4 text-center'>
                        <img class='nuotrauka' id='myImg' src='productPhoto/".$row['Product_Photo']."' />
                        <div id='myModal' class='modal'>

                        <span class='close'>&times;</span>

                        <img class='modal-content' id='img01'>

                        </div>

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
                    </div>
                </div>
            </div>

            <div class='container zinute'>
                <div class='row'>
                    <div class='col text-left'>
                        <h3>Parduotuvės, kuriose galite rasti šią prekę:</h3>
                        <br/>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-lg-3'>
                        <img style ='padding-top:15px;'class='logo_parduotuves' src='rimi.png' />
                    </div>
                    <div class='col-lg-2'>
                        <br />
                        <h4>".$row['Shop_Name']."</h4>
                    </div>
                    <div class='col-lg-4'>
                        <br />
                        <h4>".$row['Shop_Place']."</h4>
                    </div>
                    <div class='col-lg-3'>
                        <br />
                        <button class='btn btn-primary dropdown-toggle' type='button'>
                        <a href='http://maps.google.com/?q=".$row['Shop_Place']."' target='_blank' style='color:black'>Žemėlapis</a>
                        </button>
                    </div>
                </div>

                </div>";
                }
            } else {
                echo 'Nėra rezultatų !';
            }
    ?>
    </div>
    


    <div class="container">
     <div class="row">
         <div class="col">
             <br />
             <br />
             <h3>Atsiliepimai</h3>
         </div>
     </div>

     <div style = "padding-bottom:50px;" class="row">
         <div style = "font-size:large; padding-left:20px;" class="col">
            <?php
                $produktas = $conn -> query("SELECT produktas.Product_ID, AVG(reitingas.prekeReitingas) AS rating
                FROM produktas
                LEFT JOIN reitingas
                ON produktas.Product_ID = reitingas.prekePasirinkt
                WHERE produktas.Product_Name = '$title'
                ") -> fetch_object();

            ?>
         <div style ="font-size:large;"><b>Prekė įvertinimas:  <?php  $img1 = "star.png";
         for($i = 0; $i < round($produktas -> rating); $i++ ){
                                                        print"<img src=\"$img1\" width=\"20px\" height=\"20px\"\/>";
                                                        } ?></b></div>

         <b>Įvertinkite šią prekę:</b>
             <?php foreach (range(1,5) as $rating) { ?>
                <a href = "ivertinimas.php?preke=<?php 
                    $title = mysqli_real_escape_string($conn, $_GET['productName']);
                    $sql = "SELECT * FROM produktas WHERE Product_Name = '$title'";
                    $result = mysqli_query($conn, $sql);
                    $queryResult = mysqli_num_rows($result);
                    if($queryResult > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                echo $row['Product_ID'];
                            }
                        }
            ?>&reitingas=<?php echo $rating; ?>"><?php echo $rating; ?></a>
            <?php 
            } 
            ?>
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

    <script>
        var modal = document.getElementById("myModal");

        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
        }

        var span = document.getElementsByClassName("close")[0];

        span.onclick = function() {
        modal.style.display = "none";
        }
</script>
</body>
</html>