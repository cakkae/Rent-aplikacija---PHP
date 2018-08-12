
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>Aplikacija</h3>
            </div>
            <div class="row">
              <p>
  <a href="kreiraj.php" class="btn btn-success">Kreiraj</a>
</p>

                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                  
                      <th>Brend</th>
                      <th>Naziv</th>
                      <th>Vrsta goriva</th>                      
                      <th>Slika</th>
                      <th>Opcije</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'baza.php';
                   $pdo = Baza::povezi();
                   $sql = 'SELECT * FROM auto ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                           
                            echo '<td>'. $row['Brend'] . '</td>';
                            echo '<td>'. $row['Naziv'] . '</td>';
                            echo '<td>'. $row['VrstaGoriva'] . '</td>';
                            echo '<td>'. $row['Slika'] . '</td>';

                            echo '<td><a class="btn" href="citaj.php?id='.$row['ID'].'">Pregled</a></td>';
                            echo '<td><a class="btn" href="brisi.php?id='.$row['ID'].'">Brisi</a></td>';


                            echo '</tr>';
                   }
                   Baza::otkazi();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> 
  </body>
</html>