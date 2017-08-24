<?php get_header(); ?>

<div class="container">
	<div class="content">
	<?php if ( have_posts()) :?>
		<?php while (have_posts()) : the_post();?>

		<article>

			<h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title();?></a></h1>

			<div class="entry-content">
				<?php the_content('<p class="left"></p>');?>
			</div><!--.entry-content-->

		</article>

		<?php endwhile; endif; ?>

	</div><!--.content-->

<?php get_sidebar(); ?>

</div><!--.container-->

<?php get_footer(); ?>