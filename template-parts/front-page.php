<?php
/*
Template Name: front-page
*/
?>

<?php get_header(); ?>

<div class="block__content">
		<?php query_posts('category_name=stories&showposts=1');
			while ( have_posts() ) : the_post();
		$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
		endwhile;
		?>
	<div class="main-image-block" style="background-image: url(<?php echo $src[0]; ?> ) !important;">
		<div id="latest-stories-posts" class="container-post-excerpt padding-added">
			<div class="text-wrap-div">
				<h3><a class="read-more" href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark">Latest Story</a></h3>
				<?php query_posts('category_name=stories&showposts=1');
				while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content-front-page-catexcerpt', 'page' );
				endwhile; ?>
			</div>
		</div>
	</div>
	<?php query_posts('category_name=news&showposts=1');
			while ( have_posts() ) : the_post();
		$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
		endwhile;
		?>
	<div class="main-image-block" style="background-image: url(<?php echo $src[0]; ?> ) !important;">
		<div id="latest-about-homelessness-posts" class="container-post-excerpt padding-added">
			<div class="text-wrap-div">
				<h3><a class="read-more" href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark">Latest News</a></h3>
				<?php query_posts('category_name=news&showposts=1');
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content-front-page-catexcerpt', 'page' );
				endwhile; ?>
			</div>
		</div>
	</div>
	<?php query_posts('category_name=about-homelessness&showposts=1');
			while ( have_posts() ) : the_post();
		$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
		endwhile;
		?>
	<div class="main-image-block" style="background-image: url(<?php echo $src[0]; ?> ) !important;">
		<div id="latest-about-homelessness-posts" class="container-post-excerpt padding-added">
			<div class="text-wrap-div">
				<h3><a class="read-more" href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark">About Homelessness</a></h3>
				<?php query_posts('category_name=about-homelessness&showposts=1');
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content-front-page-catexcerpt', 'page' );
				endwhile; ?>
			</div>
		</div>
	</div>
</div>

<div class="block block">
	<div class="block__content">
		<div id="latest-news-posts" class="front-page__news container-cat-titles">
			<h1 class="h1">Recent Posts</h1>
			<div class="front-page__news-list">
				<?php
					$args = array( 'posts_per_page' => 3 );
					$lastposts = get_posts( $args );
					foreach ( $lastposts as $post ) :
  				setup_postdata( $post ); ?>
				<?php
				get_template_part( 'template-parts/content-front-page-news', 'page' );
				?>
				<?php endforeach;
				wp_reset_postdata(); ?>
			</div>
			<a href="<?php echo get_site_url (); ?>/category/news" class="btn btn--brand-j"><span class="btn__text">Load More</span></a>
		</div>
	</div>
</div>

<div class="block block--offwhite">
	<div class="block__content recent-activity">
		<div id="latest-archives" class="front-page__archives container-cat-titles offwhite-frontpage">
			<h1 class="h1">Archives</h1>
			<div class="front-page__archive-list">
				<?php get_template_part( 'template-parts/content-front-page-archives', 'page' );
				 ?>
			</div>
		</div>
		<div id="latest-categories" class="front-page__categories container-cat-titles offwhite-frontpage">
			<h1 class="h1">Categories</h1>
			<div class="front-page__category-list">
				<?php get_template_part( 'template-parts/content-front-page-categories', 'page' );
				?>
			</div>
		</div>
		<div id="latest-comments" class="front-page__comments container-cat-titles offwhite-frontpage">
			<h1 class="h1">Recent Comments</h1>
			<div class="front-page__comments-list">
				<?php get_template_part( 'template-parts/content-front-page-comments', 'page' );
				 ?>
			</div>
		</div>
	</div>
</div>

<?php
get_sidebar();
get_footer();
