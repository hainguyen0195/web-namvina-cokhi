<div class="container">
	<div class="flex_row row-users">
		<div class="col-users-left">
			<?php include TEMPLATE."account/menu_tpl.php"; ?>
		</div>
		<div class="col-users-right">
			<?php 
			echo'<h2 class="title-main wow fadeInDown" data-wow-duration="1s"data-wow-delay="0.2s"><span>'.$title_crumb.'</span></h2>';
			if(isset($ds_sp) && count($ds_sp) > 0 ) {
				echo'<div class="row " >';
				for ($i=0; $i < count($ds_sp); $i++) { 
					$value=$cart->get_product_info($ds_sp[$i]);
					if($value){
						$func->showProduct($value,'col-md-4 col-sm-6 col-xs-12');
					}
				}
				echo'</div>';
			}
			?>
		</div>
	</div>
</div>