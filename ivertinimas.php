<?php
    include 'db.php';

    if(isset($_GET['preke'], $_GET['reitingas'])){

        $preke = (int)$_GET['preke'];
        $reitingas = (int)$_GET['reitingas'];

        echo $preke.''.$reitingas;

    
        if(in_array($reitingas, [1, 2, 3, 4, 5])){
            $egzistuoja = $conn -> query("SELECT Product_ID FROM produktas WHERE Product_ID ='$preke'");
            
            if($egzistuoja){
                $conn -> query("INSERT INTO reitingas (prekePasirinkt, prekeReitingas) VALUES ('$preke','$reitingas')");
            }
          
        }

      

        $sql = "SELECT Product_Name FROM produktas WHERE Product_ID = '$preke'";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);
        if($queryResult > 0){
                while($row = mysqli_fetch_assoc($result)){
                    header('Location: prekes_puslapis.php?productName='.$row['Product_Name']);  
                }
            }

    }

?>

