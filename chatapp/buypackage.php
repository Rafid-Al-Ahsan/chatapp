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
     
    

     if(isset($_POST['s-buy'])){
        $username= $_POST['s-name'];
        $email= $_POST['s-email'];
        $spackagename= $_POST['s-packagename'];
        $spackageprice= $_POST['s-packageprice'];
        $spackageduration= $_POST['s-packageduration'];
        $sactivationdate= $_POST['s-activationdate'];
        $sdeactivationdate= $_POST['s-deactivationdate'];
        $insert_sql="INSERT INTO user_subcription_info( username, email, subscribedpackagename, subscribedpackageprice, subscribedpackageduration,activationdate,deactivationdate) VALUES ('$username','$email', '$spackagename',$spackageprice,'$spackageduration', '$sactivationdate','$sdeactivationdate')";
        $query = "SELECT * FROM user_subcription_info WHERE (username = '$username' AND 	DATE('activationdate') <= DATE('$sactivationdate') AND DATE('deactivationdate') <= DATE('$sdeactivationdate')) OR 	subscribedpackagename = 'Free'";
        $result = mysqli_query($conn,$query);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                header("location:dashboard.php");
            } else {
                $conn -> query($insert_sql);
                header("location:dashboard.php");
            }
          } else {
            echo 'Error: '.mysql_error();
          }

        // if($conn -> query($insert_sql)){
            // echo '<script language="javascript">';
            // echo 'alert("Subscribed Successfully"); location.href="dashboard.php"';
            // echo '</script>';
        //     header("location:dashboard.php");
        // }
        // else{
        //     die($conn -> error );
        // }

            //WHERE (username = '$username' AND DATE(activationdate) <= DATE($sactivationdate) AND DATE(deactivationdate) > DATE($sdeactivationdate)) OR subscribedpackagename<>'Free'
            // if($user_check -> num_rows >0){
            //     while($fe_data=$user_check -> fetch_assoc()){
            //         if(($fe_data['username'] == $_POST['s-name'] && $fe_data['activationdate'] <= $_POST['s-activationdate'] && $fe_data['deactivationdate'] >= $_POST['s-deactivationdate']) || ($fe_data['subscribedpackagename'] == 'Free') ){
            //             echo '<script language="javascript">';
            //             echo 'alert("You cannot buy another package. You have an activated package"); location.href="dashboard.php"';
            //             echo '</script>';
            //             header("location:dashboard.php");
            //         }
            //     }
            // }
            // if(mysqli_num_rows($user_check) > 0){
            //     while($fe_data=$user_check -> fetch_assoc()){
            //         if(True){
            //             echo '<script language="javascript">';
            //             echo 'alert("You cannot buy another package. You have an activated package"); location.href="dashboard.php"';
            //             echo '</script>';
            //             header("location:dashboard.php");
            //         }
            //         else{
            //             die($conn -> error );
            //         }
            //     }
            // }else{
           
                
            
}
    


     // db select
if(isset($_GET['id'])){
    $package_id=$_GET['id'];
    $select_sql="SELECT id, packagename,packageprice,packageduration FROM subcriptionpackage WHERE id=$package_id";
    $s_query=$conn -> query($select_sql);
    if($s_query -> num_rows >0){
        while($f_data=$s_query -> fetch_assoc()){
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
                 ?></h5>
                <div class="user">
                    <img src="images/<?php echo $_SESSION['image']; ?>" />

                </div>
            </div>

            <!-- form -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="px-3">
                <h1 class="text-info">Buy Package</h1>
                <input type="hidden" name="edit_id">
                <?php 
                 $myname=$_SESSION['Uname'];
                 str_replace("'", "", $myname);
                 $c_sql="SELECT * FROM user WHERE uname = $myname";
                 $user_c=$conn -> query($c_sql);
                 while($fu_data=$user_c -> fetch_assoc()){
                 ?>
                <div class="mb-3">
                    <label for="s-name" class="form-label">Enter User Name</label>
                    <input type="text" value="<?php echo $fu_data['uname'];?>" class="form-control s-name" id="s-name"
                        name="s-name" readonly>
                </div>
                <div class="mb-3">
                    <label for="s-email" class="form-label">Enter Email</label>
                    <input type="email" value="<?php echo $fu_data['email'] ;?>" class="form-control s-email"
                        id="s-email" name="s-email" readonly>
                </div>
                <?php }?>
                <div class="mb-3">
                    <label for="s-packagename" class="form-label">Selected Package Name</label>
                    <input type="text" value="<?php echo $f_data['packagename'];?>" class="form-control s-packagename"
                        id="s-packagename" name="s-packagename" readonly>
                </div>
                <div class="mb-3">
                    <label for="s-packageprice" class="form-label">Selected Package Price</label>
                    <input type="number" value="<?php echo $f_data['packageprice'];?>"
                        class="form-control s-packageprice" id="s-packageprice" name="s-packageprice" readonly>
                </div>
                <div class="mb-3">
                    <label for="s-packageduration" class="form-label">Selected Package Duration</label>
                    <input type="text" value="<?php echo $f_data['packageduration'];?>"
                        class="form-control s-packageduration" id="s-packageduration" name="s-packageduration" readonly>
                </div>
                <div class="mb-3">
                    <label for="s-activationdate" class="form-label">Package Activation Date</label>
                    <input type="date" name="s-activationdate" value="<?php echo date("Y-m-d") ?>" id="s-activationdate"
                        readonly>
                </div>
                <div class="mb-3">
                    <label for="s-deactivationdate" class="form-label">Package Deactivation Date</label>
                    <input type="date" name="s-deactivationdate"
                        value="<?php $pd=$f_data['packageduration']; $deacvdate = date("Y-m-d", strtotime("+$pd", strtotime(date("Y/m/d")))); echo $deacvdate;?>"
                        readonly>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="s-buy">BUY</button>
                    <button type="reset" class="btn btn-secondary">RESET</button>
                </div>
            </form>
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
<?php
    }
      
    }else{

        header("location:sub.php");
    }
}else{
    header("location:sub.php");
}
?>