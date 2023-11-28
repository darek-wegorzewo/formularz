<!DOCTYPE html>

       <?php
        $cookie_name = "odwiedziny";
        $cookie_value = "John Doe";
        setcookie($cookie_name, $cookie_value, time() + 20, "/"); // 86400 = 1 day
        ?>

<html lang="pl">
 
  <head>
     <meta charset="utf-8">
     <title>Port lotniczy</title>
     <link rel="stylesheet" href="stle5.css">
   </head>
   <body>

        <div class="left"> 
        <img src="zad5.png" alt="logo lotniska" width="200" height="200">
        </div>
        <div class="center"> 
        <h1>Przylot</h1>
        </div>
        <div class="left">
        <h3>Przydatne linki</h3> 
        <a href="kwerendy.txt" target="_blank" >Pobierz</a>
        </div>

    <div id=glowny>
        <?php
            $polacz=mysqli_connect("localhost", "root", "", "egzamin");
            $zapytanie="SELECT czas, kierunek, nr_rejsu, status_lotu FROM przyloty ORDER BY czas asc";
            $wynik=mysqli_query($polacz, $zapytanie);
            
echo "<table id='tablica'>
  <tr>
    <th>CZAS</th>
    <th>KIErunek</th>
    <th>Numer Rejsu</th>
    <th>Status</th>
  </tr>";
            while ($tabela=mysqli_fetch_assoc($wynik))
            {
                echo "<tr><td>".$tabela['czas']."</td><td>".$tabela['kierunek']."</td><td>".$tabela['nr_rejsu']."</td><td>".$tabela['status_lotu']."</td><tr>";
            }

            echo "</table>";;
        ?>

    </div>
    <div id=stopka>
        <div>
        <?php
        if(!isset($_COOKIE[$cookie_name])) {
    echo "<p>Dzień dobry. Strona lotniska używa ciasteczek</p></br>";
} else {
    echo "<p>Witaj ponownie na stronie lotniska</p>";
    //echo "Value is: " . $_COOKIE[$cookie_name];
}
?>
        </div>
        <div>
        </div>
    </div>

  </body>

</html>