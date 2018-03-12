<?php
 $connection = mysqli_connect('127.0.0.1', 'root' , 'mypass123', 'auto');
if ($connection->mysqli_connect_error)
{
  echo "Not connected";
  exit();
}
$result = mysqli_query($connection, "SELECT * FROM `Orders`");
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <title>Bootstrap Example</title>
  <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>

 <div class="container">
   <h2>Orders</h2>
   <table class="table">
     <thead>
       <tr>
         <th>Id of Order</th>
         <th>Name of Car</th>
         <th>Name of User</th>
         <th> Surname of User </th>
         <th>Telephone number </th>
         <th>Price </th>
       </tr>
     </thead>
     <tbody>
<?php
while ($row = mysqli_fetch_assoc($result))
{
echo '<tr><td>'.$row['id'].'</td><td>'.$row['car_title'].'</td>.<td>'.$row['user_name'].'</td><td>'.$row['surname'].'</td><td>'.$row['tel_number'].'</td><td>'.$row['price'].'</td></tr>';
}
?>
     </tbody>
   </table>
 </div>

 </body>
 </html>
