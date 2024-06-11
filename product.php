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
    <center>
        <div class="main">
  <form action="insert.php" method="POST" enctype="multipart/form-data">
  <label>ID: </label>
    <input type="text" name="pid"><br>
    <label> Name: </label>
    <input type="text" name="name"><br>
    <label> Price : </label>
    <input type="text" name="price" id=""><br>
    <label> Image: </label>
    <input type="file" name="img"><br>

    <button name="upload"> UPLOAD </button>

</form>
</div>
</center>

<div class="container">

<table class="table">
  <thead>
    <tr>
      <th scope="col"> ID </th>
      <th scope="col"> Product Name </th>
      <th scope="col">  Price  </th>
      <th scope="col"> Image </th>
      <th></th>
      <th ></th>
     
    </tr>
  </thead>
  <tbody>
       
  <?php
   $con = mysqli_connect('localhost', 'root', '', 'bnbd'); 
   $pic=mysqli_query($con , "SELECT * FROM product");

   while($row = mysqli_fetch_array($pic))
                {
                    echo "
                    <tr>
                        <td>{$row['pid']}</td>
                        <td>{$row['Name']}</td>
                        <td>{$row['Price']}</td>
                        <td><img src='{$row['img']}' width='100px' height='70px'></td>
                        <td><a href='delete.php? id={$row['pid']}' class='btn btn-danger'>Delete</a></td>
                        <td><a href='update.php? id={$row['pid']}' class='btn btn-danger'>Update</a></td>
                        
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
