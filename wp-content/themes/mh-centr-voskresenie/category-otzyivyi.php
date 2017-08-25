<?php get_header() ?>
<div class="page-top">
	<div class="parallax" style="background:url(<?php echo get_template_directory_uri() ?>/images/parallax1.jpg);"></div>
	<div class="container">
		<h1><span><?php single_cat_title(); ?></span></h1>
		<ul>
			<?php the_breadcrumb(); ?>
		</ul>
	</div>
</div><!--- PAGE TOP -->

<section>
	<div class="block">
		<div class="container">
			<div class="row">
				<div class="col-md-12 column">
					<div class="row">
						<div class="remove-ext">
							<div class="prayers-columns">
							<?php if (have_posts()) : ?>
								<?php while (have_posts()) : the_post(); ?>
								<div class="col-md-6 column">
										<div class="prayer">
											<?php the_excerpt(); ?>
											<?php echo the_post_thumbnail( [97,97] ); ?>
											<h4><a href="<?php the_permalink(); ?>" title="<?php the_title() ?>"><?php the_title() ?></a></h4>
											<span><?php the_time('j M. Y') ?></span>
										</div>
								</div>
								<?php endwhile; ?>
							<?php else : ?>
								<div class="search-result">в эту рубрику пока ничего не написано.</div>
							<?php endif;  ?>
							</div>
						</div>
					</div>



					<div class="theme-pagination">
						<?php kriesi_pagination(); ?>
					</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer() ?>