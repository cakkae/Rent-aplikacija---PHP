<?php
    require 'baza.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Lokacija: index.php");
    } else {
        $pdo = Baza::povezi();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM auto where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        
        Baza::otkazi();
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Brisi</h3>
                    </div>
                 <div class="alert alert-success" role="alert">Zapis izbrisan</div>
                        <div class="form-actions">
                          <a class="btn" href="index.php">Vrati</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> 
  </body>
</html>