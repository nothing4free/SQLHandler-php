<!DOCTYPE html>

  <head>
	  <link rel="stylesheet" href="style.css">
  </head>

  <body>

    <h2 class="header"> Showing all artworks </h2>

    <?php
      // fill this in order for the whole thing to work!
      $url = "";
      $user = "";
      $pass = "";
      $dbname = "";

      // opens a connection to the database, drops an error if it fails
      $conn = new mysqli($url, $user, $pass, $dbname);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      // creates the query on "sql" and executes it, storing the res on "res" 
      $sql = "SELECT * FROM ObraDeArte";
      $res = $conn->query($sql);

      // if the res has more than 0 rows (not empty), it creates an html table and shows the query res data
      if ($res->num_rows > 0) {
        echo "<table border='1'><tr> <th>Artwork ID</th> <th>Title</th> <th>Price</th> <th>Type</th> <th>Date</th> <th>Artist</th> </tr>";
        while($row = $res->fetch_assoc()) {
          echo "<tr><td>".$row["ID_obra"]."</td><td>".$row["Titulo"]."</td><td>".$row["Precio"]."</td><td>".$row["Tipo"]."</td><td>".$row["Fecha"]."</td><td>".$row["Artista"]."</td></tr>";
        }
        echo "</table>";
      } else {
        echo "0 ress";
      }
      $conn->close();
    ?>

    <form action="index.html" type="wrapper">
	    <input type="submit" value="Go back"/>
    </form>

  </body>
</html>
