<?php get_header(); ?>

<div class="page-top">
	<div class="parallax" style="background:url(<?php echo get_template_directory_uri() ?>/images/parallax1.jpg);"></div>
	<div class="container">
		<?php
			/*Выделить последнее слово в названии*/
		 	$post_name = get_the_title($post->ID);
			$post_name_arr = explode(' ', $post_name);
			$post_name_last_word = array_pop($post_name_arr);
			$post_others_words = implode(' ',$post_name_arr);

		?>
		<h1><?php echo $post_others_words ?> <span><?php echo $post_name_last_word?></span></h1>
		<ul>
			<?php the_breadcrumb(); ?>
		</ul>
	</div>
</div><!--- PAGE TOP -->



<section>
	<div class="block">
		<div class="container">
			<div class="row">
				<div class="col-md-8 column">
					<div class="service-block">
					<?php if (have_posts()) : ?>
						<?php while (have_posts()) : the_post(); ?>
							<div class="service-image">
								<?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'full-size-image',NULL,'featured-image-770-500'); ?>
								<i class="fa fa-book"></i>
							</div>
							<h3><?php the_title() ?></h3>
							<div class="content-text">
								<?php the_content() ?>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
					</div>
				</div>
				<?php get_sidebar('cats-others-all'); ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer() ?>