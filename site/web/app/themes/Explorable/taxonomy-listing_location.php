<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

	<?php get_template_part( 'includes/fullwidth_map', 'listing_location' ); ?>

<?php endif; ?>

<?php get_footer(); ?>