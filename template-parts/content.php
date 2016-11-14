<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @packageEphic
 */
$entry_img = wp_get_attachment_url(get_post_thumbnail_id(), 'full');
// Post Date format for date tile
// M m Y
$tile_date = esc_html(get_the_date('M'));
$tile_month = esc_html(get_the_date('m'));
$tile_year = esc_html(get_the_date('Y'));
$theme_resources = new ephic_theme_resources;
$meta = $theme_resources->ephic_meta($post, 'blog_meta'); // pass the post array and theme option to get

$author= sprintf( '<a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a>',
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					esc_attr( sprintf( __( 'View all posts by %s', 'ephic' ), get_the_author() ) ),
					get_the_author()
				);
$comments_link = get_comments_link();
$comments_text = __('Comments', 'ephic');
$comment_count = <<<EOT
					<div class="bl-comments">
						<i class="fa fa-comment-o"></i>
							$post->comment_count <a href="$comments_link">$comments_text</a>
						</div>
EOT;
?>
<div class="row">
	<div class="col-xs-12">
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'bl-entry' ); ?>>
		<?php
		if ( is_single() ) {
			if ($entry_img) { // if we have a featured image
				$img_url = $entry_img;
				$container_class = "blog-cont";
				echo '<img class="main-img img-responsive" src="' . $img_url . '" alt="" />';
			} else { // no featured image background fill
				$container_class = "no-feat-img";
			}
		?>
			<div class="<?php echo $container_class;?>">
				<div class="blog-post">
					<div class="bl-title">
						<div class="bl-comments"><?php ephic_tag_list();?></div>
						<div class="bl-auth"><span><?php echo get_the_date();?></span> <?php echo $author;?></div>
						<div class="clearfix"></div>
					</div>
					<div class="bl-excerpt upper40">

		<?php
		$content = apply_filters('the_content', get_the_content( sprintf(
		/* translators: %s: Name of current post. */
		wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'ephic' ),
			array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		) ) );
		echo $content;
		?>
					</div>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ephic' ),
			'after'  => '</div>',
		) );
		?>			
					<footer class="entry-footer">
						<?php ephic_entry_footer(); ?>
					</footer><!-- .entry-footer -->
				</div>
			</div> <!--.blog-cont-->

		<?php
		} else {  // blog roll
			$get_permalink = esc_url( get_permalink() );
			if ($entry_img) { // if we have a featured image
				$img_url = $entry_img;
				$container_class = "blog-cont";
				echo '<img class="main-img img-responsive" src="' . $img_url . '" alt="" />';
			} else { // no featured image background fill
				$container_class = "no-feat-img";
			}
		?>
			<div class="<?php echo $container_class;?>">
				<div class="blog-post">
					<p class="featured"><?php echo esc_html__('Featured', 'ephic');?></p>
					<div class="bl-title">
			<?php echo $comment_count; ?>
						<div class="bl-auth"><span><?php echo get_the_date();?></span> <?php echo $author;?></div>
						<div class="clearfix"></div>
			<?php the_title( '<h2 class="entry-title"><a href="'
							. $get_permalink . '" rel="bookmark">', '</a></h2>' ); ?>
					</div>
					<div class="bl-excerpt">

		<?php
		$content = apply_filters('the_content', get_the_content( sprintf(
        /* translators: %s: Name of current post. */
        wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'ephic' ),
            array( 'span' => array( 'class' => array() ) ) ),
            the_title( '<span class="screen-reader-text">"', '"</span>', false )
        ) ) );
		if (get_theme_mod('blog_summary') == 'summary') {
			$words = get_theme_mod('blog_summary_length');
			echo wp_trim_words($content, $words, '...');
		} else {
			echo $content;
			
			//the_content( sprintf(
			/* translators: %s: Name of current post. */
			/*
			wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'ephic' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
			*/
		}
		?>
					</div>
					<a class="readmore" href="<?php echo $get_permalink;?>"><?php echo esc_html__('Read more', 'ephic');?></a>
				</div>
			</div> <!--.blog-cont-->

		<?php
		}
		?>
		</article><!-- #post-## -->
	</div><!--.col-xs-12-->

	<div class="col-xs-12">
		<div class="blog-sep">
	<?php if (($wp_query->current_post +1) != ($wp_query->post_count)) {  // seperator for all but last ?>
			<hr />
	<?php } ?>
		</div>
	</div>
</div><!-- .row -->
