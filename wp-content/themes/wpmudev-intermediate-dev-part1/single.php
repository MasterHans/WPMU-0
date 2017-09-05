<?php get_header(); ?>

<div class="container">
	<div class="content">

	<?php do_action('wpmu_before_content'); ?>

	<?php if ( have_posts()) :?>
	<?php while (have_posts()) : the_post();?>

		<?php get_template_part("loop","single") ?>

	<?php endwhile; endif; ?>

	<?php do_action('wpmu_after_content'); ?>

	</div><!--.content-->
<?php get_sidebar(); ?>

</div><!--.container-->

<h1><?php the_tags(); ?></h1>

<?php
//$posttags = get_the_tags();
//
//if ($posttags) {
////        var_dump($posttags);
//    foreach($posttags as $tag) {
//        echo '<p>' . $tag->name . '</p>';
//    }
//}
//?>
<?php get_footer(); ?>