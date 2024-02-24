<?php
/**
 * Template Name: ZeDocs
 *
 */

get_header();

$type_posts = ZD_theme_option("type_posts");
?>

<div class="docs-wrapper">
    <div id="docs-sidebar" class="docs-sidebar">
        <div class="top-search-box d-lg-none p-3">
            <form class="search-form">
                <input type="text" placeholder="<?php echo esc_html__('Search the docs...', 'zedocs'); ?>" name="search" class="form-control search-input">
                <button type="submit" class="btn search-btn" value="<?php echo esc_html__('Search', 'zedocs'); ?>">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
        <?php
        $args = array(
            'post_type'      => $type_posts,
            'posts_per_page' => -1,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
            'post_parent'    => 0,
        );
        $custom_posts = new WP_Query($args);
        ?>

        <nav id="docs-nav" class="docs-nav navbar">
            <ul class="section-items list-unstyled nav flex-column pb-3">
                <?php
                    if ($custom_posts->have_posts()) :
                        while ($custom_posts->have_posts()) : $custom_posts->the_post();
                            $post_id = get_the_ID(); ?>
                            <li class="nav-item section-title">
                                <a class="nav-link scrollto" href="#section-<?php echo $post_id; ?>"><?php the_title(); ?></a>
                                <?php
                                $args_sub = array(
                                    'post_type'      => $type_posts,
                                    'posts_per_page' => -1,
                                    'orderby'        => 'menu_order',
                                    'order'          => 'ASC',
                                    'post_parent'    => $post_id, 
                                );
                                $sub_posts = new WP_Query($args_sub);
                                if ($sub_posts->have_posts()) :
                                ?>
                                <ul class="nav flex-column mt-2 lvl2">
                                    <?php
                                        while ($sub_posts->have_posts()) : $sub_posts->the_post();
                                        ?>
                                    <li class="nav-item">
                                        <a class="nav-link scrollto"
                                            href="#sub-<?php echo get_the_ID(); ?>"><?php the_title(); ?></a>
                                    </li>
                                    <?php
                                        endwhile;
                                        ?>
                                </ul>
                                <?php
                                    wp_reset_postdata(); 
                                endif;
                                ?>
                            </li>
                            <?php
                        endwhile;
                        wp_reset_postdata(); 
                    endif;
                ?>
            </ul>
        </nav>
    </div>
    <div class="docs-content">
        <div class="container">
            <?php
                $args = array(
                    'post_type'      => $type_posts,
                    'posts_per_page' => -1,
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
                    'post_parent'    => 0,
                );
                $custom_posts = new WP_Query($args);
                if ($custom_posts->have_posts()) :
                    while ($custom_posts->have_posts()) : $custom_posts->the_post();
                        $post_id = get_the_ID(); ?>
                    <article class="docs-article" id="section-<?php echo $post_id; ?>">
                        <h2 class="docs-heading"><?php the_title(); ?></h2>
                        <?php 
                            $content_parent = get_the_content();
                            if ($content_parent) { ?>
                                <?php echo $content_parent; ?>
                            <?php } 
                            
                            $args_sub = array(
                                'post_type'      => $type_posts,
                                'posts_per_page' => -1,
                                'orderby'        => 'menu_order',
                                'order'          => 'ASC',
                                'post_parent'    => $post_id, 
                            );
                            $sub_posts = new WP_Query($args_sub);
                            if ($sub_posts->have_posts()) :
                                while ($sub_posts->have_posts()) : $sub_posts->the_post(); ?>
                                <section class="docs-section" id="sub-<?php echo get_the_ID(); ?>">
                                    <h3 class="section-heading"><?php the_title(); ?></h3>
                                    <?php 
                                        $content_child = get_the_content();
                                        if ($content_child) { ?>
                                            <?php the_content(); ?>
                                        <?php } ?>
                                </section>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata();
                            endif; ?>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata(); 
                endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>