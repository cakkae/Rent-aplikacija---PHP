<?php
     
    require 'baza.php';
 
    if ( !empty($_POST)) {
        // greske validacija
        $greska = null;   
         
        
        $brend = $_POST['brend'];
        $naziv = $_POST['naziv'];
        $vrstagoriva = $_POST['vrstagoriva'];
        $slika = $_POST['slika'];
         
        // validacija
        $valid = true;
        if (empty($brend) OR empty($naziv) OR empty($vrstagoriva) OR empty($slika)) {
            $greska = 'Molimo popunite...';
            $valid = false;
        }
         
        
         
        // ubacivanje podataka
        if ($valid) {
            $pdo = Baza::povezi();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO auto (Brend, Naziv, VrstaGoriva, Slika) values(?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($brend,$naziv,$vrstagoriva,$slika));
            Baza::otkazi();
            header("Lokacija: index.php");
        }
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
                        <h3>Kreiraj studenta</h3>
                    </div>
             
                    <form class="form-horizontal" action="kreiraj.php" method="post">
                     
                      <div class="control-group <?php echo !empty($greska)?'error':'';?>">
                        <label class="control-label">Brend</label>
                        <div class="controls">
                            <input name="brend" type="text" placeholder="Brend" value="<?php echo !empty($brend)?$greska:'';?>">
                            <?php if (!empty($greska)): ?>
                                <span class="help-inline"><?php echo $greska;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($greska)?'error':'';?>">
                        <label class="control-label">Naziv</label>
                        <div class="controls">
                            <input name="naziv" type="text"  placeholder="Naziv" value="<?php echo !empty($naziv)?$greska:'';?>">
                            <?php if (!empty($greska)): ?>
                                <span class="help-inline"><?php echo $greska;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($greska)?'error':'';?>">
                        <label class="control-label">Vrsta goriva</label>
                        <div class="controls">
                            <select name="vrstagoriva" value="<?php echo !empty($Vrstagoriva)?$greska:'';?>">
   <option value="0">Izaberite</option>
   <option value="1">Benzin</option>
   <option value="2">Dizel</option>
   <option value="3">Plin</option>
</select>
                            
                            <?php if (!empty($greska)): ?>
                                <span class="help-inline"><?php echo $greska;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($greska)?'error':'';?>">
                        <label class="control-label">Slika</label>
                        <div class="controls">
                            <input name="slika" type="text"  placeholder="Slika" value="<?php echo !empty($slika)?$greska:'';?>">
                            <?php if (!empty($greska)): ?>
                                <span class="help-inline"><?php echo $greska;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Kreiraj</button>
                          <a class="btn" href="index.php">Vrati</a>
                        </div>
                    </form>
                </div>
                 
    </div> 
  </body>
</html>