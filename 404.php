<?php
/**
 * The template for displaying 404 pages (Not Found)
*
 * @package ZEDOCS
 * @since   1.0.0
 */


get_header(); ?>

	<div id="primary" class="content-area container">
		<div id="content" class="site-content row" role="main">

			<header class="page-header">
				<section class="error-container">
					<span class="four"><span class="screen-reader-text">4</span></span>
					<span class="zero"><span class="screen-reader-text">0</span></span>
					<span class="four"><span class="screen-reader-text">4</span></span>
				</section>
				
			</header>

			<div class="page-wrapper text-center mb-5">
				<div class="page-content">
					<h1 class="page-title p-0"><?php _e( '404 Error Page', 'zedocs' ); ?></h1>
					<h2><?php _e( 'This is somewhat embarrassing, isn’t it?', 'zedocs' ); ?></h2>
					<a class="btn btn-main btn-round-full" href="/"><?php _e( 'Go to Home', 'zedocs' ); ?></a>

				</div><!-- .page-content -->
			</div><!-- .page-wrapper -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php

get_footer(); ?>	
	