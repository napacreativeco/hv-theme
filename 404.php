<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package highvis
 */

get_header('splash');
?>

<style>
	.fourohfour {
		width: 100%;
		min-height: 100svh;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
	}
	h1 {
		font-size: 44px;
		font-weight: bold;
	}
	h3 {
		font-size: 34px;
	}

	a {
		margin-top: 20px;
	}
</style>

<div class="fourohfour">
	<h1>404</h1>
	<h3>This page could not be found</h3>
	<a href="https://www.highvisuk.com" title="Back to Home">Go back to <u>highvisuk.com</u></a>
</div>

<?php
get_footer();
