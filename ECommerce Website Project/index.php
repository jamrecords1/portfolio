<link rel = "icon" href = "img/icon/cutlery.png" 
        type = "image/x-icon">
<!-------------------Douglas----------------------------------------------------->
<?php 

session_start();
include('header.php'); 

?>
<body>

<?php include('navbar.php'); ?>
<style>
	.panel-body img{
	    width: 100%;
	    height: 23rem;
	    object-fit: cover;
	}

</style>
<!------------------------------------------------------------Julayco--------------------------------------------------------->
<style>




	p{
		color: ghostwhite;
	}
	 h1 {
  margin: 0;
  font-size: 48px;
  font-weight: 700;
  line-height: 56px;
  color: #fff;
  font-family: "Poppins", sans-serif;
   color: #cda45e;
}
	#hero {
  width: 100%;
  height: 100vh;
  background: url("img/res1.jpg") top center;
  background-size: cover;
  position: relative;
  padding: 0;
}
#hero:before {
  content: "";
  background: rgba(0, 0, 0, 0.5);
  position: absolute;
  bottom: 0;
  top: 0;
  left: 0;
  right: 0;
}
	
#hero h1 {
  margin: 0;
  font-size: 48px;
  font-weight: 700;
  line-height: 56px;
  color: #fff;
  font-family: "Poppins", sans-serif;
}
#hero h1 span {
  color: #cda45e;
}
#hero h2 {
  color: #eee;
  margin-bottom: 10px 0 0 0;
  font-size: 22px;
}
#hero .btns {
  margin-top: 30px;
}
#hero .btn-menu, #hero .btn-book {
  font-weight: 600;
  font-size: 13px;
  letter-spacing: 0.5px;
  text-transform: uppercase;
  display: inline-block;
  padding: 12px 30px;
  border-radius: 50px;
  transition: 0.3s;
  line-height: 1;
  color: white;
  border: 2px solid #cda45e;
}
#hero .btn-menu:hover, #hero .btn-book:hover {
  background: #cda45e;
  color: #fff;
}
#hero .btn-book {
  margin-left: 30px;
}
  #hero .container {
    padding-top: 250px;
    padding-bottom: 60px;
  }
}
@media (max-width: 768px) {
  #hero h1 {
    font-size: 28px;
    line-height: 36px;
  }
  #hero h2 {
    font-size: 18px;
    line-height: 24px;
  }
}
# About
--------------------------------------------------------------*/
.breadcrumbs {
  padding: 15px 0;
  background: #1d1b16;
  margin-top: 110px;
}
@media (max-width: 992px) {
  .breadcrumbs {
    margin-top: 98px;
  }
}
.breadcrumbs h2 {
  font-size: 26px;
  font-weight: 300;
}
.breadcrumbs ol {
  display: flex;
  flex-wrap: wrap;
  list-style: none;
  padding: 0;
  margin: 0;
  font-size: 14px;
}
.breadcrumbs ol li + li {
  padding-left: 10px;
}
.breadcrumbs ol li + li::before {
  display: inline-block;
  padding-right: 10px;
  color: #37332a;
  content: "/";
}
@media (max-width: 768px) {
  .breadcrumbs .d-flex {
    display: block !important;
  }
  .breadcrumbs ol {
    display: block;
  }
  .breadcrumbs ol li {
    display: inline-block;
  }
}

/*--------------------------------------------------------------
# About
--------------------------------------------------------------*/
.about {
  background: url("img/ramsey.png") center center;
  background-size: cover;
  position: relative;
  padding: 80px 0;
}
.about:before {
  content: "";
  background: rgba(0, 0, 0, 0.5);
  position: absolute;
  bottom: 0;
  top: 0;
  left: 0;
  right: 0;
}
.about .about-img {
  position: relative;
  transition: 0.5s;
}
.about .about-img img {
  max-width: 100%;
  border: 4px solid rgba(255, 255, 255, 0.2);
  position: relative;
}
.about .about-img::before {
  position: absolute;
  left: 20px;
  top: 20px;
  width: 60px;
  height: 60px;
  z-index: 1;
  content: "";
  border-left: 5px solid #cda45e;
  border-top: 5px solid #cda45e;
  transition: 0.5s;
}
.about .about-img::after {
  position: absolute;
  right: 20px;
  bottom: 20px;
  width: 60px;
  height: 60px;
  z-index: 2;
  content: "";
  border-right: 5px solid #cda45e;
  border-bottom: 5px solid #cda45e;
  transition: 0.5s;
}
.about .about-img:hover {
  transform: scale(1.03);
}
.about .about-img:hover::before {
  left: 10px;
  top: 10px;
}
.about .about-img:hover::after {
  right: 10px;
  bottom: 10px;
}
.about .content h3 {
  font-weight: 600;
  font-size: 26px;
  color: white;
}
.about .content ul {
  list-style: none;
  padding: 0;
}
.about .content ul li {
  padding-bottom: 10px;
}
.about .content ul i {
  font-size: 20px;
  padding-right: 4px;
  color: #cda45e;
}
.about .content p:last-child {
  margin-bottom: 0;
}
@media (min-width: 1024px) {
  .about {
    background-attachment: fixed;
  }
}

# Chefs
--------------------------------------------------------------*/
.chefs .member {
  text-align: center;
  margin-bottom: 20px;
  background: #343a40;
  position: relative;
  overflow: hidden;
}
.chefs .member .member-info {
  opacity: 0;
  position: absolute;
  bottom: 0;
  top: 0;
  left: 0;
  right: 0;
  transition: 0.2s;
}
.chefs .member .member-info-content {
  position: absolute;
  left: 0;
  right: 0;
  bottom: 10px;
  transition: bottom 0.4s;
}
.chefs .member .member-info-content h4 {
  font-weight: 700;
  margin-bottom: 2px;
  font-size: 18px;
  color: #fff;
}
.chefs .member .member-info-content span {
  font-style: italic;
  display: block;
  font-size: 13px;
  color: #fff;
}


.chefs .member:hover .member-info {
  background: linear-gradient(0deg, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.8) 20%, rgba(0, 212, 255, 0) 100%);
  opacity: 1;
  transition: 0.4s;
}
.chefs {
  background: url("img/gray.png") center center;
  background-size: cover;
  position: relative;
  padding: 80px 0;
}


# Contact
--------------------------------------------------------------*/
.contact .info {
  width: 100%;
}
.contact .info i {
  font-size: 20px;
  float: left;
  width: 44px;
  height: 44px;
  background: #cda45e;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50px;
  transition: all 0.3s ease-in-out;
}
.contact .info h4 {
  padding: 0 0 0 60px;
  font-size: 18px;
  font-weight: 500;
  margin-bottom: 5px;
  font-family: "Poppins", sans-serif;
}
.contact .info p {
  padding: 0 0 0 60px;
  margin-bottom: 0;
  font-size: 14px;
  color: #bab3a6;
}
.contact .info .open-hours, .contact .info .email, .contact .info .phone {
  margin-top: 40px;
}
.contact .php-email-form {
  width: 100%;
}
.contact .php-email-form .form-group {
  padding-bottom: 8px;
}
.contact .php-email-form .validate {
  display: none;
  color: red;
  margin: 0 0 15px 0;
  font-weight: 400;
  font-size: 13px;
}
.contact .php-email-form .error-message {
  display: none;
  color: #fff;
  background: #ed3c0d;
  text-align: center;
  padding: 15px;
  font-weight: 600;
}
.contact .php-email-form .sent-message {
  display: none;
  color: #fff;
  background: #18d26e;
  text-align: center;
  padding: 15px;
  font-weight: 600;
}
.contact .php-email-form .loading {
  display: none;
  text-align: center;
  padding: 15px;
}
.contact .php-email-form .loading:before {
  content: "";
  display: inline-block;
  border-radius: 50%;
  width: 24px;
  height: 24px;
  margin: 0 10px -6px 0;
  border: 3px solid #cda45e;
  border-top-color: #1a1814;
  -webkit-animation: animate-loading 1s linear infinite;
  animation: animate-loading 1s linear infinite;
}
.contact .php-email-form input, .contact .php-email-form textarea {
  border-radius: 0;
  box-shadow: none;
  font-size: 14px;
  background: #0c0b09;
  border-color: #625b4b;
  color: white;
}
.contact .php-email-form input::-moz-placeholder, .contact .php-email-form textarea::-moz-placeholder {
  color: #a49b89;
}
.contact .php-email-form input::placeholder, .contact .php-email-form textarea::placeholder {
  color: #a49b89;
}
.contact .php-email-form input:focus, .contact .php-email-form textarea:focus {
  border-color: #cda45e;
}
.contact .php-email-form input {
  height: 44px;
}
.contact .php-email-form textarea {
  padding: 10px 12px;
}
.contact .php-email-form button[type=submit] {
  background: #cda45e;
  border: 0;
  padding: 10px 35px;
  color: #fff;
  transition: 0.4s;
  border-radius: 50px;
}
.contact .php-email-form button[type=submit]:hover {
  background: #d3af71;
}
@-webkit-keyframes animate-loading {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
@keyframes animate-loading {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

</style>

	  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Welcome to <span>Zea's All around Ordering System</span></h1>
          <h2>Delivering great food for more than 100 years!</h2>

          <div class="btns">
            <a href="#menu" class="btn-menu animated fadeInUp scrollto">Our Menu</a>
            <a href="login.php" class="btn-book animated fadeInUp scrollto">Order</a>
          </div>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->


  <!--------------------------------------------------Douglas------------------------------------------------------------------------------------------->
<div class="container">
	<h1 class="page-header text-center">Food Menu</h1>
	<ul class="nav nav-tabs">

		<?php
			$sql="select * from category order by categoryid asc limit 1";
			$fquery=$conn->query($sql);
			$frow=$fquery->fetch_array();
			?>
				<li class="active"><a data-toggle="tab" href="#<?php echo $frow['catname'] ?>"><?php echo $frow['catname'] ?></a></li>
			<?php

			$sql="select * from category order by categoryid asc";
			$nquery=$conn->query($sql);
			$num=$nquery->num_rows-1;

			$sql="select * from category order by categoryid asc limit 1, $num";
			$query=$conn->query($sql);
			while($row=$query->fetch_array()){
				?>
				<li><a data-toggle="tab" href="#<?php echo $row['catname'] ?>"><?php echo $row['catname'] ?></a></li>
				<?php
			}
		?>
	</ul>

	<div class="tab-content">
		<?php
			$sql="select * from category order by categoryid asc limit 1";
			$fquery=$conn->query($sql);
			$ftrow=$fquery->fetch_array();
			?>
				<div id="<?php echo $ftrow['catname']; ?>" class="tab-pane fade in active" style="margin-top:20px;">
					<?php

						$sql="select * from product where categoryid='".$ftrow['categoryid']."'";
						$pfquery=$conn->query($sql);
						$inc=4;
						while($pfrow=$pfquery->fetch_array()){
							$inc = ($inc == 4) ? 1 : $inc+1; 
							if($inc == 1) echo "<div class='row'>"; 
							?>
								<div class="col-md-3">
									<div class="panel panel-default">
										
										<div class="panel-heading text-center">
											<b><?php echo $pfrow['productname']; ?></b>
										</div>
										<div class="panel-body">
											<img src="<?php if(empty($pfrow['photo'])){echo "upload/noimage.jpg";} else{echo $pfrow['photo'];} ?>" height="225px;" width="100%">
										</div>
										<div class="panel-footer text-center">
											&#8369; <?php echo number_format($pfrow['price'], 2); ?>
										</div>

									</div>
								</div>
							<?php
							if($inc == 4) echo "</div>";
						}
						if($inc == 1) echo "<div class='col-md-3'></div><div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
						if($inc == 2) echo "<div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
						if($inc == 3) echo "<div class='col-md-3'></div></div>"; 
					?>
		    	</div>
			<?php

			$sql="select * from category order by categoryid asc";
			$tquery=$conn->query($sql);
			$tnum=$tquery->num_rows-1;

			$sql="select * from category order by categoryid asc limit 1, $tnum";
			$cquery=$conn->query($sql);
			while($trow=$cquery->fetch_array()){
				?>
				<div id="<?php echo $trow['catname']; ?>" class="tab-pane fade" style="margin-top:20px;">
					<?php

						$sql="select * from product where categoryid='".$trow['categoryid']."'";
						$pquery=$conn->query($sql);
						$inc=4;
						while($prow=$pquery->fetch_array()){
							$inc = ($inc == 4) ? 1 : $inc+1; 
							if($inc == 1) echo "<div class='row'>"; 
							?>
								<div class="col-md-3">
									<div class="panel panel-default">
										<div class="panel-heading text-center">
											<b><?php echo $prow['productname']; ?></b>
										</div>
										<div class="panel-body">
											<img src="<?php if($prow['photo']==''){echo "upload/noimage.jpg";} else{echo $prow['photo'];} ?>" height="" width="">
										</div>
										<div class="panel-footer text-center">
											&#8369; <?php echo number_format($prow['price'], 2); ?>
										</div>
									</div>
								</div>
							<?php
							if($inc == 4) echo "</div>";
						}
						if($inc == 1) echo "<div class='col-md-3'></div><div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
						if($inc == 2) echo "<div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
						if($inc == 3) echo "<div class='col-md-3'></div></div>"; 
					?>
		    	</div>
				<?php
			}
		?>
	</div>
</div>

<!------------------------------------------------------Julayco--------------------------------------------------------------->

 <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <img src="img/about.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Climate and Energy</h3>
            <p class="fst-italic">
            We strive to be best-in-class in the ways we purchase and use energy throughout our operations, and the more we know, the more of a positive impact we can have. In 2020, Wendy’s conducted our first greenhouse gas (GHG) inventory and created a roadmap to reduce GHG emissions and set a science-based target by the end of 2023. 
            </p>
                <h3>Water Conservation</h3>
            <p class="fst-italic">
            Wendy’s is committed to making smart reductions in the amount of water it takes for our restaurants to operate and innovating better ways to use our resources where we can.
            </p>
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->


       <section id="chefs" class="chefs">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h1>Our Professional Chefs</h1>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <img src="img/chef/douglas.png" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Master Douglas</h4>
                  <span>Master Chef</span>
                </div>
               
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="200">
              <img src="img/chef/wendel.png" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Ramsey Wendell</h4>
                  <span>Lunch Chef</span>
                </div>
              
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="300">
              <img src="img/chef/franc.png" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Bossing Julayco</h4>
                  <span>Dinner Chef</span>
                </div>
             
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Chefs Section -->


     <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h1>Contact Us</h1>
          
        </div>
      </div>

      <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3920.720395655751!2d122.9635070701788!3d10.678797506654599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sph!4v1652347491597!5m2!1sen!2sph" frameborder="0" allowfullscreen></iframe>
      </div>


      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
            
                <h3>Location</h3>
                <h4>La Salle Avenue, Villamonte, Bacolod City, 6100 Negros Occidental, Philippines</h4>
              </div>

              <div class="open-hours">
         
                <h3>Open Hours</h3>
                <h4>
                  Monday-Saturday:<br>
                  9:00 AM - 8:30 PM
                </h4>
              </div>

              <div class="email">
           
                <h3>Email</h3>
                <h4>arigato@gmail.com</h4>
              </div>

              <div class="phone">
         
                <h3>Call</h3>
                <h4>+63 34 435 2594

</h4>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="8" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
        </body>


          <div
         class="text-center p-3"
         style="background-color: rgba(0, 0, 0, 0.2)"
         >
      Zea All Around Ordering System © 2022 Copyright: All Rights Reserved
      <a class="text-white" href="#"
         ></a
        >
    </div>



      
</html>