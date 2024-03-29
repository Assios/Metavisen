<?php get_header(); ?>

			<div id="content">
				
				<div id="inner-content" class="wrap clearfix">

							<?php $style = array('onepic' => ' twelvecol', 'twopic' => ' sixcol'); $counter = 0; if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php $stuff = 'clearfix'; $stuff .= $style[get_field('post_type')]; if ($counter % 2 ? $stuff .= ' last' : $stuff .= ' first'); post_class($stuff); ?> role="article">

								<header class="article-header">
									<p class="cattag byline vcard"><?php
										printf(__('%4$s', 'bonestheme'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), bones_get_the_author_posts_link(), get_the_category_list(', '));
									?></p>
									<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( get_field('post_type') ); ?>
									<h1 class="h1">
									<?php the_title(); ?></a></h1>
								<section class="entry-ingress clearfix">
									<?php the_excerpt(); ?>
								</section>

								</header> <!-- end article header -->

								<footer class="article-footer">
									<p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'bonestheme') . '</span> ', ', ', ''); ?></p>

								</footer> <!-- end article footer -->

								<?php // comments_template(); // uncomment if you want to use them ?>

							</article> <!-- end article -->

							<?php $counter++; endwhile; ?>

									<?php if (function_exists('bones_page_navi')) { ?>
											<?php bones_page_navi(); ?>
									<?php } else { ?>
											<nav class="wp-prev-next">
													<ul class="clearfix">
														<li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "bonestheme")) ?></li>
														<li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "bonestheme")) ?></li>
													</ul>
											</nav>
									<?php } ?>

							<?php else : ?>
									<article id="post-not-found" class="hentry clearfix">
											<header class="article-header">
												<h1><?php _e("Her erre tomt, gitt!", "bonestheme"); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e("Prøv igjen.", "bonestheme"); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e("", "bonestheme"); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						
				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
