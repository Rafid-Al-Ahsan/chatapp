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

     $userid=$_SESSION["Uname"];
     $psd=$_SESSION["Password"];
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
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}

.button {
  background-color: #008CBA;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
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

         <h2 style="text-align:center; margin: 15px 0;">Account Information</h2>

<div class="container">

  <div class="row">
   
    <table id="customers">
      
        <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Password</th>
          <th scope="col">Phone</th>
          <th scope="col">Image</th>
          <th scope="col">Operations</th>
        </tr>
        </thead>
    
    

    
  </div>
    

</div>
<?php 
   $sql = "SELECT * FROM user WHERE uname=$userid AND password2=$psd";
   $row = mysqli_query($conn,$sql);
   $data = mysqli_fetch_array($row);
?>

<tr>
       <td><?php echo $data['uname']; ?></td>
       <td><?php echo $data['email']; ?></td>
       <td><?php echo $data['password2']; ?></td>
       <td><?php echo $data['phone']; ?></td>
       <!--<td><?php// echo $data['user_img']; ?></td>-->
       <td><img style="width:100px;" src="images/<?php echo $_SESSION['image']; ?>"/> </td>
       <td><form action="settings.php" class="d-flex"><button class='button'>Edit</button></form></td>


     </tr>

    </table>
      </div>
    </div>

    

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