<?php
/**
 * The template for displaying search forms
 */
?>
<form method="get" class="brick searchform dark width-11 height-1" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<button type="submit" data-role="none" class="brick icon-search grey height-1 width-1"><span class="visuallyhidden">search</span></button>
	<label>
		<span class="visuallyhidden">Search <?php bloginfo( 'name' ); ?></span>
		<input type="text" class="brick width-10 height-1" data-role="none" name="s" value="<?php echo get_search_query(); ?>"
			placeholder="Search">
	</label>
</form>
