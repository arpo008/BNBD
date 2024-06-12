
<?php
 session_start();
   if(isset($_SESSION['arr'])){
       $ar=$_SESSION['arr'];
   }
   else{
     echo " No Data Entry";
     exit;
   }   
   $ar = json_decode($ar[0]);
   foreach($ar as $sum)
   echo $sum." ";
?>
<script>
function increment(id,price) {
    let input = document.getElementById(id);
    input.value = parseInt(input.value) + 1;
    id=id.split('_')[1];
    
 
    updateprice(id,input.value,price);
}

function decrement(id,price) {
    let input = document.getElementById(id);
    if (parseInt(input.value) > 0) {
        input.value = input.value - 1;
        id=id.split('_')[1];
       updateprice(id,input.value,price);
    }
}

function updateprice(id, quantity, price) {
    let totalprice = quantity * price;
    let priceid = document.getElementById("total_price_" + id);
        priceid.textContent = totalprice;
        return totalprice;
   
}

document.addEventListener('DOMContentLoaded', function() {

document.querySelectorAll('.drama').forEach(button => {
     let a=button.getAttribute('onclick');
     console.log(a);
    const pid =  a.match(/togglecart\(this,["'](.+?)["']\)/)[1];
    console.log(pid);

    if (getitem(pid)) {

        button.classList.remove('btn-primary');
        button.classList.add('btn-danger');
        button.textContent = 'Cancel';

    } else {

        button.classList.remove('btn-danger');
        button.classList.add('btn-primary');
        button.textContent = 'order';

    }
})});


function instorage(itemobj){
      let items;
         if(localStorage.getItem('items') === null)
             items=[];
        else
            items = JSON.parse(localStorage.getItem('items'));
        items.push(itemobj);
        localStorage.setItem('items',JSON.stringify(items));
    }

function getitem(pid){

       let items;
       let flag=false;

       if(localStorage.getItem('items')==null)
        return false;

  else{

    let items=JSON.parse(localStorage.getItem('items'));
    items.forEach((info,index)=>{

  if(info.pid==pid)
   flag=true;

});
  }
  return flag;     
}


function removefromstorage(pid){
      let items=JSON.parse(localStorage.getItem('items'));
      items.forEach((info,index)=>{
        if(info.pid==pid)
           items.splice(index,1);
      });
      localStorage.setItem('items',JSON.stringify(items));
    }

function togglecart(button, pid,qua_id,price) {
    let quantity = document.getElementById(qua_id);
    quantity=parseInt(quantity.value);
    if(quantity>0){
        if (getitem(pid)) {
                
                removefromstorage(pid);

            button.classList.remove('btn-danger');
            button.classList.add('btn-primary');
            button.textContent = 'Order';

            } else {
               console.log(pid+" "+qua_id+" "+price)
                let quantity = document.getElementById(qua_id);
                quantity=parseInt(quantity.value);
                price=parseInt(price);
                let totalprice=price*quantity;
                let itemobj={
                    pid:pid,
                    quantity:quantity,
                    totalprice:totalprice
                };
               instorage(itemobj);

             button.classList.remove('btn-primary');
             button.classList.add('btn-danger');
            button.textContent = 'Cancel';

            }
    }
      console.log("From togglecart");

        }
     
       /* function sendinfo() {
    let items = localStorage.getItem('items');
    fetch("customer_to_sql.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json;charset=utf-8"
        },
        body: JSON.stringify({ items })
    }).catch(error => console.error("Error:", error));
}*/


        function sendinfo() {
            let items = localStorage.getItem('items');
            console.log(items);
            fetch("pera2.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json;charset=utf-8"
                },
                "body": JSON.stringify({ items })
            })
            .then(function (response){
                return response.text();
                })
             .then(function (data){
                console.log(data); 
            } )
            .catch(error => console.error("Error:", error));
        }

        function callotherfunction(){
          if(localStorage.getItem('items')!=null)
          {
            if(localStorage.getItem('item')!=null)
            localStorage.removeItem('item');
           sendinfo();

        window.location.href = "customer_to_sql.php";
          }
          else{
            alert("Please Order something");
            window.location.href = "new_order_page_2.php";
          }


        }

        function whatever(){
  
    window.location.href="login.php";
    if(localStorage.getItem('item') != null) {
        localStorage.removeItem('item');
    }

    if(localStorage.getItem('items') != null) {
        localStorage.removeItem('items');
    }
  }

</script>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <title>new order page 2.php</title>

</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Bnbd</a>
    </div>
    <button class="btn btn-danger navbar-btn" onclick="whatever()">Logout</button>
  </div>
</nav>
<div class="container">

<table class="table">
  <thead>
    <tr>
      <th> ID </th>
      <th>Product Name </th>
      <th> Price  </th>
      <th> Image </th>
      <th >Quantity</th>
      <th></th>
      <th>Total Price</th>
      <th></th>
     
    </tr>
  </thead>
  <tbody>
       
  <?php
  
   $con = mysqli_connect('localhost', 'root', '', 'bnbd'); 
   $data=mysqli_query($con , "SELECT * FROM product");

 

   while($row = mysqli_fetch_array($data))
                {
                    $id=$row['pid'];
                    if(in_array($id,$ar)){
                        echo "
                        <tr >
                            <td>{$id}</td>
                            <td>{$row['Name']}</td>
                            <td>{$row['Price']}</td>
                            <td><img src='{$row['img']}' width='100px' height='100px'></td>
                            <td><input type='text' id='quantity_{$id}' name='quantity_{$id}' value='0' style='width:75px'></td>
                           <td class='btn-group'>
                                <button class='btn btn-primary btn-sm ' onclick='increment(\"quantity_{$id}\",{$row['Price']})'>+</button>
                                <button class='btn btn-primary btn-sm ' onclick='decrement(\"quantity_{$id}\",{$row['Price']})'>-</button>
                            </td>
                        <td id='total_price_{$id}'>0</td>
                        
                            <td><button class='btn btn-success btn-sm drama' onclick='togglecart(this,\"{$row['pid']}\",\"quantity_{$id}\",\"{$row['Price']}\")' >Order</button></td>
    
                            
                        </tr>
                        ";
                    }
              
                }
?>
</tbody>
            </table>
            <div class="d-grid">
       <button type="button" class="btn btn-primary btn-block" onclick="callotherfunction()">Confirm</button>
   </div>
            </div>
</body>
</html>