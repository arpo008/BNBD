


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
  $Rec= mysqli_query($con , "SELECT * FROM order_history WHERE `oid` = $ID");
  $data= mysqli_fetch_array($Rec);
?>

<center>
    <div class="main">
        <form action="updatestatus1.php" method="POST" enctype="multipart/form-data">
            <label for=""> order_status </label>
            <input type="text" value="<?php echo $data['order_status']?>" name="name"><br>
            
            <input type="hidden" name="oid" value="<?php echo $data['oid']?>">
            <button type="submit" name="update" class='btn btn-danger m-2'> Update </button>
        </form>
    </div>
</center>
</body>
</html>

