
<aside class="col-md-4 sidebar column">
					<div class="widget">
						<form class="search-form" action="<?php echo home_url( '/' ); ?>">
							<input type="text" placeholder="ВВЕДИТЕ СТРОКУ ПОИСКА" name="s" id="s" />
							<input type="submit" value=""/>
						</form>
					</div><!-- SEARCH FORM -->

					<?php $category = get_the_category();/*название первой категории (если относится к нескольким)*/?>
					<div class="widget">
						<div class="widget-title"><h4><?php echo $category[0]->cat_name; ?></h4></div>
						<div class="tagclouds">
							<?php
							$myquery = new WP_Query(['cat' => $category[0]->cat_ID,'orderby' => 'date', 'order' => 'ASC', 'posts_per_page'=>'30']);
							if ($myquery -> have_posts()) : ?>
									<?php while ($myquery -> have_posts()) : $myquery -> the_post(); ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title() ?>"><?php the_title() ?></a><br>
									<?php endwhile; ?>
								<?php else : ?>
									<div class="search-result">в эту рубрику пока ничего не написано.</div>
								<?php endif; wp_reset_postdata();// сбрасываем переменную $post ?>
						</div>
					</div><!-- TAG CLOUD -->

					<div class="widget">
						<div class="widget-title"><h4>Отзывы о нас</h4></div>
						<div class="remove-ext">
							<?php
								$idObj = get_category_by_slug('otzyivyi');/*Получаем категорию по слагу*/
								$cat_otziv_id = $idObj->term_id;
								$args = ['category' => $cat_otziv_id, 'orderby' => 'rand', 'order' => 'ASC', 'showposts' => '2'];
								$myposts = get_posts( $args );
								foreach( $myposts as $post ){ setup_postdata($post);
									// стандартный вывод записей
							?>
								<div class="widget-blog">

									<div class="widget-blog-img">
										<?php echo the_post_thumbnail( [97,97] ); ?>
									</div>
									<h6><a href="<?php the_permalink(); ?>" title="<?php the_title() ?>"><?php the_title() ?></a></h6>
									<p><?php echo get_post_meta($post->ID,'description',true); ?></p>
									<span><i class="fa fa-calendar-o"></i><?php the_time('j M. Y') ?></span>
								</div><!-- WIDGET BLOG -->
							<?php } wp_reset_postdata(); // сбрасываем переменную $post ?>
						</div>
					</div><!-- RECENT BLOG -->

					<div class="widget">
						<?php
							$idObj = get_category_by_slug('video');/*Получаем категорию по слагу*/
							$cat_video_id = $idObj->term_id;
							$args = ['cat' =>  $cat_video_id, 'orderby' => 'rand', 'order' => 'ASC', 'showposts' => '1'];
							$myposts = get_posts( $args );
							foreach( $myposts as $post ){ setup_postdata($post);
								// стандартный вывод записей
						?>
							<div class="widget-title"><h4><?php the_title() ?></h4></div>
							<div class="video">
								<?php the_content() ?>
							</div>
						<?php } wp_reset_postdata(); // сбрасываем переменную $post ?>
					</div><!-- VIDEO -->

					<div class="widget">
						<div class="widget-title"><h4>ДОКУМЕНТЫ</h4></div>
						<?php
						$idObj = get_category_by_slug('docs');/*Получаем категорию по слагу*/
						$cat_video_id = $idObj->term_id;
						$args = ['cat' =>  $cat_video_id, 'orderby' => 'rand', 'order' => 'ASC', 'showposts' => '1'];
						$myposts = get_posts( $args );
						foreach( $myposts as $post ){ setup_postdata($post);
							// стандартный вывод записей
							?>
							<a href="<?php echo the_permalink() ?>" title="<?php echo the_title() ?>"><?php echo the_post_thumbnail( [355,250] ); ?></a>
						<?php } wp_reset_postdata(); // сбрасываем переменную $post ?>
					</div><!-- META -->
</aside><!-- SIDEBAR -->