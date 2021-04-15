<head>
<meta charset="utf-8" />
</head>
<h2><b>Pridėti produktą</b></h2>

<form method="post" enctype="multipart/form-data" class="form-horizontal">
<table>
    <tr>
    <td>Produkto kaina</td>
        <td><input type="text" name="productPrice" /></td>
    </tr>
    <tr>
    <td>Produkto pavadinimas</td>
        <td><input type="text" name="productName"/></td>
    </tr>
    <tr>    
    <td>Produkto aprašas</td>
        <td><input type="text" name="productDesc" /></td>
    </tr>
    <tr>    
    <td>Produkto įvertinimas</td>
        <td><input type="text" name="productRating" /></td>
    </tr>
    <tr>    
    <td>Parduotuvės pavadinimas</td>
        <td><input type="text" name="shopName" /></td>
    </tr>
    <tr>    
    <td>Parduotuvės vieta</td>
        <td><input type="text" name="shopPlace" /></td>
    </tr>
    <tr>
    <tr>    
    <td>Produkto kategorijos ID (1 - vaisiai ir daržovės; <br> 2 - Duonos gaminiai; 3 - Pieno produktai; 4 - Mėsa)</td>
        <td><input type="text" name="category" /></td>
    </tr>
    <tr>
    <td>Produkto nuotrauka</td>
        <td><input type="file" name="productPhoto" accept="image/*" /></td>
    </tr>
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" >
        <span></span>Ikelti produktą
        </button>
        </td>
    </tr>
</table>
<br>
<h2><b>Pridėti kategoriją</b></h2>

<form method="post" enctype="multipart/form-data" class="form-horizontal">
<table>
    <tr>
    <td>Kategorija</td>
        <td><input type="text" name="kategorijosPav" /></td>
    </tr> 
    <tr>
        <td colspan="2"><button type="submit" name="btnsavekat" >
        <span></span>Ikelti kategoriją
        </button>
        </td>
    </tr>
</table>
</form> 
<br><br>
<?php 

    $DB_HOST = 'localhost';
    $DB_USER = 'root';
    $DB_PASS = '';
    $DB_NAME = 'ffsdb';
    
    try{
     $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
     $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
     echo $e->getMessage();
    }
    ?>
    <?php
    if(isset($_POST['btnsave']))
    {
     $kaina = $_POST['productPrice'];
     $pavadinimas = $_POST['productName'];
     $aprasas = $_POST['productDesc'];
     $reitingas = $_POST['productRating'];
     $pardPavadinimas = $_POST['shopName'];
     $pardVieta = $_POST['shopPlace'];
     $kategorija = $_POST['category'];
   
     
     $imgFile = $_FILES['productPhoto']['name'];
     $tmp_dir = $_FILES['productPhoto']['tmp_name'];
     $imgSize = $_FILES['productPhoto']['size'];
     
     
     if(empty($kaina)){
      $errMSG = "Iveskite kaina.";
     }
     else if(empty($pavadinimas)){
      $errMSG = "Iveskite pavadinima.";
     }
     else if(empty($aprasas)){
        $errMSG = "Iveskite aprasa.";
    }
     else if(empty($reitingas)){
       $errMSG = "Iveskite reitinga.";
   }
   else if(empty($pardPavadinimas)){
    $errMSG = "Iveskite parduotuves pavadinima.";
   }
   else if(empty($pardVieta)){
    $errMSG = "Iveskite parduotuves vieta.";
   }
   else if(empty($kategorija)){
    $errMSG = "Iveskite kategorija.";
    }
     else if(empty($imgFile)){
      $errMSG = "Ikelkite prekes nuotrauka.";
     }
     else
     {
      $upload_dir = 'productPhoto/';
    
      $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
     
      $valid_extensions = array('jpeg', 'jpg', 'png');
     
      $produktoNuot = rand(1000,1000000).".".$imgExt;
   
      if(in_array($imgExt, $valid_extensions)){   
       if($imgSize < 5000000)    {
        move_uploaded_file($tmp_dir,$upload_dir.$produktoNuot);
       }
       else{
        $errMSG = "Failo dydis per didelis";
       }
      }
      else{
       $errMSG = "Nepriimtinas formatas";  
      }
     }
   
     if(!isset($errMSG))
     {
      $stmt = $DB_con->prepare('INSERT INTO produktas(Product_Price, Product_Name, Product_Desc, Product_Rating, Product_Photo, Shop_Name, Shop_Place, cat_ID) VALUES(:ukaina, :upavadinimas, :uaprasas, :ureitingas, :uphoto, :upardpav, :upardvt, :cateID)');
      $stmt->bindParam(':ukaina',$kaina);
      $stmt->bindParam(':upavadinimas',$pavadinimas);
      $stmt->bindParam(':uaprasas',$aprasas);
      $stmt->bindParam(':ureitingas',$reitingas);
      $stmt->bindParam(':upardpav',$pardPavadinimas);
      $stmt->bindParam(':upardvt',$pardVieta);
      $stmt->bindParam(':cateID',$kategorija);
      $stmt->bindParam(':uphoto',$produktoNuot);


      if($stmt->execute())
      {
       $successMSG = "Produktas ikeltas";
       header("refresh:5;prideti.php");
      }
      else
      {
       $errMSG = "Klaida ikeliant produkta";
      }
     }
    }

?>
<?php
    if(isset($_POST['btnsavekat']))
    {
     $kategorijaPav = $_POST['kategorijosPav'];
   

     if(empty($kategorijaPav)){
      $errMSG = "Iveskite kategorija.";
     }
     
   
     if(!isset($errMSG))
     {
      $stmt = $DB_con->prepare('INSERT INTO kategorijos(Cat_Name) VALUES(:ukat)');
      $stmt->bindParam(':ukat',$kategorijaPav);
      


      if($stmt->execute())
      {
       $successMSG = "Produktas ikeltas";
       header("refresh:5;prideti.php");
      }
      else
      {
       $errMSG = "Klaida ikeliant produkta";
      }
     }
    }

?>