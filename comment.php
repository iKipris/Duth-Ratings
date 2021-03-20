<?php
include("connect.php");
mysqli_set_charset($con, "utf8");
session_start();
if (!isset($_SESSION['name']) || !isset($_SESSION['email'])) {
		header('Location: index.php');
		exit();
	}
	
    //make a table subjects with allowed subjects1!
    //check database if  $_POST['proffesor1'],$_POST['subject1'],$_POST['exam1'];  exists on together on a row of table subjects !
    //if not destroy_session , exit ('thanks for the challenge')
    $subject_titlesearch=htmlspecialchars($_GET['subject1']);
    $subject_examsearch=htmlspecialchars($_GET['exam1']);
    $subject_examproffesor=htmlspecialchars($_GET['proffesor1']);
    
    $sql = "SELECT * FROM `subjects` WHERE subject_title='$subject_titlesearch' AND subject_exam='$subject_examsearch' AND subject_proffesor='$subject_examproffesor'";
        $result = mysqli_query($con,$sql);
        $count = mysqli_num_rows($result);
        if ($count == 0 )
        {
            session_destroy();
            header('location: welcome.php');
        }
        else
{
	if ($subject_titlesearch && $subject_examsearch && $subject_examproffesor)
	{
	$_SESSION['proffesor1'] =  $subject_examproffesor;
    $_SESSION['subject1'] = $subject_titlesearch;
    $_SESSION['exam1'] = $subject_examsearch;
	}
	

	if (!isset($_SESSION['name']) || !isset($_SESSION['email']) ||  !isset($_SESSION['proffesor1']) || !isset($_SESSION['subject1']) || !isset($_SESSION['exam1'])) {
		header('Location: index.php');
		exit();
	}
	
	$proffesor = $_SESSION['proffesor1'];
    $subject  = $_SESSION['subject1'];
    $exam    =  $_SESSION['exam1'];
	
	if($_SESSION['picture'] )
	{
	$picture1=$_SESSION['picture'] ;
	}
	else 
	{
	   $picture1='assets/img/undraw_profile.svg' ;
	}
}
?>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Duth Reviews</title>

    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="" rel="stylesheet" />
    <link href="assets/css/commentstyle.css" rel="stylesheet" />
    <link href="assets/css/welcomepage.css" rel="stylesheet" />
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
        <hr class="sidebar-divider my-0" />

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
          <a class="nav-link" href="welcome.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Heading -->
        <div class="sidebar-heading">
          Αξιολογήσεις
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link" href="welcome.php" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Μαθήματα</span>
          </a>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Καθηγητές</span>
          </a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-fw fa-table"></i>
            <span>Συγγράμματα</span>
          </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block" />
        <!-- Heading -->
        <div class="sidebar-heading">
          Δείτε επίσης
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link" href="https://myblogdemo.eu" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Portfolio</span>
          </a>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Linkedin</span>
          </a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
          <a class="nav-link" href="https://github.com/iKipris">
            <i class="fas fa-fw fa-table"></i>
            <span>GitHub</span>
          </a>
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

            <div class="d-none d-sm-inline-block form-inline ml-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
              <div>
                <a href="welcome.php">
                  <button class="btn d-inline btn-primary search-icon" type="button">
                    <h6 class="d-inline">Go back</h6>
                    <i class="fas fa-sign-out-alt fa-sm d-inline"></i>
                  </button>
                </a>
              </div>
            </div>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
              <div class="topbar-divider d-none d-sm-block"></div>

              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span id="myid" style="font-weight: 400; color: #202020;" class="mr-2 d-none d-lg-inline small"><?php echo $_SESSION["name"]; ?></span>
                  <?php 
                            echo "<img src= '$picture1' class='img-profile rounded-circle'>"; ?>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
          </nav>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div id="disp" class="container-fluid">
            <!-- Content Row -->

            <div class="row">
              <!-- Pie Chart -->
              <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4 verct">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="card-heading m-0 font-weight-bold text-primary">Περιγραφή Μαθήματος</h6>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body overflow-auto">
                    <div class="chart-area ">
                      
                        <div class="col-md-12">
                          <div class="panel ">
                            <div class="panel-body text-center  ">
                                <div>
                              <p class="text-center">Τα μοντέρνα συστήματα σε ολοκληρωμ​ένα κυκλώματα χρησιμοποιούν δισεκατομύρια τρανζίστορ σε ένα τσιπ ώστε να υλοποιήσουν αποτελεσματικά.</p>
                              </div>
                              <div>
                                  <img src= 'assets/img/hls-flow-min.jpg' style="max-width:100%; max-height:150px;" class=' img-fluid'>"
                              </div>
                              <div>
                                  
                              <p class="text-center mt-3">
                              Η αυτοματοποίηση περιλαμβάνει τόσο τη φάση της σχεδίασης και της βελτιστοποίησης της μικροαρχιτεκτονικής όσο και τη φάση της φυσικής υλοποίησης του ολοκληρωμένου κυκλώματος. Στην πρώτη περίπτωση, που είναι και το θέμα του μαθήματος, σύνθετοι αλγόριθμοι που έχουν περιγραφεί σε γενικές γλώσσες προγραμματισμού.
                             </p>
                             </div>
                             
                              <div class="p-3">
                                <button class="btn btn-sm bg-gradient-primary " style="color: white !important; " type="submit"><i class="fa fa-pencil-alt"></i> Eclass</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      
                    </div>
                  </div>
                </div>
              </div>
              <!-- Area Chart -->
              <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4 verct">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="card-heading m-0 font-weight-bold text-primary">Κριτικές Μαθήματος</h6>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body overflow-auto ">
                    <div class="chart-area ">
                      <div id="reviews">
                        <div class="container">
                          <div class="row">
                              
                              
                            <div class="comments col-12"></div>
                            

                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Content Row -->
            <div class="row">
              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="font-weight-bold text-primary text-uppercase mb-1">
                          Υπεύθυνος καθηγητής
                        </div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800">
                          <?php echo ($proffesor) ?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                          Όνομα Μαθήματος
                        </div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800" id="getsubjectname">
                          <?php echo ($subject) ?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-vial fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                          Εξάμηνο Μαθήματος
                        </div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800">
                          <?php echo ($exam) ?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Custom scripts for all pages-->
    <script>
      jQuery(document).ready(function () {
        $("#sidebarToggle, #sidebarToggleTop").on("click", function (e) {
          $("body").toggleClass("sidebar-toggled");
          $(".sidebar").toggleClass("toggled");
          if ($(".sidebar").hasClass("toggled")) {
            $(".sidebar .collapse").collapse("hide");
          }
        });

        // Close any open menu accordions when window is resized below 768px
        $(window).resize(function () {
          if ($(window).width() < 768) {
            $(".sidebar .collapse").collapse("hide");
          }

          // Toggle the side navigation when window is resized below 480px
          if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
            $("body").addClass("sidebar-toggled");
            $(".sidebar").addClass("toggled");
            $(".sidebar .collapse").collapse("hide");
          }
        });

        // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
        $("body.fixed-nav .sidebar").on("mousewheel DOMMouseScroll wheel", function (e) {
          if ($(window).width() > 768) {
            var e0 = e.originalEvent,
              delta = e0.wheelDelta || -e0.detail;
            this.scrollTop += (delta < 0 ? 1 : -1) * 30;
            e.preventDefault();
          }
        });
         
     
      });
      
     
    </script>
    
    <script>
const comments_subject_name = document.getElementById('getsubjectname').innerText; // This number should be unique on every page
fetch(`comments.php?subject_name=${comments_subject_name}&name1=${"<?php echo $_SESSION['name']; ?>"}`).then(response => response.text()).then(data => {
   
wpac_init = window.wpac_init || [];
wpac_init.push({
    widget: 'Rating',
    id: 28395,
    el: 'wpac-rating-custom',
    html: 'Rating: {{=it.rating}} {{=it.stars}} {{?it.count>0}}  ({{=it.count}} {{=it.votes}}){{?}}'
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
	document.querySelector(".comments").innerHTML = data;
	document.querySelectorAll(".comments .write_comment_btn, .comments .reply_comment_btn").forEach(element => {
		element.onclick = event => {
			event.preventDefault();
			document.querySelectorAll(".comments .write_comment").forEach(element => element.style.display = 'none');
			document.querySelector("div[data-comment-id='" + element.getAttribute("data-comment-id") + "']").style.display = 'block';
			document.querySelector("div[data-comment-id='" + element.getAttribute("data-comment-id") + "'] input[name='name']").focus();
			
		};
	});
	document.querySelectorAll(".childcomments").forEach(element => {
	    element.onclick = event =>
	    {
	        
	        item1=document.querySelectorAll(".replies");
	        for (var i=0;i<item1.length;++i)
	        {
	           if ((element.closest(".comment") === item1[i].closest(".comment")) && item1[i].hidden == true)
	           {
	               element.innerText='Hide Replies';
	               item1[i].hidden=false;
	           }
	           
	           else if ((element.closest(".comment") === item1[i].closest(".comment")) && item1[i].hidden == false)
	           {
	               element.innerText='Check Replies';
	               item1[i].hidden=true;
	           }
	           
	           
	        }
	        
	       
	        
	       
	        
	    };
	});
	document.querySelectorAll(".comments .write_comment form").forEach(element => {
		element.onsubmit = event => {
			event.preventDefault();
			
			fetch(`comments.php?subject_name=${comments_subject_name}&name1=${"<?php echo $_SESSION['name']; ?>"}`, {
				method: 'POST',
				body: new FormData(element)
				
			}).then(response => response.text()).then(data => {
				element.parentElement.innerHTML = data;
			});
		};
	});
});
if ( $(window).width() < 750)
    {
        
        document.getElementById("accordionSidebar").classList.add("toggled");
        
    }
document.getElementById("sidebarToggleTop").addEventListener("click", function() {
    console.log(document.getElementById("accordionSidebar").classList);
    
    if (document.getElementById("accordionSidebar").classList.contains("toggled"))
        {
           
           
          document.getElementById("disp").hidden=true;
          $('#content-wrapper').removeClass('myoverlay');
        $('#content-wrapper').addClass('myoverlay');
        }
    else 
        {
            
            
            document.getElementById("disp").hidden=false;
            $('#content-wrapper').removeClass('myoverlay');
            
        }
});


</script>

  </body>
</html>
