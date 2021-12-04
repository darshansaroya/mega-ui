<!-- Breadcum start -->
<div class="banner">
	<div class="container">
		<div class="col-12 text-center">
			<?php if(is_singular()){ ?>
			<h3 class="lh130 ls2 text-center white"><?php the_title(); ?></h3>
		<?php }else{
			the_archive_title( '<h3 class="lh130 ls2 text-center white">', '</h3>' );
			} ?>
			<div class="gray ls2 text-center"><?php if (function_exists('mega_ui_breadcrumbs')){ mega_ui_breadcrumbs(); } ?></div>
		</div>
				
	</div>
</div>
<!-- Breadcum End -->

