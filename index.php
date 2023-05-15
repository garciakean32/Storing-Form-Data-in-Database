<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Basura Location</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 2px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

      .button {
        background-color: #1c87c9;
        border: none;
        color: white;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 1px 1px;
        cursor: pointer;
      }

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
/* Style the submit button */
input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: left;
}
</style>



   </head>
   <body>
      <center>

         <h1>Storing Form Data in Database</h1>
         <table>
         <form action="insertrec.php" method="post">

<tr><td>
               <label for="Userid">Id:</label></td><td>
               <input type="text" name="bid" id="bid" required></td></tr>
                   
<tr><td>
               <label for="dname">Name:</label></td><td>
               <input type="text" name="bname" id="bname" required>
               </td>
               <tr><td>
               <label for="email">Email Address:</label></td><td>
               <input type="text" name="address" id="email" required>
               </td></tr>
<tr><td>
               <label for="address">Address:</label></td><td>
               <input type="text" name="email" id="address" required>
               </td></tr>
             

<tr><td>
            <input type="submit" value="Add Record">
            </td> <td>
              <input type="text" id="Search" onkeyup="(myFunction())" placeholder="Search for names.." title="Type in a name">
               </td></tr>
         </form>
 <?php
 // servername => localhost
 // username => root
 // password => empty
 // database name => staff
 $conn = mysqli_connect("localhost", "root", "", "garcia");
  
 // Check connection
 if($conn === false){
     die("ERROR: Could not connect. "
         . mysqli_connect_error());
 }
  
 $sql = "SELECT * FROM data";
 $result = $conn->query($sql);
 
 if ($result->num_rows > 0) {
   // output data of each row
   echo "<table id='myTable' border=2><tr><td>Id</td><td>Name</td><td>Address</td><td>Email</td><td>Action</td></tr>";
   while($row = $result->fetch_assoc()) {
     echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td> " . $row["email"].  "</td><td>" . $row["address"] .   "</td><td><a href=deleterec.php?bid=".$row["id"]." class='button'>Delete </a>  <a href='editrec.php?bid=".$row["id"]."&name=". $row["name"]."&address=".$row["address"]."&email=".$row["email"]. "&credate=" .$row["created"]. "' class='button'>Edit </a>    </td></tr>";
   
    }
 } else {
   echo "0 results";
 }
 $conn->close();


?>
</table>
      </center>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("Search");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>




   </body>
</html>

