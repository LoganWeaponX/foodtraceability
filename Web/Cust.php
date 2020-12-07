
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Dashboard</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
table {
   border-collapse: collapse;
   width: 100%;
   color: #588c7e;
   font-family: monospace;
   font-size: 15px;
   text-align: left;
     } 
  th {
   background-color: #588c7e;
   color: white;
    }
  tr:nth-child(even) {background-color: #f2f2f2}


* {
  box-sizing: border-box;
}

body {
  font-family: Times New Roman;
}

/* Style the header */
header {
 
background-image: url("head.jpeg");
  padding: 30px;
  text-align: center;
  font-size: 20px;
  color: #FF0000;
  margin:5px;
}

/* Container for flexboxes */
section {
  display: -webkit-flex;
  display: flex;
}

/* Style the navigation menu */
nav {

	
  background: #0000CD;
  padding: 20px;
  font-size: 25px;
  color: #FFD700;
 margin:5px;
}

/* Style the list inside the menu */
nav ul {
   list-style-image: none;
  padding: 2;
}

ul.leaf {
list-style-image: url('farm.png');

}

/* Style the content */
article {
  -webkit-flex: 1;
  -ms-flex: 1;
  flex: 1;
  background-color: #f1f1f1;
  padding: 2px;
 margin:5px;
}

/* Style the footer */
footer {
  background-color:#fffdd0;
  padding: 30px;
  text-align: center;
  color: white;
 margin:5px;
}

/* Responsive layout - makes the menu and the content (inside the section) sit on top of each other instead of next to each other */
@media (max-width: 600px) {
  section {
    -webkit-flex-direction: column;
    flex-direction: column;
  }
}
</style>
</head>
<body>


<header>
  <h2>ADMIN DASHBOARD</h2>
<a href="logout.php">Logout</a>
</header>

<section>
  <nav>
    <ul class="leaf">
      <li><a href="farmers.php" style='color:#FFD700'>Farmer</a></li>
      <li><a href="Cust.php" style='color:#FFD700'>Customers</a></li>
      <li><a href="NGO.php" style='color:#FFD700'>NGO's</a></li>
      <li><a href="Sales.php" style='color:#FFD700'>Sales</a></li>    
</ul>
  </nav>
<article>
<table>
 <tr><th>
Customer Details</tr>
<tr>
  <th>ID</th> 
  <th>Customer Name</th> 
  <th>Address</th>
  <th>Contact</th>
  <th>Email ID</th>
  <th>Username</th> 
</tr>
 <?php
$conn = mysqli_connect("localhost", "root", "", "food_traceability");
  // Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
  $sql = "SELECT id, name,address,mobile,email,username  FROM restaurant_reg";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"] . "</td><td>" . $row["address"]. "</td><td>" . $row["mobile"]. "</td><td>" . $row["email"]. "</td><td>" . $row["username"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</article>
</section>

<footer>
  <p>Footer</p>
</footer>

</body>
</html>
