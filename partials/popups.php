<?php

// ====================
// LOAD THE POPUPS LOOP
// ====================

global $post;
$meta = get_post_meta(get_the_ID());

// Movies designated as site pop-ups
$popups_args = movies_query_args('popups');
$popups_query = new WP_Query($popups_args); ?>

<?php if ($popups_query->have_posts()) : ?>
	<div id="movie-show-popups">
		<button>Special Showtimes <span style="color: <?=et_get_option('secondary_nav_bg')?>"><?=$popups_query->post_count?></span></button>
	</div>

	<ul id="movie-popups">
	<?php while($popups_query->have_posts()) : $popups_query->the_post(); ?>

		<li id="<?=$post->post_name;?>-link" class="post-<?php the_ID(); ?>">
			<a href="#<?=$post->post_name;?>" class="details_popup mfp-hide"></a>
			<?php
				include(locate_template('partials/movie.php'));
				// Clear $meta so it doesn't contaminate the other movie listings
				unset($meta);
			?>
		</li>

	<?php endwhile; ?>
	</ul>
<?php endif; ?>
