<?php
     $servername="localhost";
	 $username="root";
	 $password="";
	 $dbname="chatapp";
	 $conn = mysqli_connect($servername, $username, $password, $dbname);	
     
	 session_start();
    //print_r($_SESSION);
	 if(!isset($_SESSION["Uname"])){
		header("Location: login.php");
	 }

     $id=$_SESSION["ID"];
     $userid=$_SESSION["Uname"];
     $psd=$_SESSION["Password"];
     $email=$_SESSION["Email"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="unique.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <style>
input[type=text], select {
  width: 70%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=password], select {
  width: 70%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=submit] {
  width: 20%;
  background-color: #008CBA;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}


</style>
    
</head>
<body>
<div class="container-fluid">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="logo-apple"></ion-icon></span>
                        <span class="title">GC Chat</span>
                    </a>
                </li>

                <li>
                    <a href="dashboard.php">
                        <span class="icon"><ion-icon name="laptop-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="sub.php">
                        <span class="icon"><ion-icon name="calendar-outline"></ion-icon></span>
                        <span class="title">Subscription</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="chatbubble-ellipses-outline"></ion-icon></span>
                        <span class="title">Start Chat</span>
                    </a>
                </li>

                <li>
                    <a href="account.php">
                        <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                        <span class="title">Account Settings</span>
                    </a>
                </li>


                <li>
                    <a href="logout.php">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Logout</span>
                    </a>
                </li>
            </ul>
        </div>

      <!-- Main -->
      <div class="main">
         <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
            
            <!-- Searching-->
            <div class="search">
                <label>
                    <input type="text" placeholder="Search Here">
                    <ion-icon name="search-outline"></ion-icon>
                </label>
            </div>

            <!-- userImg-->
            <h3 class="user-text">Hello <?php $myname=$_SESSION['Uname'];
                 $mn=str_replace("'", "", $myname);
                 echo $mn;
                 ?></h3>
            <div class="user">
               <img src="images/<?php echo $_SESSION['image']; ?>"/>   
               
            </div>    
         </div>

         <?php 
   $sql = "SELECT * FROM user WHERE uname=$userid AND password2=$psd";
   $row = mysqli_query($conn,$sql);
   $data = mysqli_fetch_array($row);
?>

         <h2 style="margin: 15px 0;">Account Information</h2>

         
  <form method="post">
    <label for="name">Name</label></br>
    <input type="text" id="fname" name="name" placeholder="Your name.." value=<?php echo $data['uname'];?>></br>

    <label for="email">Email</label></br>
    <input type="text" id="lname" name="email" placeholder="Your last name.." value=<?php echo $data['email'];?>></br>

    <label for="password">Password</label></br>
    <input type="password" id="lname" name="password" placeholder="Your last name.." value=<?php echo $data['password2'];?>></br>

    <label for="number">Phone Number</label></br>
    <input type="text" id="lname" name="number" placeholder="Your last name.." value=<?php echo $data['phone'];?>></br>
   
  
    <input type="submit" name="update"/>
  </form>

      </div>
    </div>

    <?php
       if(isset($_POST['update'])){
          //$id = $_POST['name'];

          $query = "UPDATE `user` SET uname='$_POST[name]', email='$_POST[email]', password2='$_POST[password]', phone='$_POST[number]' where Id=$id";
          $query_run = mysqli_query($conn,$query);

          if($query_run){
              echo '<script type="text/javascript"> alert("Data Updated")</script> ';
              session_unset();
              session_destroy();
        
          
              
          }else{
            echo '<script type="text/javascript"> alert("Data Not Updated")</script> ';
          }
       }   
        
    ?>

    

    <script>
        //MenuToggle
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');

        toggle.onclick = function(){
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }

        //add hovered class in selected list item
        let list = document.querySelectorAll('.navigation li');
        function activeLink(){
            list.forEach((item) =>
            item.classList.remove('hovered'));
            this.classList.add('hovered'); 
        }
        list.forEach((item) =>
        item.addEventListener('mouseover', activeLink));
    </script>
</body>
</html>