<script>
function sendinfo() {
            let item = localStorage.getItem('item');
            console.log(item);
            fetch("pera.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json;charset=utf-8"
                },
                "body": JSON.stringify({ item })
            })
            .then(function (response){
                return response.text();
                })
            .then(function (data){
                console.log(data); 
            } )
            .catch(error => console.error("Error:", error));

        }

        function whatever(){
         
        if(localStorage.getItem('item') != null) {
        localStorage.removeItem('item');
    }

    if(localStorage.getItem('items') != null) {
        localStorage.removeItem('items');
    }
    window.location.href="login.php";
  }
        </script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>new_order_page_1</title>
    <style>
        .card-img-top {
            height: 300px;
            object-fit: cover;
        }

        body {
  margin: 0;
  padding: 0;
  background-color: #1d2634;
  color: #9e9ea4;
  font-family: 'Montserrat', sans-serif;
}

    </style>
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
    
    <div class='container'>
        <div class='row g-3'>

       <?php
         
         $con=mysqli_connect('localhost','root','','bnbd');
         $data=mysqli_query($con,"SELECT * FROM product");

         while($row = mysqli_fetch_array($data))
         {
                 
            echo"
            <div class='col-4'>
              <div class ='card m-3 p-2 h-100 '>
              <img class ='card-img-top' src='{$row['img']}' alt='Card image'>
              <div class='card-body'>
              <h4 class='card-title'>{$row['Name']}</h4>
              <p class='card-text'>Price: {$row['Price']}</p>
              <button class ='btn btn-primary toadd' onclick='toggleCart(this, \"{$row['pid']}\")'>Add to Cart</button>

            </div>
               </div>
                  </div>";
         }
         
       ?>
       <div class="d-grid gap-2">
      <a href="new_order_page_2.php" target="_blank"> <button type="button" class="btn btn-primary btn-block mb-5 mt-5 " onclick="sendinfo()">Go To Cart</button></a>
       </div>
   
</div>
   </div>

   <script>
   document.addEventListener('DOMContentLoaded', function() {

    document.querySelectorAll('.toadd').forEach(button => {
        let a=button.getAttribute('onclick');
        console.log(a);

        const pid =  button.getAttribute('onclick').match(/toggleCart\(this, "(.+?)"\)/)[1];

        if (getitem(pid)) {

            button.classList.remove('btn-primary');
            button.classList.add('btn-danger');
            button.textContent = 'Cancel';

        } else {

            button.classList.remove('btn-danger');
            button.classList.add('btn-primary');
            button.textContent = 'Add to Cart';

        }
    })});
    

    function instorage(pid){
      let item;
         if(localStorage.getItem('item') === null)
             item=[];
        else
            item = JSON.parse(localStorage.getItem('item'));
        item.push(pid);
        localStorage.setItem('item',JSON.stringify(item));
    }

    function removefromstorage(pid){
      let item=JSON.parse(localStorage.getItem('item'));
      item.forEach((info,index)=>{
        if(info==pid)
           item.splice(index,1);
      });
      localStorage.setItem('item',JSON.stringify(item));
    }

    function getitem(pid){

      let item;
      let flag=false;

      if(localStorage.getItem('item')==null)
         return false;

        else{

          let item=JSON.parse(localStorage.getItem('item'));
          item.forEach((info,index)=>{

        if(info==pid)
         flag=true;

      });
        }
        return flag;     
    }

        function toggleCart(button, pid) {
            if (getitem(pid)) {
                
                removefromstorage(pid);

            button.classList.remove('btn-danger');
            button.classList.add('btn-primary');
            button.textContent = 'Add to Cart';

            } else {
                
              instorage(pid);

             button.classList.remove('btn-primary');
             button.classList.add('btn-danger');
             button.textContent = 'Cancel';

            }
        }
        
    </script>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>