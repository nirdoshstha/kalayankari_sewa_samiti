<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login V4</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v4/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v4/fonts/iconic/css/material-design-iconic-font.min.css">



	<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v4/css/util.css">
	<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v4/css/main.css">

	<meta name="robots" content="noindex, follow">

</head>

<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('{{asset('bg-02.jpg')}}');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-49">
						Login
					</span>
					<div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Type your username">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Forgot password?
						</a>
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>


				</form>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>
</body>

</html>

{{--
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="keywords" content="htmlcss bootstrap, multi level menu, submenu, treeview nav menu examples" />
<meta name="description" content="Bootstrap 5 navbar multilevel treeview examples for any type of project, Bootstrap 5" />  

<title>Demo - Bootstrap 5 multilevel dropdown submenu sample</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>

<style type="text/css">

/* ============ desktop view ============ */
@media all and (min-width: 992px) {

	.dropdown-menu li{
		position: relative;
	}
	.dropdown-menu .submenu{ 
		display: none;
		position: absolute;
		left:100%; top:-7px;
	}
	.dropdown-menu .submenu-left{ 
		right:100%; left:auto;
	}

	.dropdown-menu > li:hover{ background-color: #f1f1f1 }
	.dropdown-menu > li:hover > .submenu{
		display: block;
	}
}	
/* ============ desktop view .end// ============ */

/* ============ small devices ============ */
@media (max-width: 991px) {

.dropdown-menu .dropdown-menu{
		margin-left:0.7rem; margin-right:0.7rem; margin-bottom: .5rem;
}

}	
/* ============ small devices .end// ============ */

</style>


<script type="text/javascript">
//	window.addEventListener("resize", function() {
//		"use strict"; window.location.reload(); 
//	});


	document.addEventListener("DOMContentLoaded", function(){
        

    	/////// Prevent closing from click inside dropdown
		document.querySelectorAll('.dropdown-menu').forEach(function(element){
			element.addEventListener('click', function (e) {
			  e.stopPropagation();
			});
		})



		// make it as accordion for smaller screens
		if (window.innerWidth < 992) {

			// close all inner dropdowns when parent is closed
			document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown){
				everydropdown.addEventListener('hidden.bs.dropdown', function () {
					// after dropdown is hidden, then find all submenus
					  this.querySelectorAll('.submenu').forEach(function(everysubmenu){
					  	// hide every submenu as well
					  	everysubmenu.style.display = 'none';
					  });
				})
			});
			
			document.querySelectorAll('.dropdown-menu a').forEach(function(element){
				element.addEventListener('click', function (e) {
		
				  	let nextEl = this.nextElementSibling;
				  	if(nextEl && nextEl.classList.contains('submenu')) {	
				  		// prevent opening link if link needs to open dropdown
				  		e.preventDefault();
				  		console.log(nextEl);
				  		if(nextEl.style.display == 'block'){
				  			nextEl.style.display = 'none';
				  		} else {
				  			nextEl.style.display = 'block';
				  		}

				  	}
				});
			})
		}
		// end if innerWidth

	}); 
	// DOMContentLoaded  end
</script>

</head>
<body>

<header class="section-header py-4">
<div class="container">
	<h2>Demo page </h2> 
</div>
</header> <!-- section-header.// -->



<div class="container">

<!-- ============= COMPONENT ============== -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
 <div class="container-fluid">
 	 <a class="navbar-brand" href="#">Brand</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"  aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  <div class="collapse navbar-collapse" id="main_nav">
	

	<ul class="navbar-nav">
		<li class="nav-item active"> <a class="nav-link" href="#">Home </a> </li>
		<li class="nav-item"><a class="nav-link" href="#"> About </a></li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">  Treeview menu  </a>
		    <ul class="dropdown-menu">
			  <li><a class="dropdown-item" href="#"> Dropdown item 1 </a></li>
			  <li><a class="dropdown-item" href="#"> Dropdown item 2 &raquo; </a>
			  	 <ul class="submenu dropdown-menu">
				    <li><a class="dropdown-item" href="#">Submenu item 1</a></li>
				    <li><a class="dropdown-item" href="#">Submenu item 2</a></li>
				    <li><a class="dropdown-item" href="#">Submenu item 3 &raquo; </a>
				    	<ul class="submenu dropdown-menu">
						    <li><a class="dropdown-item" href="#">Multi level 1</a></li>
						    <li><a class="dropdown-item" href="#">Multi level 2</a></li>
						</ul>
				    </li>
				    <li><a class="dropdown-item" href="#">Submenu item 4</a></li>
				    <li><a class="dropdown-item" href="#">Submenu item 5</a></li>
				 </ul>
			  </li>
			  <li><a class="dropdown-item" href="#"> Dropdown item 3 </a></li>
			  <li><a class="dropdown-item" href="#"> Dropdown item 4 </a>
		    </ul>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">  More items  </a>
		    <ul class="dropdown-menu">
			  <li><a class="dropdown-item" href="#"> Dropdown item 1 </a></li>
			  <li><a class="dropdown-item" href="#"> Dropdown item 2 &raquo; </a>
			  	 <ul class="submenu dropdown-menu">
				    <li><a class="dropdown-item" href="#">Submenu item 1</a></li>
				    <li><a class="dropdown-item" href="#">Submenu item 2</a></li>
				    <li><a class="dropdown-item" href="#">Submenu item 3</a></li>
				 </ul>
			  </li>
			  <li><a class="dropdown-item" href="#"> Dropdown item 3 &raquo; </a>
			  	 <ul class="submenu dropdown-menu">
				    <li><a class="dropdown-item" href="#">Another submenu 1</a></li>
				    <li><a class="dropdown-item" href="#">Another submenu 2</a></li>
				    <li><a class="dropdown-item" href="#">Another submenu 3</a></li>
				    <li><a class="dropdown-item" href="#">Another submenu 4</a></li>
				 </ul>
			  </li>
			  <li><a class="dropdown-item" href="#"> Dropdown item 4 &raquo;</a>
			  	 <ul class="submenu dropdown-menu">
				    <li><a class="dropdown-item" href="#">Another submenu 1</a></li>
				    <li><a class="dropdown-item" href="#">Another submenu 2</a></li>
				    <li><a class="dropdown-item" href="#">Another submenu 3</a></li>
				    <li><a class="dropdown-item" href="#">Another submenu 4</a></li>
				 </ul>
			  </li>
			  <li><a class="dropdown-item" href="#"> Dropdown item 5 </a></li>
			  <li><a class="dropdown-item" href="#"> Dropdown item 6 </a></li>
		    </ul>
		</li>
	</ul>

	<ul class="navbar-nav ms-auto">
		<li class="nav-item"><a class="nav-link" href="#"> Menu item </a></li>
		<li class="nav-item"><a class="nav-link" href="#"> Menu item </a></li>
		<li class="nav-item dropdown">
			<a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown"> Dropdown right </a>
		    <ul class="dropdown-menu dropdown-menu-right">
			  <li><a class="dropdown-item" href="#"> Dropdown item 1</a></li>
			  <li><a class="dropdown-item" href="#"> Dropdown item 2 </a></li>
			  <li><a class="dropdown-item" href="#"> Dropdown item 3 &raquo; </a>
			  	 <ul class="submenu submenu-left dropdown-menu">
				    <li><a class="dropdown-item" href="">Submenu item 1</a></li>
				    <li><a class="dropdown-item" href="">Submenu item 2</a></li>
				    <li><a class="dropdown-item" href="">Submenu item 3</a></li>
				    <li><a class="dropdown-item" href="">Submenu item 4</a></li>
				 </ul>
			  </li>
			  <li><a class="dropdown-item" href="#"> Dropdown item 4 </a></li>
		    </ul>
		</li>
	</ul>

  </div> <!-- navbar-collapse.// -->
 </div> <!-- container-fluid.// -->
</nav>

<!-- ============= COMPONENT END// ============== -->

<section class="section-content py-5">
	
		<h6>Demo for Bootstrap multi level dropdown menu <br> Based on Bootstrap 5 CSS framework.  </h6>
        <p>For this demo page you should connect to the internet to receive files from CDN  like Bootstrap5 CSS, Bootstrap5 JS</p>
       
		<p class="text-muted"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>

		<a href="https://bootstrap-menu.com/detail-multilevel.html" class="btn btn-success"> &laquo Back to tutorial or Download code</a>

</section>

</div><!-- container //  -->

</body>
</html> --}}