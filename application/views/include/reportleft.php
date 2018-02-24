<?php	
$report_cat=0;
if(isset($_GET['cat'])){
	
	$_SESSION['report_cat']=$_GET['cat'];
	
}
if(isset($_SESSION['report_cat'])){$report_cat=$_SESSION['report_cat'];}
?>

			<div class="main-container container-fluid">



			<a class="menu-toggler" id="menu-toggler" href="#">



				<span class="menu-text"></span>



			</a>



            

            <div class="sidebar" id="sidebar">



				<div class="sidebar-shortcuts" id="sidebar-shortcuts">



					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">



						<a href="track.php?page=geofence&id=<?php echo $id; ?>"><button class="btn btn-small btn-success" title="Geo Fence">



							<i class="icon-hand-down"></i>



						</button></a>



<a href="track.php?page=playback&id=<?php echo $id; ?>">



						<button class="btn btn-small btn-info" title="Route Playback">



							<i class="icon-facetime-video"></i>



						</button></a>





<a href="track.php?page=report_dashboard&id=<?php echo $id; ?>">

						<button class="btn btn-small btn-warning" title="Reports">



							<i class="icon-bar-chart"></i>



						</button></a>




<?php if($id!=863){ //vani school dup ?>
<a href="track.php?page=settings&id=<?php echo $id; ?>">

						<button class="btn btn-small btn-danger" title="Settings">



							<i class="icon-cogs"></i>



						</button></a>
<?php } ?>



					</div>







					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">



						<span class="btn btn-success"></span>







						<span class="btn btn-info"></span>







						<span class="btn btn-warning"></span>







						<span class="btn btn-danger"></span>



					</div>



				</div><!--#sidebar-shortcuts-->







				<ul class="nav nav-list">


<?php if($id!=887 && $id!=778 && $id!=877 && $id!=878){?>
					

					<li >







						<a href="track.php?page=overview&id=<?php echo $id; ?>" class="dropdown-toggle">







							<i class="icon-dashboard"></i>







							<span class="menu-text"> Dashboard </span>







						</a>



						</li>
<?php } ?>

						<li <?php if($page=='dashboard'){echo "class=\"active\"";}?>>
						<a href="track.php?page=dashboard&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-eye-open"></i>
							<span class="menu-text"> Live Tracking</span>
						</a>
						</li>


						<li <?php if($_GET['report']==1){echo "class='active'";} ?>>
						<a href="track.php?page=report&id=<?php echo $id; ?>&report=1" class="dropdown-toggle">
							<i class="icon-compass"></i>
							<span class="menu-text"> <?php if($id==59){?> Walk Report<?php }else{ ?> Driving Report<?php } ?>  </span>
						</a>

					    </li>
					    <li <?php if($_GET['report']==15){echo "class='active'";} ?>>
						<a href="track.php?page=report&id=<?php echo $id; ?>&report=15" class="dropdown-toggle">
							<i class="icon-tasks"></i>
							<span class="menu-text"> <?php if($id==59){?> Consolidated Walk Report<?php }else{ ?> Consolidated Driving Report<?php } ?></span>
						</a>

					    </li>
					    <?php if($id==769){  ?> 						 
                        <li <?php if($page=='gogreen'){echo "class=\"active\"";}?>>
						<a href="track.php?page=gogreen&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-list-alt"></i>
							<span class="menu-text"> Locations Data </span>
						</a>
						</li>
						<?php }  ?>
						<?php if($id==502)	{?>			
					
						<li <?php if($page=='tripsheet_report'){echo "class='active'";} ?>>
						<a href="track.php?page=tripsheet_report&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-list-alt"></i>
							<span class="menu-text">  Trip Sheet  </span>

						</a>
					    </li>
					<?php } ?>
                        <?php if($id==190){ ?>
                        <li <?php if($page=='route'){echo "class='active'";} ?>>
						<a href="track.php?page=route&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-bolt"></i>
							<span class="menu-text"> Route Report </span>
						</a>
                        <?php } ?>

					    </li>

<!--
						<li <?php if($_GET['report']==3){echo "class='active'";} ?>>
						<a href="track.php?page=report&id=<?php echo $id; ?>&report=3" class="dropdown-toggle">
							<i class="icon-zoom-in"></i>
							<span class="menu-text">Driving Details</span>	

						</a>
					    </li>

						<li <?php if($_GET['report']==7){echo "class='active'";} ?>>
						<a href="track.php?page=report&id=<?php echo $id; ?>&report=7" class="dropdown-toggle">
							<i class="icon-road"></i>
							<span class="menu-text">  Daily Activity Report </span>
						</a>
					    </li>
                        <li <?php if($_GET['report']==8){echo "class='active'";} ?>>
						<a href="track.php?page=report&id=<?php echo $id; ?>&report=8" class="dropdown-toggle">
							<i class="icon-plus"></i>
							<span class="menu-text">  Fleet Summary Report </span>
						</a>
					    </li>
                        
-->
						<li <?php if($_GET['report']==5){echo "class='active'";} ?>>
						<a href="track.php?page=report&id=<?php echo $id; ?>&report=5" class="dropdown-toggle">
							<i class="icon-bolt"></i>
							<span class="menu-text">  Geofence </span>
						</a>

					    </li> 
<?php 
//if(isset($report_cat) && ($report_cat==1 || $report_cat==2 || $report_cat==3)){?>
<?php if($id!=59){//anvis ?>
		
						<li <?php if($_GET['report']==4){echo "class='active'";} ?>>
						<a href="track.php?page=report&id=<?php echo $id; ?>&report=4" class="dropdown-toggle">
							<i class="icon-warning-sign"></i>
							<span class="menu-text">  Speeding  </span>

						</a>
					    </li> 

						<li <?php if($_GET['report']==6){echo "class='active'";} ?>>
						<a href="track.php?page=report&id=<?php echo $id; ?>&report=6" class="dropdown-toggle">
							<i class="icon-th"></i>
							<span class="menu-text">  Idling </span>
						</a>
					    </li> 
                        
						
                        <li <?php if($_GET['report']==9){echo "class='active'";} ?>>
						<a href="track.php?page=report&id=<?php echo $id; ?>&report=9" class="dropdown-toggle">
							<i class="icon-stop"></i>
							<span class="menu-text">  Stop Time </span>
						</a>
					    </li>
<?php } ?>					    
					    <?php if($id==504){ ?>
                        <li <?php if($page=='reportjss'){echo "class='active'";} ?>>
						<a href="track.php?page=reportjss&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class="icon-download-alt"></i>
							<span class="menu-text"> JSS Report </span>
						</a>
						</li> 											
                        <?php } ?>
                        <?php if($id==504 || $id==584 || $id==730 || $id==731 || $id==732 || $id==735 || $id==752 || $sublogin_created_by==504){ ?>
                        <li <?php if($_GET['report']==16){echo "class='active'";} ?>>
						<a href="track.php?page=report&id=<?php echo $id; ?>&report=16" class="dropdown-toggle">
							<i class="icon-list-alt"></i>
							<span class="menu-text"> JSS Locations </span>
						</a>
						</li>	
						 <?php } ?>
						<?php if($id==59){?>
						<li <?php if($page=='report_anvis'){echo "class='active'";} ?>>
						<a href="track.php?page=report_anvis&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class=" icon-exchange"></i>
							<span class="menu-text">  Anvis report </span>
						</a>
					    </li> 
							
						<?php } ?>
						<?php if($id==745 || $id==755){?>
						<li <?php if($page=='fuel_report'){echo "class='active'";} ?>>
						<a href="track.php?page=fuel_report&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class=" icon-list"></i>
							<span class="menu-text">  Fuel report </span>
						</a>
					    </li> 
						<li <?php if($page=='fleet_summary'){echo "class='active'";} ?>>
						<a href="track.php?page=fleet_summary&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class=" icon-list"></i>
							<span class="menu-text">  Fleet Summary </span>
						</a>
					    </li> 
						<li <?php if($page=='fuel_theft_report'){echo "class='active'";} ?>>
						<a href="track.php?page=fuel_theft_report&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class=" icon-list"></i>
							<span class="menu-text">  Fuel Theft Report </span>
						</a>
					    </li> 
							
						<?php } ?>
						<?php if($id==745){ ?>
							<li <?php if($page=='detailed_refuel'){echo "class='active'";} ?>>
						<a href="track.php?page=detailed_refuel&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class=" icon-list-alt"></i>
							<span class="menu-text">  Detailed Refuel Report </span>
						</a>
					    </li>
					    <li <?php if($page=='detailed_theft'){echo "class='active'";} ?>>
						<a href="track.php?page=detailed_theft&id=<?php echo $id; ?>" class="dropdown-toggle">
							<i class=" icon-list-alt"></i>
							<span class="menu-text">  Detailed Theft Report </span>
						</a>
					    </li>
						<?php } ?>
						<?php if($id==784){ ?>
								<li <?php if($page=='fuel_report'){echo "class=\"active\"";}?>>
								<a href="track.php?page=fuel_report&id=<?php echo $id; ?>&nwpg=rpt" class="dropdown-toggle">
									<i class="icon-list-alt"></i>
									<span class="menu-text"> Fuel Report </span>
								</a>
								</li>
								<li <?php if($page=='fuel_theft_report'){echo "class=\"active\"";}?>>
								<a href="track.php?page=fuel_theft_report&id=<?php echo $id; ?>&nwpg=rpt" class="dropdown-toggle">
									<i class="icon-list-alt"></i>
									<span class="menu-text"> Fuel Theft Report </span>
								</a>
								</li>
								<?php } ?>
								<?php if($id==836){?>
								<li <?php if($page=='harsh_acceleration'){echo "class='active'";} ?>>
								<a href="track.php?page=harsh_acceleration&id=<?php echo $id; ?>" class="dropdown-toggle">
									<i class=" icon-exchange"></i>
									<span class="menu-text"> Harsh Acceleration </span>
								</a>
							    </li> 
								<li <?php if($page=='harsh_break'){echo "class='active'";} ?>>
								<a href="track.php?page=harsh_break&id=<?php echo $id; ?>" class="dropdown-toggle">
									<i class=" icon-exchange"></i>
									<span class="menu-text"> Harsh Break </span>
								</a>
							    </li> 
									
								<?php } ?>
<?php //} ?>

				</ul><!--/.nav-list-->







				<div class="sidebar-collapse" id="sidebar-collapse">



					<i class="icon-double-angle-left"></i>



				</div>



			</div>
            

            