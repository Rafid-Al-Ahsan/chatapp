<?php
     $servername="localhost";
	 $username="root";
	 $password="";
	 $dbname="chatapp";
	 $conn = mysqli_connect($servername, $username, $password, $dbname);	
     
	 session_start();
	 if(!isset($_SESSION["Uname"])){
		header("Location: login.php");
	 }
  
    //  include 'dashboard.php';



    // data select
$select_sql = "SELECT * FROM subcriptionpackage";
$r_sql = $conn -> query($select_sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription page</title>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.0/css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="unique.css">
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
            <section class="pricing">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="pricing-header text-center">
                                <h1><br><b>Go Premium.</b><br><b>Get Awesome.</b></h1>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Table #1  -->
                        <?php if($r_sql -> num_rows>0 ){ ?>
                        <?php while($f_data=$r_sql -> fetch_assoc()) {?>
                        <?php if($f_data['id'] != 4){ ?>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="card text-xs-center">
                                <div class="card-header">
                                    <h1><?php echo $f_data['packagename'];?></h1>
                                    <h4><span class="currency"><?php echo $f_data['packageduration'];?></span>
                                        $<?php echo $f_data['packageprice'];?></h4>
                                    <p class="card-title"> </p>
                                    <a href="buypackage.php?id=<?php echo $f_data['id'] ?>" class="btn btn-info"
                                        role="button">Subscribe Now</a>
                                </div>
                                <div class="card-block">
                                    <ul class="list-group">
                                        <li class="list-group-item"><i class="fa fa-check-circle"
                                                aria-hidden="true"></i>Duration <?php echo $f_data['packageduration'];?>
                                        </li>
                                        <li class="list-group-item"><i class="fa fa-check-circle"
                                                aria-hidden="true"></i>Clean User Interface </li>
                                        <li class="list-group-item"><i class="fa fa-check-circle"
                                                aria-hidden="true"></i>No Ads</li>

                                        <li class="list-group-item"><a
                                                href="buypackage.php?id=<?php echo $f_data['id'] ?>"
                                                class="btn mt-2">Subscribe Now</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php }else{?>
                        <div class="row">
                            <div class="col-12 text-center pricing-bottom">
                                <h3>Or, Try for 30 Days <?php echo $f_data['packagename'];?> Trial</h3><br>
                                <a href="buypackage.php?id=<?php echo $f_data['id'] ?>" class="btn btn-info text-decoration-none">signup for free trial</a>
                                <!-- <button type="button" class="btn btn-info">signup for free trial</button> -->
                            </div>
                        </div>
                        <?php }?>
                        <?php }?>
                        <?php }else{?>

                        <?php }?>

                        
                    </div>

                </div>
            </section>

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

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>