<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen, projection">
	<link href='http://fonts.googleapis.com/css?family=Source+Code+Pro:300,600' rel='stylesheet' type='text/css'>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS feed" href="http://feeds.feedburner.com/samglover">
</head>

<title>
<?php /* Title tags */
	if ( is_front_page() || is_home() ) { bloginfo('name'); }
	elseif ( is_single() || is_page() ) { the_title(); }
	elseif ( is_author() ) { global $wp_query; $author_name = get_the_author_meta('display_name',$author); echo $author_name; }
	elseif ( is_category() ) { single_cat_title(); }
	elseif ( is_tag() ) { single_tag_title(); }
  elseif ( is_404() ) { echo '404: Not Found'; }
?>
</title>

<meta charset="utf-8" />

<meta name="viewport" content="width=device-width,initial-scale=1.0">

<body <?php body_class($class); ?>>

	<div id="header">

		<?php if ( is_front_page() ) { ?>
			<h1 id="title"><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<?php } else { ?>
			<p id="title"><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></p>
		<?php } ?>

		<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'link_before' => '/', 'after' => '&nbsp;' ) ); ?>

	</div>


	<div id="content">

		<?php /* THE LOOP */

		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div <?php post_class(); ?>>

				<?php if ( has_post_thumbnail() ) { the_post_thumbnail('thumbnail'); } ?>

				<?php if ( is_single() || is_page() ) { ?>
					<h1 class="headline"><?php the_title(); ?></h1>
				<?php } else { ?>
					<h2 class="headline"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>, posted on <?php the_time('F jS, Y'); ?>"><?php the_title(); ?></a></h2>
				<?php } ?>

				<?php if ( !is_page() ) { ?>
					<div class="comment_link">
						<a href="<?php comments_link(); ?>" rel="nofollow"><?php echo '# '; comments_number('leave a comment','1 comment','% comments'); ?></a>
					</div><!--end .comment_link-->
				<?php } ?>

				<div class="post_body">
					<?php the_content('read more //&#45;&#45;>'); ?>
					<?php wp_link_pages(); ?>
				</div><!--end .post_body-->

			</div><!--end post-->

			<?php if ( is_single() ) { comments_template(); } ?>

		<?php endwhile; endif;

		/* END LOOP */ ?>

	</div><!--end #content-->


	<div id="pagenav">
		<?php if ( is_single() ) { ?>
				<?php next_post_link('%link','<p>next post: "%title"</p>',0);
				previous_post_link('%link','<p>previous post: "%title"</p>',0); ?>
		<?php } elseif ( !is_page() ) { ?>
				<?php previous_posts_link('<p><&#45;&#45;// newer posts</p>',0);
				next_posts_link('<p>older posts //&#45;&#45;></p>',0); ?>
		<?php } ?>
	</div><!--end #pagenav-->


	<div id="footer">

		<p class="license">The original content in this website is licensed <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY-NC-SA 4.0</a>.</p>

    <p class="right remove_bottom"><small>
    	<a href="http://feedburner.google.com/fb/a/mailverify?uri=samglover&amp;loc=en_US" title="Get posts by email">Email</a>
		/ <a href="http://feeds.feedburner.com/samglover" title="Subscribe with RSS">RSS</a>
    </small></p>

	</div>

</body>
</html>
