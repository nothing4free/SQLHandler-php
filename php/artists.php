<!DOCTYPE html>

  <head>
	  <link rel="stylesheet" href="style.css">
  </head>

  <body>

    <h2 class="header"> Showing all artists: </h2>

    <?php
      $url = "";
      $user = "";
      $pass = "";
      $dbname = "";

      // opens a connection to the database, drops an error if it fails
      $conn = new mysqli($url, $user, $pass, $dbname);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      // creates the query on "sql" and executes it, storing the result on "res" 
      $sql = "SELECT * FROM Artista"; 
      $res = $conn->query($sql);

      // if the result has more than 0 rows (not empty), it creates an html table and shows the query result data
      if ($res->num_rows > 0) {
        echo "<table border='1'><tr> <th>Name</th> <th>Birth place</th> <th>Birth year</th> <th>Art style</th> </tr>";
        while($row = $res->fetch_assoc()) {
        echo "<tr><td>".$row["Nombre"]."</td><td>".$row["Lugar_Nacimiento"]."</td><td>".$row["Year_Nacimiento"]."</td><td>".$row["Estilo"]."</td></tr>";
        }
        echo "</table>";
      } else {
        echo "Query returned 0 results.";
      }
      $conn->close();
    ?>

    <form action="index.html" class="wrapper">
  	  <input type="submit" value="Go back"/>
    </form>

  </body>
</html>
