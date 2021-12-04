<?php //Template Name: Landing Page
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if(is_singular() && pings_open()){ ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php } wp_head(); ?>
</head>
<?php the_post(); ?>
<body id="content" <?php body_class(); ?>>
	<?php the_content(); ?>
<?php wp_footer(); ?>
</body>

</html>