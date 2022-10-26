<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Admin</title>
        <style>
<?php include 'style.css'; ?>
</style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src = "includes/script.js"></script>
    </head>
    <body>

        <header> <div class = "wrapper">
           <div class ="chip">
               <img src="images/admin.png" alt="Person" width="90" height="90">Admin</div>
        <nav>
            <ul class="nav_links">
                
                <li ><a href="Home.html">Home</a></li>
             
               <li class = "dd-submenu" onmouseover="moreFunction()" onmouseout="lessFunction()"><a href="#">Accounts<i class="fa fa-fw fa-user"></i></a>
                    <ul id = "more">
                        <li><a id="usermodal">Add</a></li>
                        <li><a id ="editmodal">Edit</a></li>
                    </ul>
                </li>
               
              
             
            </ul>
        </nav>
             </div>
        </header>
    
        <div id="scrollable_Menu">
        
        
<h1 id="ScrollableTitle">Users' List</h1>
<button id="ScrollClose" onclick="ClosePopUp()">X</button>
        <?php            
$conn = mysqli_connect('localhost','john','test1234','foodordering');

if(!$conn){
    echo 'Connection error' . mysqli_connect_error();
} 
            
    $sql= 'SELECT * FROM sys_user';
   
$result = mysqli_query($conn,$sql);
$user = mysqli_fetch_all($result, MYSQLI_ASSOC);
  
            
     if(isset($_POST['Delete'])){
         $id = $_POST['Deleted_ID'];
         $sql = "DELETE FROM sys_user WHERE System_User_ID = $id";
         mysqli_query($conn,$sql);
     }        
       if(isset($_POST['UpdateUser'])){
         $id = $_POST['ID'];
         $userName = $_POST['username'];  
         $email = $_POST['email'];
         $password = $_POST['password'];
         $address = $_POST['address'];
             
        $sql =  "UPDATE sys_user SET System_Name = '$userName',System_User_email='$email',System_User_Address='$address',Password='$password' WHERE System_User_ID='$id'";
         mysqli_query($conn,$sql);
     }        
            
           if(isset($_POST['AddUser'])){
         $id = $_POST['ID'];
         $userName = $_POST['username'];  
         $email = $_POST['email'];
         $password = $_POST['password'];
         $address = $_POST['address'];
             
        $sql =   "INSERT INTO sys_user (System_User_ID,System_Name, System_User_email, System_User_Address,Password)
        VALUES ('$id','$userName','$email','$address','$password')";
         mysqli_query($conn,$sql);
     }       
            
                 if(isset($_POST['AddDish'])){
         $id = $_POST['food-id'];
         $foodName = $_POST['food-name'];  
         $RestID = $_POST['rest-id'];
         $price = $_POST['food-price'];
         $Ingridents = $_POST['food-ing'];
         $prepTime = $_POST['prep'];
        $sql =   "INSERT INTO dish (Dish_ID,Rest_ID, Dish_Name, Dish_Recipe,Price,Time_To_Prepare)
        VALUES ('$id','$RestID','$foodName','$Ingridents','$price','$prepTime')";
         mysqli_query($conn,$sql);
     }     
                             if(isset($_POST['FoodUpdate'])){
         $id = $_POST['food-id'];
         $foodName = $_POST['food-name'];  
         $RestID = $_POST['rest-id'];
         $price = $_POST['food-price'];
         $Ingridents = $_POST['food-ing'];
         $prepTime = $_POST['prep'];
        $sql =   "UPDATE dish SET Dish_Name='$foodName',Rest_ID='$RestID',Dish_Recipe='$Ingridents',Price='$price',Time_To_Prepare='$prepTime' WHERE Dish_ID='$id'";
         mysqli_query($conn,$sql);
     }     
 
 foreach ($user as $user){?>
    <div id="UserList">
    <img src="images/account.png" width=150px hight=150px>
    <h3 id="UserName"><?php echo"Name: ". htmlspecialchars($user['System_Name']); ?></h3>
    <h3 id="UserName"><?php echo"Email: ". htmlspecialchars($user['System_User_email']); ?></h3>
      <h3 id="Address"><?php echo"Address: ". htmlspecialchars($user['System_User_Address']); ?></h3>
        <h3 id="Address"><?php echo"ID: ". htmlspecialchars($user['System_User_ID']); ?></h3>
    </div>
           
<hr>    
  
    <?php } 
    ?>
         
             <form method="post">
            <input type="text" id="Delete_User_txt" name="Deleted_ID" placeholder="Enter User ID">
            
            <button id="Delete_User" type="submit" value="submit" name="Delete">Delete User</button>
            </form>
            
              
        </div>
        
        <div id="scrollable_Menu2">
        <h1 id="ScrollableTitle">Messages List</h1>
<button id="ScrollClose" onclick="ClosePopUp2()">X</button>
 <?php
$sql = 'SELECT * FROM user_message';
$result =  mysqli_query($conn,$sql);
$message = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($message as $message){?>
    <div id="UserList">
    <img src="images/msg.webp" width=150px hight=150px>
    <h3 id="UserName"><?php echo"Message ID:  ". htmlspecialchars($message['Message_ID']); ?></h3>
        <h3 id="UserNum"><?php echo"User: ". htmlspecialchars($message['Sender']); ?></h3>
    <h3 id="MessageContent"><?php echo"Content: ". htmlspecialchars($message['Cust_Message']); ?></h3>
      
    </div>
           
 
            
    <?php }         
?>
        </div>
        
           <div id="scrollable_Menu3">
        <h1 id="ScrollableTitle">Orders List</h1>
<button id="ScrollClose" onclick="ClosePopUp3()">X</button>
 <?php
$sql = 'SELECT * FROM food_order';
$result =  mysqli_query($conn,$sql);
$foodOrder = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($foodOrder as $foodOrder){?>
    <div id="UserList">
    <img src="images/order.png" width=150px hight=150px>
    <h3 id="UserName"><?php echo"Order ID:  ". htmlspecialchars($foodOrder['Order_ID']); ?></h3>
        <h3 id="UserName"><?php echo"Total Price: ". htmlspecialchars($foodOrder['Total_Price']); ?></h3>
         <h3 id="UserName"><?php echo"Order Date:  ". htmlspecialchars($foodOrder['Order_Date']); ?></h3>
    <h3 id="CustNum"><?php echo"Customer ID: ". htmlspecialchars($foodOrder['Customer_ID']); ?></h3>
      
    </div>
      <hr>     
 
            
    <?php }         
?>
        </div>
        
        
        
        
        
        
        
        
        
        
    
        
        
        
        
        <div class = "accounts"><p id = "acc-header">Accounts Management</p>
        <div class = "admin-area">
            <div class = "account-admin" onclick="OpenPopUp2()">
                 <img src="images/envelope.png" height="100pxs"  width="100px">
                    <div class = "imgtext">
                        
                        <span class = "headertext"><strong>Messages</strong></span>
                        <p>View Messages</p>
                </div> 
            </div>  
            
            
            <div onclick="ShowUserList()" class = "account-admin">
                 <div class = "img-admin" ></div>
                    <div class = "imgtext">
                        
                        <span class = "headertext" ><strong>Accounts</strong></span>
                        <p>view and delete users</p>
                       
                </div> 
            </div>  
            
        </div>  
        </div>
            
        

        <div id="acc-modal" class = "modal">
                <div class ="acc-content">
                    <span id ="modalclose">&times;</span>
                        <form action="#" method="POST" class = "adminform">
                              <label class ="admin1">ID <input type="text" name="ID" placeholder="Enter ID" /></label>
                            <label class ="admin1">Username <input type="text" name="username" placeholder="liza.." /></label>
                            <label class ="admin1">Email <input type="email" name="email" placeholder="Email .." /></label>
                            <label class ="admin1">Password <input type="password" name="password" placeholder="password .." /></label>
                            <label class ="admin1">Address <input type="text" name="address" placeholder="Cairo.."/>
                            </label>
                            <input type="submit" name="AddUser" id="adminbtn" value="Add user"/>
                    </form>
                </div>
            </div> 
        
        
        
        
        
        
        
        
        
        
        
        <div id ="acc-modal-edit" class = "modal">
                <div class ="acc-content">
                    <span id ="modalcloseedit">&times;</span>
                    <form action="#" method="POST" class = "adminform-edit">
                          <label>ID <input type="text" name="ID" placeholder="User ID" value="User ID"/></label>
                        <label>Username <input type="text" name="username" placeholder="Last Name .." value="User1"/></label>
                        <label>Email <input type="email" name="email" placeholder="Email .." value="User1@web.com" /></label>
                        <label>Password <input type="password" name="password" placeholder="password .." value="*******"/></label>
                        <label>Address <input name="address" value="Cairo"/>
                        </label>
                        <input type="submit" name="UpdateUser" id="adminbtn" value="Edit user"/>
                    </form>
                </div> </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <div class = "Orders"><p id = "order-header">Orders Management</p>
        <div class = "admin-area">
            <div class = "order-admin">
              
            
            <div onclick="OpenPopUp3()" class = "order-admin">
                 <div class = "img-admin"></div>
                    <div class = "imgtext">
                        
                        <span class = "headertext"><strong onmouseover="orderlist()" onmouseout="orderover()" >Orders</strong></span>
                        <p>Order History</p>
                </div> 
            </div> 
            
             <div class = "order-admin">
                 <div class = "img-admin"></div>
                    <div class = "imgtext">
                        
                        <span class = "headertext"><strong>FAQ</strong></span>
                        <p>Edit help center</p>
                </div> 
            </div> 
        </div> 
        </div>

        <div class = "menus"><p id = "menu-header" onmouseover="buttonmenu()">Menus Management <button id="addmenu">Add to Menu</button> <button id="editmenu">Edit from Menu</button></p>
        <div class = "admin-area">
            <div class = "menu-admin">
                 <div class = "img-admin"></div>
                    <div class = "imgtext">
                        
                        <span class = "headertext"><strong>Restaurants</strong></span>
                        <p>show Restaurants</p>
                </div> 
            </div> 
            
            <div class = "menu-admin">
                 <div class = "img-admin"></div>
                    <div class = "imgtext">
                        
                        <span class = "headertext"><strong>Menus</strong></span>
                        <p>show Menus</p>
                </div> 
            </div> 
            
            
        </div>
            
            
            
            
            
            
            
            
            
        <div id ="menu-modal-add" class ="modal">
            <div class ="acc-content">
                <span id ="modalclosemenu">&times;</span> 
                <form action="#" method="POST" class ="adminform-menu-a">
                    <label>Item Name <input type="text" name="food-name" placeholder="Food Name .." /></label>
                    <label>Item ID <input type="text" name="food-id" placeholder="Food ID..." /></label>
                    <label>Restaurant ID <input type="text" name="rest-id" placeholder="Restaurant ID .." value="Name" /></label>
                    <label>Price <input type="text" name="food-price" placeholder="Food price .." /></label>
                     <label>Time to prepare <input type="text" name="prep" placeholder="Time To prepare..." /></label>
                    <label>Ingredient <textarea name="food-ing" placeholder="Ingredients .. .."></textarea></label>
                    <label>Image<input type="file" name="image" /></label>
                    <input type="submit" name="AddDish" id="adminbtn" value="Add Food Item"/>
                </form>
            </div>
        </div>        
            
            
            
            
            
            
            
            
        <div id ="menu-modal-edit" class ="modal">
            <div class ="acc-content">
                <span id ="modalclosemenue">&times;</span> 
                <form action="#" method="POST" class ="adminform-menu-e">
                    <label>Food ID <input type="text" name="food-id" placeholder="Food ID .." value="Food ID .."/></label>
                    <label>Food Name <input type="text" name="food-name" placeholder="Food Name .." value="Food Name .."/></label>
                    <label>Restaurant ID <input type="text" name="rest-id" placeholder="Restaurant ID .." value="Restaurant ID .." /></label>
                    <label>Price <input type="text" name="food-price" placeholder="Food price .." value="LE" /></label>
                    <label>Ingredients <textarea name="food-ing" placeholder="Ingredients .. .."></textarea></label>
                    <label>Time To Prepare <textarea name="prep" placeholder="Time to prepare .. .."></textarea></label>
                    <label>Image<input type="file" name="image" /></label>
                    <input type="submit" name="FoodUpdate" id="adminbtn" value="Edit Food"/>
                </form>
            </div>
        </div>
        
                <script>
            function ClosePopUp3(){
                scrollable_Menu3.style.display = 'none';
            }     
                    
             function OpenPopUp3(){
                scrollable_Menu3.style.display = 'block';
            }  
                    
            function OpenPopUp2(){
                scrollable_Menu2.style.display = 'block';
            }        
                    
            function ClosePopUp2(){
                scrollable_Menu2.style.display = 'none';
                
            }        
    
            function ClosePopUp(){
                scrollable_Menu.style.display = 'none';
                
            }        
            function ShowUserList(){
                scrollable_Menu.style.display = 'block';
            }        
                    
                    
            var modaladd = document.getElementById("acc-modal");
            var modalbtn = document.getElementById("usermodal");
            var spn = document.getElementById("modalclose");

            
            var modaledit = document.getElementById("acc-modal-edit");
            var modaleditbtn = document.getElementById("editmodal");
            var span = document.getElementById("modalcloseedit");
                        
            var menuadd = document.getElementById("menu-modal-add");
            var menuaddbtn = document.getElementById("addmenu");
            var spanmenu = document.getElementById("modalclosemenu");
                        
            var menuedit = document.getElementById("menu-modal-edit");
            var menueditbtn = document.getElementById("editmenu");
            var spanmenuedit = document.getElementById("modalclosemenue");
            
            modalbtn.onclick = function(){
                modaladd.style.display = 'block';
            }
            spn.onclick = function(){
                modaladd.style.display = 'none';
            }
            
            
            modaleditbtn.onclick = function(){
                modaledit.style.display = 'block';
            }
            span.onclick = function(){
                modaledit.style.display = 'none';
            }            
            menuaddbtn.onclick = function(){
                menuadd.style.display = 'block';
            }
            
            spanmenu.onclick = function(){
                menuadd.style.display = 'none';
            }            
            menueditbtn.onclick = function(){
                menuedit.style.display = 'block';
            }
            
            spanmenuedit.onclick = function(){
                menuedit.style.display = 'none';
            }
            
            function displaytable(){
                document.getElementById("user-list").style.display = 'block';
            }
            function hidetable(){
                document.getElementById("user-list").style.display = 'none';
            }
                    
            function orderlist(){
                document.getElementById("order-list").style.display = 'block';
            }       
            function orderover(){
                document.getElementById("order-list").style.display = 'none';
            }        
            
        </script>
    </body>
</html>