<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
	<!-- All CSS and Libraries Start-->
	<?php $this->load->view("common/index.css.php"); ?>
	
	<title></title>
</head>
<body class="">
<!--Navigation Top Bar Start-->
<?php	$this->load->view("common/top-bar.php"); ?>
<!--Navigation Top Bar End-->
<section id="main-container">

	<!--Left navigation section start-->	
		<?php	$this->load->view("common/menu.php"); ?>
	<!--Left navigation section end-->
<!--Left navigation section end-->


<!--Page main section start-->
<section id="min-wrapper">
<div id="main-content">
<div class="container-fluid">
<div class="row">
    <div class="col-md-12">
        <!--Top header start
        <h3 class="ls-top-header">Dashboard</h3>
        Top header end -->
    </div>
</div>
<!-- Main Content Element  Start-->
<div class="row">
    <div class="col-md-12">
        <div class="memberBox">
            <div class="memberBox-header">
				<?php 
					$this->load->view($folder."/".$page.".php");	
				?>
            </div>
             
        </div>
    </div>

     
</div>

<!-- Main Content Element  End-->

</div>
</div>



</section>
<!--Page main section end -->
 

</section>

<?php
            $this->load->view("common/index-js.php");
        ?>
</body>
</html>