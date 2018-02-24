		<div class="main-container container-fluid">

			<a class="menu-toggler" id="menu-toggler" href="#">

				<span class="menu-text"></span>

			</a>



			<div class="sidebar" id="sidebar">

            

            	<ul class="nav nav-list">

<!--					<li <?php if($page=='profile'){ ?> class="active" <?php } ?>>

						<a href="index.php?page=profile&id=<?php echo $id; ?>">

							<i class="icon-dashboard"></i>

							<span class="menu-text"> Dashboard </span>

						</a>

					</li>

-->

					<li<?php if($page=='notifications'){ ?> class="active" <?php } ?>>

						<a href="index.php?page=notifications&id=<?php echo $id; ?>">

							<i class="icon-envelope"></i>

							<span class="menu-text"> Mailbox </span>

						</a>

					</li>

                    

					<li<?php if($page=='orders'){ ?> class="active" <?php } ?>>

						<a href="index.php?page=orders&id=<?php echo $id; ?>">

							<i class="icon-tag"></i>

							<span class="menu-text"> Orders </span>

						</a>

					</li>
<?php
$sqinv="select dealers_customer from customers where customer_id=$id";
$rsinv=mysql_query($sqinv);
$rwinv=mysql_fetch_assoc($rsinv);
if($rwinv['dealers_customer']!=1){
?>

					
					
                    <li  <?php if($page=='subscription' || $page=='renew'){ ?>class="active" <?php } ?>>
                    <?php if($customer['account_type']!='demo'){?>
								<a href="index.php?page=subscription&id=<?php echo $id; ?>" >
					<?php } else {echo '<a href="#" >'; }?>	
                    				<i class="icon-list"></i>

									Subscription									

								</a>

                           </li>

                    

                    
<?php
//if($rwinv['dealers_customer']!=1){
	

 //if($id!=255 && $id!=270 && $id!=237 && $id!=317 && $id!=335 && $id!=338 && $id!=350 && $id!=217 && $id!=216 && $id!=438){?>


							<li  <?php if($page=='invoices' || $page=='rinvoices' || $page=='invoices_list'){ ?>class="active" <?php } ?>>
<?php if($customer['account_type']!='demo'){?>
								<a href="index.php?page=invoices_list&id=<?php echo $id; ?>" >
<?php } else {echo '<a href="#" >'; }?>
									<i class="icon-list"></i>



									Invoices

									

								</a>

                           </li>
<?php } ?>

	

				</ul><!--/.nav-list-->

                

                <div class="sidebar-collapse" id="sidebar-collapse">

					<i class="icon-double-angle-left"></i>

				</div>

			</div>

