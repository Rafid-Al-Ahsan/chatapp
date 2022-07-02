<?php 
    $servername="localhost";
	$username="root";
	$password="";
	$dbname="chatapp";
	$conn = mysqli_connect($servername, $username, $password, $dbname);		

?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	
	
</head>

<body>

<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
			<h1>Create Account</h1>
			<span>use your email for registration</span>
			<input type="text" placeholder="Name" name="name"/>
			<input type="email" placeholder="Email" name="email"/>
			<input type="password" placeholder="Password" name="password"/>
			<input type="text" placeholder="Phone Number" name="number"/>
			<p>Upload a photo<input type="file" placeholder="Chose a photo" id="myFile" name="image"></p>
			<button name="add">Sign Up</button>
		</form>
	</div>

   
	<?php

     if(isset($_POST['add'])){
	    //$result = mysqli_query($conn,"insert user(uname,email,password2,phone) values('$_POST[name]','$_POST[email]','$_POST[password]','$_POST[number]')");   
	    //$success_msg = "User added successfully.";

		/*$errors = array();

		$file_name = $_FILES['add']['name'];
		$file_size = $_FILES['add']['size'];
		$file_tmp = $_FILES['add']['tmp_name'];
		$file_type = $_FILES['add']['type'];
		$file_ext = strtolower(end(explode('.',$file_name)));
		$extensions = array("jpeg","jpg","png");

		if(in_array($file_ext,$extensions) === false){
            $errors[] =  "This extension file is not allowed";   
		}

		if($file_size > 2097152){
			$errors[] = "File size must be 2mb or lower";
		}

		if(empty($errors) == true){
            move_uploaded_file($file_tmp, "upload/". $file_name);
		}else{
			print_r($errors);
			die();
			
		}*/

		$name = $_POST['name'];
		$email = $_POST['email'];
		$psw = $_POST['password'];
		$phone = $_POST['number'];
		$imagename = $_FILES['image']['name'];

		$tmpname = $_FILES['image']['tmp_name'];
		$uploc = 'images/'.$imagename;

		$sql = "INSERT INTO user(uname,email,password2,phone,user_img) VALUES('$name','$email','$psw','$phone','$imagename')";

		if(mysqli_query($conn,$sql) == TRUE){
             move_uploaded_file($tmpname,$uploc);
			 echo '<script type="text/javascript"> alert("Account Created")</script> ';

		}else{
			echo '<script type="text/javascript"> alert("Account Not Created :(")</script> ';
		}

		//$result = mysqli_query($conn,"insert user(uname,email,password2,phone,user_img) values('$_POST[name]','$_POST[email]','$_POST[password]','$_POST[number]','{$file_name}');");
     }



	?>


	<div class="form-container sign-in-container">
		<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
			<h1>Login</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>to use your account</span>
			<input type="text" placeholder="User Name" name="uname"/>
			<input type="password" placeholder="Password" name="password2"/>
			<a href="#">Forgot your password?</a>
			<button name="save">Login</button>
		</form>

		<?php 
             if(isset($_POST['save'])){

				$sql = "SELECT * from user where uname ='$_POST[uname]' and password2 ='$_POST[password2]' ";
				$result = mysqli_query($conn,$sql) or die("Query Failed");

				if(mysqli_num_rows($result) >0){

                   while($row = mysqli_fetch_assoc($result)){
					   session_start();
					   $_SESSION["ID"] = $row['Id'];
					   $_SESSION["Uname"] = "'$_POST[uname]'";
					   $_SESSION["Password"] = "'$_POST[password2]'";
					   $_SESSION["Email"] = $row['email'];
					   $_SESSION["image"] = $row['user_img'];

					   header("Location: dashboard.php");
					   
				   }  
				}else{
                    echo "Password and Username did not match in the database";
				}


			 }
			 
		?>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello!</h1>
				<p>Please enter your personal details</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>


<script>
       const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>

</body>
</html>