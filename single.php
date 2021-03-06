<?php get_header();
get_template_part('breadcrumbs');
the_post();
$mega_ui_pid = get_the_ID(); ?>
<div id="content" class="blog-ui-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-12">
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if(has_post_thumbnail()): ?>
				<div class="card mt5 entry-thumb">
				<?php $data= array('class' =>'img-fluid center-block'); 
					the_post_thumbnail('mega_ui_thumb', $data); ?>
				</div>
			<?php endif; ?>
				<div class="card mt5">
					<div class="card-body">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<ul class="mt2 entry-meta">
							<li><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ))); ?>"><i class="fa fa-user"></i> <?php the_author(); ?></a></li>
							<li><i class="fa fa-clock-o"></i>  <?php echo esc_html(human_time_diff( get_the_time('U'), current_time('timestamp') )) .' '. esc_html__(' ago','mega-ui'); ?>	 </li>
							<li><a href="<?php comments_link(); ?>"><i class="fa fa-comment-o"></i>  <?php echo esc_html(get_comments_number()); ?></a> </li>
						<?php if(get_the_category_list() != ''): ?>
							<li><i class="fa fa-tag icon"></i> <?php the_category(', '); ?> </li>
						<?php endif; 
						if(get_the_tag_list()) { 
							the_tags('<li><i class="fa fa-bookmark"></i> ',', ','</li>');
						} ?>
						</ul>
						<div class="mt2 entry-content"><?php the_content(); mega_ui_link_pages(); ?></div>	
						
					</div>
				</div>
				<div class="row mt5 p-0 w_blog_pagination">
					<?php mega_ui_post_link(); ?>
				</div>
				<?php if(get_the_author_meta('description')) : ?>
				<div class="card author mt5">
					<div class="card-header">
						<span class="w600"><?php esc_html_e('About author','mega-ui'); ?></span>
					</div>
					
					<div class="card-body">
						<div class="row">						
							<div class="col-lg-3 col-md-4 col-xs-4">
							<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>" title="<?php the_author(); ?>"><?php echo get_avatar( get_the_author_meta('email') , 150, 'monsterid', get_the_author(), array('class'=>'img-fluid center-block') ); ?></a>
								
							</div>
							<div class="col-lg-9 col-md-8 col-xs-8 lmt0 xsmt5">
								<h1 class="w600"><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>"><?php the_author(); ?></a></h1>
								<p class="w400 mt2">							
									<?php echo esc_html(get_the_author_meta('description')); ?>                                  
								</p>
							</div>
						</div>
					</div>
				</div>
				<?php endif;
				if ( comments_open() || get_comments_number() ) :
					comments_template();  endif;?>
					<?php if(get_post_type( $mega_ui_pid ) == 'post'):
					$mega_ui_cats = array();
					foreach(wp_get_post_categories($mega_ui_pid) as $c){
					$mega_ui_cat = get_category($c);
					array_push($mega_ui_cats, $mega_ui_cat->cat_ID); } ?>
					<?php $recent_args= array('post_type' => 'post', 'category__in' => $mega_ui_cats, 'post__not_in'=> array($mega_ui_pid)); 
					$mega_ui_recent = new WP_Query( $recent_args ); 
					if ( $mega_ui_recent->have_posts() ) : ?>
				<div class="card mt5">
					<div class="card-header">
						<span class="w600"><?php esc_html_e('Related Posts','mega-ui') ?></span>
					</div>
					<div class="col-12 recent-blog-ui">
						<div id="mega-ui-related" class="owl-carousel owl-theme">
						<?php while ( $mega_ui_recent->have_posts() ) : $mega_ui_recent->the_post(); ?>
							<div class="item">
								<div class="col-12 widget p-0 mt5">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php if(has_post_thumbnail()){
										$related_post_thumb =array('class'=>"img-fluid center-block");
											the_post_thumbnail('thumbnail', $related_post_thumb);
								}else{ ?>
									<img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/related-placeholder.jpg" class="img-fluid center-block"  alt="<?php the_title(); ?>" >
								<?php } ?>
									<div class="overlay"></div>
									<div class="widget-text2"> 
										<h5 class="w600 white "><?php the_title(); ?></h5>
										<p class="related-post-data white"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 15)); ?></p>
									</div>
									</a>
								</div>
							</div>
							<?php endwhile; ?>
						</div>
						<script>
				jQuery('#mega-ui-related').owlCarousel({
						loop:false,
						margin:10,
						nav:true,
						responsive:{
							0:{
								items:1
							},
							600:{
								items:2
							},
							1000:{
								items:3
							}
						}
					})
				</script>
					</div>
				</div>
				<?php endif; wp_reset_query(); 
			endif; ?>
			</div>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>