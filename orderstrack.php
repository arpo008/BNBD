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
      <th scope="col"> order no </th>
      <th scope="col">Order Status </th>
      
      <th></th>
      <th ></th>
     
    </tr>
  </thead>
  <tbody>
       
  <?php
   $con = mysqli_connect('localhost', 'root', '', 'bnbd'); 
   $pic=mysqli_query($con , "SELECT * FROM order_history");

   while($row = mysqli_fetch_array($pic))
                {
                    echo "
                    <tr>
                        <td>{$row['oid']}</td>
                        <td>{$row['order_status']}</td>
                       
                        
                        
                        <td><a href='updatestatus.php? id={$row['oid']}' class='btn btn-danger'>Update</a></td>
                        
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
