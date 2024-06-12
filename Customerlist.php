<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="product.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

</head>
<body>
   

<div class="container">

<table class="table">
  <thead>
    <tr>
      <th scope="col"> id</th>
      <th scope="col">Name</th>
      <th scope="col">email</th>
      <th scope="col">Age</th>
      <th scope="col">Address</th>
      <th scope="col">Number</th>

      
      <th></th>
      <th ></th>
     
    </tr>
  </thead>
  <tbody>
       
  <?php
   $con = mysqli_connect('localhost', 'root', '', 'bnbd'); 
   $pic=mysqli_query($con , "SELECT * FROM customer");

   while($row = mysqli_fetch_array($pic))
                {
                    echo "
                    <tr>
                        <td>{$row['cid']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['Age']}</td>
                        <td>{$row['address']}</td>
                        <td>{$row['number']}</td>
                       
                        
                        
                        
                        
                    </tr>
                    ";
                }


?>
   
</tbody>
     </table>
           </div>
           <a  href="admindashboard.php" > Back </a>
            </body>
                   </html>
