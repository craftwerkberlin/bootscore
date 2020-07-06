<?php
	/**
	 * Category Template: Sidebar Left
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package Bootscore
	 */
	
	get_header();
	?>


<div id="content" class="site-content container py-5 mt-5">
    <div id="primary" class="content-area">

        <div class="row">
            <?php get_sidebar(); ?>
            <div class="col order-first order-md-last">

                <main id="main" class="site-main">

                    <header class="page-header mb-4">
                        <div class="media">
                            <div class="mr-3">
                                <?php echo get_avatar( get_the_author_email(), '96' ); ?>
                            </div>
                            <div class="media-body">
                                <h1><?php the_author(); ?></h1>
                                <?php the_author_meta('description'); ?>
                            </div>
                        </div>
                    </header>

                    <!-- .page-header -->
                    <!-- Grid Layout -->
                    <?php if (have_posts() ) : ?>
                    <?php while (have_posts() ) : the_post(); ?>
                    <div class="card horizontal mb-4">
                        <div class="row">
                            <!-- Featured Image-->
                            <?php if (has_post_thumbnail() )
							echo '<div class="card-img-left-md col-lg-5">' . get_the_post_thumbnail(null, 'medium') . '</div>';
							?>
                            <div class="col">
                                <div class="card-body">
                                    <div class="mb-2">
                                        <!-- Category Badge -->
                                        <?php
										$thelist = '';
										$i = 0;
										foreach( get_the_category() as $category ) {
										    if ( 0 < $i ) $thelist .= ' ';
										    $thelist .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" class="badge badge-secondary">' . $category->name.'</a>';
										    $i++;
										}
										echo $thelist;
										?>
                                    </div>
                                    <!-- Title -->
                                    <h2 class="blog-post-title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                    <!-- Meta -->
                                    <?php if ( 'post' === get_post_type() ) : ?>
                                    <small class="text-muted mb-2">
                                        <?php
									bootscore_date();
									bootscore_author();
									bootscore_comments();
									bootscore_edit();
									?>
                                    </small>
                                    <?php endif; ?>
                                    <!-- Excerpt & Read more -->
                                    <div class="card-text mt-auto">
                                        <?php the_excerpt(); ?> <a class="read-more" href="<?php the_permalink(); ?>"><?php _e('Read more', 'bootscore'); ?></a>
                                    </div>
                                    <!-- Tags -->
                                    <?php bootscore_tags(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    <!-- Pagination -->
                    <div>
                        <?php 
						if (function_exists("bootscore_pagination"))
						{
						  	bootscore_pagination();
						}
						?>
                    </div>


                </main><!-- #main -->

            </div><!-- col -->
        </div><!-- row -->

    </div><!-- #primary -->
</div><!-- #content -->
<?php
get_footer();
