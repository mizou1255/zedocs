<?php
/**
 * The header template.
 *
 * This is the template that displays all of the <head> section and everything
 * up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ZEDOCS
 * @since   1.0.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php ZD_get_favicon(); ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php 
      $logo_switch = ZD_theme_option("logo_switch");
      $logo_text = ZD_theme_option("logo_text");
      $change_log_btn = ZD_theme_option("change_log_btn"); 
      $road_btn = ZD_theme_option("road_btn");   
    ?>

    <body class="docs-page" data-bs-spy="scroll" data-bs-target="#docs-nav" data-bs-root-margin="-100px 0px -40%">
        <header class="header fixed-top">
            <div class="branding docs-branding">
                <div class="container-fluid position-relative py-2">
                    <div class="docs-logo-wrapper gap-2 d-flex">
                        <button id="docs-sidebar-toggler" class="docs-sidebar-toggler docs-sidebar-visible d-xl-none"
                            type="button">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <div class="site-logo zd_logo_style">
                            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                                <?php if ($logo_switch == 'text') { ?>
                                  <span class="logo-text"><?php echo $logo_text; ?></span>
                                <?php } else { ?>
                                    <?php ZD_get_logo();?>
                                <?php } ?>
                            </a>
                            <span class="badge bg-primary"></span>
                        </div>
                    </div>

                    <div class="docs-top-utilities d-flex justify-content-end align-items-center gap-3">
                        <div class="top-search-box d-none d-lg-flex">
                            <form class="search-form">
                                <input type="search"
                                    placeholder="<?php echo esc_html__('Search the docs...', 'zedocs'); ?>"
                                    name="search" class="form-control search-input" autocomplete="off">
                                <div id="results"></div>
                            </form>
                        </div>
                        <?php if ($change_log_btn == true) { ?>          
                          <button type="button" class="btn-changelog btn btn-primary d-none d-lg-flex"
                              data-bs-toggle="modal" data-bs-target="#changelogModal">
                              <?php echo esc_html__('Changelog', 'zedocs'); ?>
                          </button>
                        <?php } ?>

                        <?php if ($road_btn == true) { ?>
                          <button type="button" class="btn btn-secondary d-none d-lg-flex" data-bs-toggle="modal"
                              data-bs-target="#roadmapModal">
                              <?php echo esc_html__('Roadmap', 'zedocs'); ?>
                          </button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </header>