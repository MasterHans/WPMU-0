<?php get_header(); ?>

<div class="container">
	<div class="content">
	<?php if ( have_posts()) :?>
		<?php while (have_posts()) : the_post();?>

			<?php get_template_part('loop')?>

		<?php endwhile; endif; ?>

	</div><!--.content-->

<?php get_sidebar(); ?>

</div><!--.container-->

<?php get_footer(); ?>