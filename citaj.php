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
        $sql = "SELECT * FROM auto where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
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
                        <h3>Citaj</h3>
                    </div>
                     
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Brend</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['Brend'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Naziv</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['Naziv'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Vrsta goriva</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['VrstaGoriva'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Slika</label>
                        <div class="controls">
                            <label class="checkbox">
                                
                    <img width="300px" height="300px" src="slike/<?php echo htmlentities($data['Slika']);?>"
                            </label>
                        </div>
                      </div>
                        <div class="form-actions">
                          <a class="btn" href="index.php">Vrati</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> 
  </body>
</html>