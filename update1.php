<?php
 $con = mysqli_connect('localhost', 'root', '', 'bnbd');

 if (isset($_POST['update'])) {
    $ID= $_POST['id'];
    $Name = $_POST['name'];
    $Price = $_POST['price'];
    $Image = $_FILES['img'];

    print_r($_FILES['img']);

    $img_loc = $_FILES['img']['tmp_name'];
    $img_name = $_FILES['img']['name'];
    $img_des = "uploadimg/" . $img_name;
    move_uploaded_file($img_loc, $img_des);

    mysqli_query($con, "UPDATE product SET `Name`='$Name', `Price`='$Price', `img`='$img_des' WHERE id='$ID'");
    header('location: product.php');
 }
?>