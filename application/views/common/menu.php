<section id="left-navigation">
<!--Left navigation user details start-->
	<div class="user-image">
	    <img src="<?=base_url();?>assets/images/avatar-80.png" alt=""/>
	    <div class="user-online-status"><span class="user-status is-online"></span> </div>
	</div>
	<ul class="social-icon"><li style="color:#fff;">Welcome <span style="color:#FF7878;"><?php echo $this->session->userdata('customer_first_name'); ?></span></li></ul>
    <br>

<!--Left navigation user details end-->
<!--Phone Navigation Menu icon start
	<div class="phone-nav-box visible-xs">
    	<a class="phone-logo" href="index.html" title=""><h1>GPS</h1></a>
    	<a class="phone-nav-control" href="javascript:void(0)">
        <span class="fa fa-bars"></span>
    </a>
    <div class="clearfix"></div>
</div>
Phone Navigation Menu icon start-->

<!--Left navigation start-->




<ul class="mainNav">
	<li <?php if(isset($CurrentPage) && $CurrentPage == "Home") echo'class="active"'; ?>>
	    <a <?php if(isset($CurrentPage) && $CurrentPage == "Home") echo'class="active"'; ?> href="<?=base_url();?>track/dashboard/<?=$this->uri->segment(3);?>">
	        <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
           
	    </a>
	</li>
    
	<li <?php if(isset($CurrentPage) && $CurrentPage == "add-category") echo'class="active"'; ?>>
    	<a <?php if(isset($CurrentPage) && $CurrentPage == "add-category") echo'class="active"'; ?> href="<?=base_url();?>geofence/index/<?=$this->uri->segment(3);?>">
        	<i class="fa fa-briefcase"></i><span>Geofence</span>
            
        </a> 
    </li>
	
	
    <li <?php if(isset($CurrentPage) && $CurrentPage == "view") echo'class="active"'; ?>>
    	<a <?php if(isset($CurrentPage) && $CurrentPage == "view") echo'class="active"'; ?> href="<?=base_url();?>playback/index/<?=$this->uri->segment(3);?>">
        	<i class="fa fa-check-square-o"></i><span>Playback</span>
        </a>
    </li>
    
    <li <?php if(isset($CurrentPage) && $CurrentPage == "add-project") echo'class="active"'; ?>>
    	<a <?php if(isset($CurrentPage) && $CurrentPage == "add-project") echo'class="active"'; ?> href="<?=base_url();?>trip/index/<?=$this->uri->segment(3);?>">
        	<i class="fa fa-check-square-o"></i><span>Trip schedule</span>
        </a>
    </li>
    
    
    <li <?php if(isset($CurrentPage) && $CurrentPage == "add-project") echo'class="active"'; ?>>
    	<a <?php if(isset($CurrentPage) && $CurrentPage == "add-project") echo'class="active"'; ?> href="<?=base_url();?>report/report_dashboard/<?=$this->uri->segment(3);?>">
        	<i class="fa fa-check-square-o"></i><span>Reports</span>
        </a>
    </li>
     
	 <li <?php if(isset($CurrentPage) && $CurrentPage == "add-project") echo'class="active"'; ?>>
    	<a <?php if(isset($CurrentPage) && $CurrentPage == "add-project") echo'class="active"'; ?> href="<?=base_url();?>settings/index/<?=$this->uri->segment(3);?>">
        	<i class="fa fa-check-square-o"></i><span>Settings</span>
        </a>
    </li>
	
	 <li <?php if(isset($CurrentPage) && $CurrentPage == "add-project") echo'class="active"'; ?>>
    	<a <?php if(isset($CurrentPage) && $CurrentPage == "add-project") echo'class="active"'; ?> href="<?=base_url();?>profile/index/<?=$this->uri->segment(3);?>"">
        	<i class="fa fa-check-square-o"></i><span>Profile</span>
        </a>
    </li>
    
</ul>

<!--Left navigation end-->

</section>