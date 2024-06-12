

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <link rel="stylesheet" href="product.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<style>
    input{
        margin: 10px;
    }
</style>
</head>
<body>
<?php
  $con = mysqli_connect('localhost', 'root', '', 'bnbd');
  $ID= $_GET['id'];
  $Rec= mysqli_query($con , "SELECT * FROM product WHERE pid = $ID");
  $data= mysqli_fetch_array($Rec);
?>

<center>
    <div class="main">
        <form action="update1.php" method="POST" enctype="multipart/form-data">
            <label for=""> Name: </label>
            <input type="text" value="<?php echo $data['Name']?>" name="name"><br>
            <label for=""> Price : </label>
            <input type="text" value="<?php echo $data['Price']?>" name="price" id=""><br>
            <label for=""> Image: </label>
            <input type="file" name="img"><img src="<?php echo $data['img']?>" width='200px' height='70px'><br>
            <input type="hidden" name="pid" value="<?php echo $data['pid']?>">
            <button type="submit" name="update" class='btn btn-danger m-2'> Update </button>
        </form>
    </div>
</center>
</body>
</html>
