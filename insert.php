<?php
$con = mysqli_connect('localhost', 'root', '', 'bnbd');

if (isset($_POST['upload'])) {
    $ID=$_POST['id'];
    $Name = $_POST['name'];
    $Price = $_POST['price'];
    $Image = $_FILES['img'];

    print_r($_FILES['img']);

    $img_loc = $_FILES['img']['tmp_name'];
    $img_name = $_FILES['img']['name'];
    $img_des = "uploadimg/" . $img_name;

       if (move_uploaded_file($img_loc, $img_des)) {
        // Prepare the SQL statement
        $sql = "INSERT INTO product (id, `Name`, Price, `img`) VALUES ('$ID','$Name', '$Price', '$img_des')";
        
       
        if (mysqli_query($con, $sql)) {
            echo "Data successfully inserted into the database.";
        } else {
            echo "Error inserting data: " . mysqli_error($con);
        }
    } else {
        echo "Failed to move the uploaded file.";
    }
}
?>
