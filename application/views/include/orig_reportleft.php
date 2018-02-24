			<div class="main-container container-fluid">



			<a class="menu-toggler" id="menu-toggler" href="#">



				<span class="menu-text"></span>



			</a>



            

            <div class="sidebar" id="sidebar">



				<div class="sidebar-shortcuts" id="sidebar-shortcuts">



					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">



						<a href="track.php?page=orig_geofence&id=<?php echo $id; ?>"><button class="btn btn-small btn-success" title="Geo Fence">



							<i class="icon-hand-down"></i>



						</button></a>



<a href="track.php?page=playback_track&id=<?php echo $id; ?>">



						<button class="btn btn-small btn-info" title="Route Playback">



							<i class="icon-facetime-video"></i>



						</button></a>





<a href="track.php?page=orig_report&id=<?php echo $id; ?>&report=1">

						<button class="btn btn-small btn-warning" title="Reports">



							<i class="icon-bar-chart"></i>



						</button></a>







						<button class="btn btn-small btn-danger" title="Engine Control">



							<i class="icon-cogs"></i>



						</button>



					</div>







					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">



						<span class="btn btn-success"></span>







						<span class="btn btn-info"></span>







						<span class="btn btn-warning"></span>







						<span class="btn btn-danger"></span>



					</div>



				</div><!--#sidebar-shortcuts-->







				<ul class="nav nav-list">



					

					<li >







						<a href="track.php?page=dashboard&id=<?php echo $id; ?>" class="dropdown-toggle">







							<i class="icon-dashboard"></i>







							<span class="menu-text"> Dashboard </span>







						</a>



						</li>





						<li <?php if($_GET['report']==1){echo "class='active'";} ?>>



						<a href="track.php?page=orig_report&id=<?php echo $id; ?>&report=1" class="dropdown-toggle">



							<i class="icon-bolt"></i>



							<span class="menu-text"> Daily Driving Report </span>



							



						</a>



					



					    </li>



							<li <?php if($_GET['report']==3){echo "class='active'";} ?>>



						<a href="track.php?page=orig_report&id=<?php echo $id; ?>&report=3" class="dropdown-toggle">



							<i class="icon-road"></i>



							<span class="menu-text">  Daily Driving Details Report </span>



							



						</a>



					



					    </li>



							<li <?php if($_GET['report']==4){echo "class='active'";} ?>>



						<a href="track.php?page=orig_report&id=<?php echo $id; ?>&report=4" class="dropdown-toggle">



							<i class="icon-warning-sign"></i>



							<span class="menu-text">  Speeding  </span>



							



						</a>



					



					    </li> 




						<li <?php if($_GET['report']==5){echo "class='active'";} ?>>



						<a href="track.php?page=orig_report&id=<?php echo $id; ?>&report=5" class="dropdown-toggle">



							<i class="icon-bolt"></i>



							<span class="menu-text">  Geofence </span>



						</a>


					    </li> 
						<li <?php if($_GET['report']==6){echo "class='active'";} ?>>



						<a href="track.php?page=orig_report&id=<?php echo $id; ?>&report=6" class="dropdown-toggle">



							<i class="icon-th"></i>



							<span class="menu-text">  Idling </span>



						</a>


					    </li> 


				</ul><!--/.nav-list-->







				<div class="sidebar-collapse" id="sidebar-collapse">



					<i class="icon-double-angle-left"></i>



				</div>



			</div>
            

            