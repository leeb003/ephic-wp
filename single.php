<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @packageEphic
 */
get_header();
$sidebar_pos = get_theme_mod('blog_sidebar');
$main_class = 'col-md-8 col-lg-9';
$sidebar_class = '';
$no_sidebar = false;
if ($sidebar_pos == 'left') {
    $main_class .= ' pull-right';
    $sidebar_class = 'left-sidebar';
} elseif ($sidebar_pos == 'nosidebar') {
    $main_class = 'col-sm-12';
    $no_sidebar = true;
}
?>
    <section id="top-section" class="top-section">
        <div class="blog-header">
            <div class="blog-header-inner">
                <h1><?php echo get_the_title(); ?></h1>
            </div>
            <div class="blog-header-overlay">
            </div>
        </div>
    </section>

    <!-- Blog -->
    <section class="blog-section">
        <div class="page-banner">
            <div class="page-banner-inner"><a href="<?php echo esc_url(home_url('/'));?>"><?php echo esc_html__('HOME', 'ephic');?></a>
                <span class="sep">&nbsp;&nbsp;/&nbsp;&nbsp;</span>
                <?php echo esc_html(get_theme_mod('blog_breadcrumb', ''))?>
            </div>
        </div>

        <div class="container container-large upper100">
            <div class="row">
                <!-- Main Blog -->
                <div class="col-xs-12 col-sm-12 <?php echo $main_class;?>">
                    <div class="blog-content">

        <?php
        if ( have_posts() ) :

            /* Start the Loop */
            while ( have_posts() ) : the_post();
                do_action('before_post_header');
                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part( 'template-parts/content', get_post_format() );
                do_action('after_post_excerpt');

				// If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

                the_post_navigation();

            endwhile;

        else :

            get_template_part( 'template-parts/content', 'none' );

        endif; ?>
                    </div><!--.blog-content-->
                </div><!-- .col-lg-9 -->

		<?php if (!$no_sidebar) { // if sidebar is set to left or right ?>
                <!-- Blog Sidebar -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                    <div class="blog-sidebar <?php echo $sidebar_class; ?>">
                        <?php get_sidebar(); ?>
                    </div>
                </div> <!-- \sidebar -->
		<?php } ?>
            </div><!-- .row -->
        </div><!-- .container -->
    </section>
<?php
get_footer();
