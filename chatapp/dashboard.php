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
     $u_name=$_SESSION["Uname"];

     // data select
$select_sql = "SELECT username, email, subscribedpackagename, activationdate, deactivationdate FROM user_subcription_info WHERE username=$u_name";
$r_sql = $conn -> query($select_sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=  , initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="unique.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <div class="">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="logo-apple"></ion-icon>
                        </span>
                        <span class="title">GC Chat</span>
                    </a>
                </li>

                <li>
                    <a href="dashboard.php">
                        <span class="icon">
                            <ion-icon name="laptop-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="sub.php">
                        <span class="icon">
                            <ion-icon name="calendar-outline"></ion-icon>
                        </span>
                        <span class="title">Subscription</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                        </span>
                        <span class="title">Start Chat</span>
                    </a>
                </li>

                <li>
                    <a href="account.php">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Account Settings</span>
                    </a>
                </li>


                <li>
                    <a href="logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
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
                <h5 class="user-text">Hello <?php $myname=$_SESSION['Uname'];
                 $mn=str_replace("'", "", $myname);
                 echo $mn;
                 ?>
                 </h5>
                <div class="user">
                    <img src="images/<?php echo $_SESSION['image']; ?>" />

                </div>
            </div>

            <!-- table -->
            <div class="custom-table mt-5">
                <h2 class="my-3 ml-3">Subscribed Packages</h2>
            <table class="table table-bordered text-center mx-3 " id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Package Name</th>
                        <th>Subscription Status</th>
                        <th>Subscription Date</th>
                        <th>Expire Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($r_sql -> num_rows>0){ ?>
                    <?php while($f_data=$r_sql -> fetch_assoc()) {?>
                    <tr>
                        <td><?php echo $f_data['username'];?></td>
                        <td><?php echo $f_data['email'];?></td>
                        <td><?php echo $f_data['subscribedpackagename'];?></td>

                        <?php if($f_data['deactivationdate'] <= date("Y-m-d") ){ ?>
                        <td class="color-gray"><?php echo "Deactivated";?></td>

                        <?php }else{ ?>
                        <td class="color-green"><?php echo "Activated";?></td>
                        <?php }?>

                        <td><?php echo $f_data['activationdate'];?></td>
                        <td><?php echo $f_data['deactivationdate'];?></td>

                    </tr>
                    <?php }?>
                    <?php }else{?>
                    <tr>
                        <td colspan="6">
                            <p class="mb-0">No Data In The Database</p>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
            </div>

        </div>
    </div>

    <script>
    //MenuToggle
    let toggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation');
    let main = document.querySelector('.main');

    toggle.onclick = function() {
        navigation.classList.toggle('active');
        main.classList.toggle('active');
    }

    //add hovered class in selected list item
    let list = document.querySelectorAll('.navigation li');

    function activeLink() {
        list.forEach((item) =>
            item.classList.remove('hovered'));
        this.classList.add('hovered');
    }
    list.forEach((item) =>
        item.addEventListener('mouseover', activeLink));
    </script>
    <!-- Header end -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>