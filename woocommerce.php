<?php get_header();
get_template_part('breadcrumbs');
//the_post(); ?>
<div id="content" class="blog-ui-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-12">
				<div class="card mt-3">
					<div class="card-body">
						<?php woocommerce_content(); ?>
					</div>
				</div>
			</div>
			<?php get_sidebar('woocommerce'); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>