<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
   
</head>
<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand nav-brand-custom" style="color:#107751 ;" href="#"><img src="images/logo.jpg" alt="logo"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item nav-item-custom">
                <a class="nav-link" style="color: #107751; padding: 10px 20px 10px 20px;" href="#">Home</a>
              </li>
              <li class="nav-item nav-item-custom">
                <a class="nav-link" style="color:#107751;" href="#pricing">Pricing</a>
              </li>
              <li class="nav-item nav-item-custom">
                <a class="nav-link"  style="color:#107751;" href="#contact">Contact Us</a>
              </li>
            </ul>
          </div>

          <form action="login.php" class="d-flex">
                <button class="nav-btn">Login / Sign Up</button>
          </form>
        </div>
      </nav>

      

      <section class = "landing-page">
        <div class = "container">
            <div class = "row">
                <div class = "col-lg-6 col-md-6 landing-page-left">

                    <span class = "typing-animation"></span></br>
                    <form action="login.php">
                    <button class="button landing-page-btn">Get Started</button>
                    </form>
                  
                </div>

                <div class = "col-lg-6 col-md-6">
                   <img src="images/chatting.png" alt="images of chatting" style="width: 100%;">
                </div>

            </div>
        </div>
    </section>


    <section class="pricing" id="pricing">
      <div class="container">
     
          <div class="row flex-items-xs-middle flex-items-xs-center">
              <!-- Table #1  -->
              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                  <div class="card text-xs-center">
                      <div class="card-header">
                          <h1>Silver</h1>
                          <h4><span class="currency">1 Month</span> $10</h4>
                          <p class="card-title"> </p>
                          <a href="sub.php" class="btn btn-info" role="button">Subscribe Now</a>
                      </div>
                      <div class="card-block">
                          <ul class="list-group">
                              <li class="list-group-item"><i class="fa fa-check-circle" aria-hidden="true"></i>Duration 1 month</li>
                              <li class="list-group-item"><i class="fa fa-check-circle" aria-hidden="true"></i>Clean User Interface </li>
                              <li class="list-group-item"><i class="fa fa-check-circle" aria-hidden="true"></i>No Ads</li>
                          
                              <li class="list-group-item"><a href="sub.php" class="btn mt-2">Subscribe Now</a></li>
                          </ul>
                      </div>
                  </div>
              </div>

              <!-- Table #2  -->
              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                  <div class="card text-xs-center">
                      <div class="card-header">
                          <h1>Gold</h1>
                          <h4><span class="currency">6 Month</span> &100</h4>
                          <a href="sub.php" class="btn btn-info" role="button">Subscribe Now</a>
                      </div>
                      <div class="card-block">
                          <ul class="list-group">
                              <li class="list-group-item"><i class="fa fa-check-circle" aria-hidden="true"></i>Duration 6 month</li>
                              <li class="list-group-item"><i class="fa fa-check-circle" aria-hidden="true"></i>Clean User Interface </li>
                              <li class="list-group-item"><i class="fa fa-check-circle" aria-hidden="true"></i>No Ads</li>
                              <li class="list-group-item"><a href="sub.php" class="btn mt-2">Subscribe Now</a></li>
                          </ul>
                      </div>
                  </div>
              </div>

              <!-- Table #3  -->
              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                  <div class="card text-xs-center">
                      <div class="card-header">
                          <h1>Platinum</h1>
                          <h4><span class="currency">1 Year</span> $200</h4>
                          <a href="sub.php" class="btn btn-info" role="button">Subscribe Now</a>
                      </div>
                      <div class="card-block">
                          <ul class="list-group">
                              <li class="list-group-item"><i class="fa fa-check-circle" aria-hidden="true"></i>Duration 1 year</li>
                              <li class="list-group-item"><i class="fa fa-check-circle" aria-hidden="true"></i>Clean User Interface </li>
                              <li class="list-group-item"><i class="fa fa-check-circle" aria-hidden="true"></i>No Ads</li>
                              <li class="list-group-item"><a href="sub.php" class="btn mt-2">Subscribe Now</a></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
          
      </div>
  </section>

  <section id="contact" class="contact-style">
    <div class="container">
		<div class="row">

			<div class="col-lg-4 col-md-4 contact-contents">
				<img src="images/style-me.png" style="width: 40%;">
			</div>

      <div class="col-lg-4 col-md-4 contact-contents">
		<h3>About Us</h3>
         <p>Gcchat is a web based chat application which focuses of light weight and use friendly ecosystem. This applications
          is built from groudup by a group of interns in Grameen communication. Initially this applications is to be used for internal
          purposes in grameen communication and later made avaliable to the public.</p>
			</div>

      <div class="col-lg-4 col-md-4 contact-contents">
        <h3 style="margin-left: 8%;">Contact Us</h3>
        <!--<i class="fa fa-phone" aria-hidden="true"><h5>0153430266</h5></i>
        <i class="fa fa-envelope-o" aria-hidden="true"></i><h5>rafidahsan78@gmail.com</h5>
        <i class="fa fa-map-marker" aria-hidden="true"></i><h5>Mirpur 1, Dhaka-1216, Zoo Road</h5>-->

        <ul>
            <li><i class="fa fa-envelope-o" aria-hidden="true"></i>rafidahsan78@gmail.com</li>
            <li><i class="fa fa-phone" aria-hidden="true"></i>0153430266</li>
            <li><i class="fa fa-map-marker" aria-hidden="true"></i>Mirpur 1, Dhaka-1216, Zoo Road</li>
         </ul> 
     </div>

		</div>
	</div>

<div class = "copyright">

<div class = "container-fluid">

   <div class = "row">
      <div class= "col-lg-12 col-md-12">
          <div class = "copyright-text">Copyright © 2021 All rights reserved | This website is made by <span style = "color: rgb(238, 202, 136)">GC Intern Team</span></div>
      </div>
   </div>
</div> 
</div>
</section>




    <script src = "js/typed.min.js"></script>

    <script>

      /*--------------------- typing js ---------------------------------------*/
         var typed = new Typed('.typing-animation', {
               strings: ["Fast and Reliable communication at your fingertips"],
                typeSpeed: 40,
                loop: true,
                startDelay: 2000,
                backSpeed: 40,
                backDelay: 5000,
         });

         /*---------------------mobile navbar ---------------------------------------*/
         $(document).ready(function(){
              
           $(".navbar-toggler, .overlay").on("click", function(){
               $(".mobileMenu, .overlay").toggleClass("open");     
           });   
       });
       
      
    </script>

    
</body>
</html>