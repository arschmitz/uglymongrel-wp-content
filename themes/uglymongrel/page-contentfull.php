<?php
/*
 * Template Name: Content Full
 */
?>
<?php get_header(); ?>

<?php the_post(); ?>


		<?php if ( !count( get_post_meta( $post->ID, "hide_title" ) ) ) : ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<hr>
		<?php endif; ?>

		<?php get_template_part( 'content', 'page' ); ?>


<?php get_footer(); ?>
