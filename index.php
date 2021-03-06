<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since  
 * Timber 0.1
 */

$context = Timber::get_context();

$posts_per_page = get_option('posts_per_page');

$context['posts'] = Timber::get_posts( 
	array(
		'posts_per_page' => $posts_per_page,
		'paged' => $paged
	)
);
$post = new TimberPost();
$context['title'] =  get_the_title( $post->ID );
$context['pagination'] = Timber::get_pagination();
$context['paged'] = $paged;
$templates = array( 'index.twig' );
if ( is_home() ) {
	array_unshift( $templates, 'home.twig' );
}
Timber::render( $templates, $context );