<!DOCTYPE html>

  <head>
	  <link rel="stylesheet" href="style.css">
  </head>

  <body>
    <h2 class="header"> Showing all clients </h2>
    
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
      $sql = "SELECT * FROM Cliente";
      $res = $conn->query($sql);

      // if the res has more than 0 rows (not empty), it creates an html table and shows the query res data
      if ($res->num_rows > 0) {
        echo "<table border='1'><tr><th>Name</th><th>Address</th><th>Expenses</th></tr>";
        while($row = $res->fetch_assoc()) {
          echo "<tr><td>".$row["Nombre"]."</td><td>".$row["Direccion"]."</td><td>".$row["Gastos"]."</td></tr>";
        }
        echo "</table>";
      } else {
        echo "0 ress";
      }
      $conn->close();
    
    ?>
    <form action="index.html" class="wrapper">
	    <input type="submit" value="Go back"/>
    </form>

  </body>
</html>
