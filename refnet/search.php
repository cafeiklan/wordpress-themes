<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	<?php
		get_header();
	?>

	<section id="primary" class="site-content">
		<div class="single1column" role="main">
			<div id="content" role="main">
				<?php
					$search_title =  __('Search Results for: ', 'refnet');
					$search_title .= '<span>' . get_search_query() . '</span>';
					echo create_bread_crumb($search_title);
				?>
				<?php if ( have_posts() ) : ?>

					<?php //twentytwelve_content_nav( 'nav-above' ); ?>

					<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						</header>
						<p class="post-date"><?php the_time('d/m/Y'); ?></p>
						<p class="post-description_of_the_search"><?php echo bir_show_custom_field_translated(get_the_ID(), 'description_of_the_search'); ?></p>
					</article>
				<?php endwhile; ?>

					<?php //twentytwelve_content_nav( 'nav-below' ); ?>

				<?php else : ?>

					<article id="post-0" class="post no-results not-found">
						<header class="entry-header">
							<h1 class="entry-title"><?php _e( 'Not Found', 'twentytwelve' ); ?></h1>
						</header>

						<div class="entry-content">
							<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with different keywords.', 'twentytwelve' ); ?></p>
							<?php get_search_form(); ?>
						</div><!-- .entry-content -->
					</article><!-- #post-0 -->

				<?php endif; ?>

			</div><!-- #content -->
		</div>
		<div class="column column_2">
                       	<?php dynamic_sidebar('level2'); ?>
               	</div>	
		<?php wp_pagenavi(); ?>
	</section><!-- #primary -->

<?php get_footer(); ?>
