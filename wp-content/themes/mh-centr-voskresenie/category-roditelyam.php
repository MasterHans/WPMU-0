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

<!--Все Услуги-->
<section>
	<div class="block">
    	<div class="container">
			<div class="row">
				<div class="col-md-12 column">
					<div class="row">
						<div class="service-listing">
                            <?php
                            global $query_string; // параметры базового запроса
                            query_posts($query_string . '&orderby=date&order=ASC');

                            if ( have_posts()) : ?>
                                <?php while ( have_posts() ) : the_post(); ?>

                                    <div class="col-md-4 column">
                                        <div class="service-block">
                                            <div class="service-image">
                                                <?php echo the_post_thumbnail( [355,148] ); ?>
                                                <i class="fa fa-book"></i>
                                            </div>
                                            <h3><?php the_title() ?></h3>
                                            <p><?php echo short_exerpt(get_the_excerpt(),172,'...') ?></p>
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">УЗНАТЬ БОЛЬШЕ</a>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <div class="search-result">в эту рубрику пока ничего не написано.</div>
                            <?php endif; wp_reset_query(); // сбрасываем переменную $post ?>
				        </div>
			        </div>
                    <div class="theme-pagination">
                        <?php kriesi_pagination(); ?>
                    </div>
		        </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer() ?>