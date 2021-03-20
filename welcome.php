<?php
    
	session_start();
	include("connect.php");
	require_once './config.php';
	if (!isset($_SESSION['name']) || !isset($_SESSION['email'])) {
		header('Location: index.php');
		exit();
	}
	if($_SESSION['picture'] )
	{
	$picture1=$_SESSION['picture'] ;
	}
	else 
	{
	   $picture1='assets/img/undraw_profile.svg' ;
	}
	
	define('MyConst', TRUE);
?>





<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Duth Ratings</title>
	
    <!-- Custom fonts for this template-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/welcomepage.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="welcome.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Ratings <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="welcome.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Αξιολογήσεις
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link " href="welcome.php" 
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Μαθήματα</span>
                </a>
                
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Καθηγητές</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Συγγράμματα</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
			<!-- Heading -->
            <div class="sidebar-heading">
                Δείτε επίσης
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link " href="https://myblogdemo.eu" 
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Portfolio</span>
                </a>
                
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Linkedin</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="https://github.com/iKipris">
                    <i class="fas fa-fw fa-table"></i>
                    <span>GitHub</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none colorbar rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <div id="mysearchbar" class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" id="myFilter" onkeyup="myFunction()" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary search-icon" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Topbar Navbar -->
                    <div>
                    <ul class="navbar-nav ml-left">

  

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span style="font-weight:400; color:#202020;" class="mr-2 d-none d-lg-inline small"><?php echo $_SESSION["name"]; ?></span>
                                    <?php 
                            echo "<img src= '$picture1' class='img-profile rounded-circle'>";
                                 ?>
                                
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i  class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>
                    </div>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div id="pageheading" class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h4 class="h4 m-auto mb-0" style="color:black ; ">Μαθήματα </h4>
                    </div>

                    

<div  id="myItems">

                       <div id="disp" class="">

                            <!-- Dropdown Card Example -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="card-heading m-0 font-weight-bold text-primary">Αλγόριθμοι - Πολυπλοκότητα</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="container">
                                          <div class="row">
                                                <div class="col-12 col-md-6 text-xs-center">
                                                      <h5 class="card-title text-dark">Παύλος Εφραιμίδης</h5>
                                                      <h6 class="card-subtitle mb-2 text-muted">3ο εξαμηνο</h6>
                                                      <button  type="button" class="btn btn-outline-primary review-button">Leave a review</button>
                                                </div>
                                                <div class="col-12 col-md-6 text-xs-center margin-top-xs">
                                                      <div class="class-card">
                                                              <div class="wpac-rating-custom text-center" data-wpac-chan="product_id_11"></div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                </div>
                            </div>
							<div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="card-heading m-0 font-weight-bold text-primary">Φυσική ΙΙ</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="container">
                                          <div class="row">
                                                <div class="col-12 col-md-6 text-xs-center">
                                                      <h5 class="card-title text-dark">Φ. Φαρμάκης</h5>
                                                      <h6 class="card-subtitle mb-2 text-muted">5ο εξαμηνο</h6>
                                                      <button type="button" class="btn btn-outline-primary review-button">Leave a review</button>
                                                </div>
                                                <div class="col-12 col-md-6 text-xs-center margin-top-xs">
                                                      <div class="class-card">
                                                              <div class="wpac-rating-custom text-center" data-wpac-chan="product_id_12"></div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Dropdown Card Example -->
                           <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="card-heading m-0 font-weight-bold text-primary">Αναλογικά Κυκλώματα</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="container">
                                          <div class="row">
                                                <div class="col-12 col-md-6 text-xs-center ">
                                                      <h5 class="card-title text-dark">Β. Λυγούρας</h5>
                                                      <h6 class="card-subtitle mb-2 text-muted">4ο εξαμηνο</h6>
                                                      <button type="button" class="btn btn-outline-primary review-button">Leave a review</button>
                                                </div>
                                                <div class="col-12 col-md-6 text-xs-center">
                                                      <div class="class-card">
                                                              <div class="wpac-rating-custom text-center" data-wpac-chan="product_id_13"></div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                </div>
                            </div>
							<div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class=" card-heading m-0 font-weight-bold text-primary">Αγγλικά ΙΙ</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="container">
                                          <div class="row">
                                                <div class="col-12 col-md-6 text-xs-center">
                                                      <h5 class="card-title text-dark">Αλέξανδρος Παπάνης</h5>
                                                      <h6 class="card-subtitle mb-2 text-muted">7ο εξαμηνο</h6>
                                                      <button type="button" class="btn btn-outline-primary review-button">Leave a review</button>
                                                </div>
                                                <div class="col-12 col-md-6 text-xs-center">
                                                      <div class="class-card">
                                                              <div class="wpac-rating-custom text-center" data-wpac-chan="product_id_14"></div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                </div>
                            </div>

                            
                            

                     

                            <!-- Dropdown Card Example -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="card-heading m-0 font-weight-bold text-primary">Πεδια ΙΙ</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="container">
                                          <div class="row">
                                                <div class="col-12 col-md-6 text-xs-center">
                                                      <h5 class="card-title text-dark">Θεόδωρος Σαρρής</h5>
                                                      <h6 class="card-subtitle mb-2 text-muted">8ο εξαμηνο</h6>
                                                      <button type="button" class="btn btn-outline-primary review-button">Leave a review</button>
                                                </div>
                                                <div class="col-12 col-md-6 text-xs-center margin-top-xs">
                                                      <div class="class-card">
                                                              <div class="wpac-rating-custom text-center" data-wpac-chan="product_id_15"></div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                </div>
                            </div>
							<div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="card-heading m-0 font-weight-bold text-primary text-center">Εφαρμοσμένη Θερμοδυναμική</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="container">
                                          <div class="row">
                                                <div class="col-12 col-md-6 text-xs-center">
                                                      <h5 class="card-title text-dark">Α. Καρκάνης</h5>
                                                      <h6 class="card-subtitle mb-2 text-muted">3ο εξαμηνο</h6>
                                                      <button type="button" class="btn btn-outline-primary review-button">Leave a review</button>
                                                </div>
                                                <div class="col-12 col-md-6 text-xs-center margin-top-xs">
                                                      <div class="class-card">
                                                              <div class="wpac-rating-custom text-center" data-wpac-chan="product_id_16"></div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                </div>
                            </div>

                            
                            

                        

                            <!-- Dropdown Card Example -->
                           <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="card-heading m-0 font-weight-bold text-primary">Αριθμητική Ανάλυση</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="container">
                                          <div class="row">
                                                <div class="col-12 col-md-6 text-xs-center">
                                                      <h5 class="card-title text-dark">Γ. Γραβάνης</h5>
                                                      <h6 class="card-subtitle mb-2 text-muted">2ο εξαμηνο</h6>
                                                      <button type="button" class="btn btn-outline-primary review-button">Leave a review</button>
                                                </div>
                                                <div class="col-12 col-md-6 text-xs-center margin-top-xs">
                                                      <div class="class-card">
                                                              <div class="wpac-rating-custom text-center" data-wpac-chan="product_id_17"></div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                </div>
                            </div>
							<div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="card-heading m-0 font-weight-bold text-primary">Ολοκληρωμένα Κυκλώματα</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="container">
                                          <div class="row">
                                              
                                                <div class="col-12 col-md-6 text-xs-center">
                                                      <h5 class="card-title text-dark">Γ. Δημητρακόπουλος</h5>
                                                      <h6 class="card-subtitle mb-2 text-muted">1ο εξαμηνο</h6>
                                                      <button type="button" class="btn btn-outline-primary review-button">Leave a review</button>
                                                </div>
                                                <div class="col-12 col-md-6 text-xs-center margin-top-xs">
                                                      <div class="class-card">
                                                             <div class="wpac-rating-custom text-center" data-wpac-chan="product_id_18"></div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="card-heading m-0 font-weight-bold text-primary">Τεχνικό Σχέδιο</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="container">
                                          <div class="row">
                                                <div class="col-12 col-md-6 text-xs-center">
                                                      <h5 class="card-title text-dark">Σπυρίδων Μουρούτσος</h5>
                                                      <h6 class="card-subtitle mb-2 text-muted">1ο εξαμηνο</h6>
                                                      <button type="button" class="btn btn-outline-primary review-button">Leave a review</button>
                                                </div>
                                                <div class="col-12 col-md-6 text-xs-center margin-top-xs">
                                                      <div class="class-card">
                                                            <div class="wpac-rating-custom text-center" data-wpac-chan="product_id_19" ></div>
                                                            
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="card-heading m-0 font-weight-bold text-primary">Κυκλώματα Ι</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="container">
                                          <div class="row">
                                                <div class="col-12 col-md-6 text-xs-center">
                                                      <h5 class="card-title text-dark">Νικόλαος Μητιανούδης</h5>
                                                      <h6 class="card-subtitle mb-2 text-muted">1ο εξαμηνο</h6>
                                                      <button type="button" class="btn btn-outline-primary review-button">Leave a review</button>
                                                </div>
                                                <div class="col-12 col-md-6 text-xs-center margin-top-xs">
                                                      <div class="class-card">
                                                            <div class="wpac-rating-custom text-center" data-wpac-chan="product_id_20" ></div>
                                                            
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                </div>
                            </div>

                            
                            

                        </div>

                </div>

                
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer id="myfooter" class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Thanos Kipriadis </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a  class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div hidden>
    <form id="commentform" action="comment.php" method="GET">
  <input  type="text" id="proffesor1"  name="proffesor1" readonly="readonly" >
  <input  type="text" id="subject1"  name="subject1" readonly="readonly"  >
  <input  type="text" id="exam1" name="exam1" readonly="readonly" >
  <input  type="submit" value="Send Request">
</form> 
    </div>
    <!-- Bootstrap core JavaScript-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 
    

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>
 <script>
            
            function myFunction() {
                  var input, filter, myItems, cards, i, current, h5, text,h6;
                  input = document.getElementById("myFilter");
                  filter = input.value.toUpperCase();
                  myItems = document.getElementById("myItems");
                  cards = myItems.getElementsByClassName("card");
                  var counter=0;
                  for (i = 0; i < cards.length; i++) {
                        
                        current = cards[i];
                        h5 = current.getElementsByClassName('card-title')[0];
                        h6 = current.getElementsByClassName('card-subtitle')[0];
                        h7 = current.getElementsByClassName('card-heading')[0];
                        text = h5.innerText.toUpperCase().replace(/\s/g, "");
                        text1=h6.innerText.toUpperCase().replace(/\s/g, "");
                        text2=text + text1;
                        text3=text1+text;
                        text4=h7.innerText.toUpperCase().replace(/\s/g, "");
                        
                        filter=filter.replace(/\s/g, "");



                        if  ((text.includes(filter)) || (text1.includes(filter))  || (text2.includes(filter)) ||  (text3.includes(filter)) || (text4.includes(filter)) ) {
                              current.style.display = "";
                              ++counter;
                        } else {
                              current.style.display = "none";
                        }
                        
                        }
                        
                        var layoutdisp=document.getElementById('disp');
                        if (window.innerWidth>1196)
                        {
                        if (counter == 1)
                        {
                            layoutdisp.classList.remove("grid-container");
                            layoutdisp.classList.add("col-lg-12");
                        }
                        else 
                        {
                            
                            layoutdisp.classList.remove("col-lg-12");
                            layoutdisp.classList.add("grid-container");
                        }
                        }
                        counter=0;
                        
                        
            }
      </script>
   
<script type="text/javascript">
wpac_init = window.wpac_init || [];
wpac_init.push({
    widget: 'Rating',
    id: 28395,
    el: 'wpac-rating-custom',
    html: 'Rating: {{=it.rating}}<br> {{=it.stars}} {{?it.count>0}}  ({{=it.count}} {{=it.votes}}){{?}}'
  });
(function() {
    if ('WIDGETPACK_LOADED' in window) return;
    WIDGETPACK_LOADED = true;
    var mc = document.createElement('script');
    mc.type = 'text/javascript';
    mc.async = true;
    mc.src = 'https://embed.widgetpack.com/widget.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(mc, s.nextSibling);
})();
</script>
</body>

</html>