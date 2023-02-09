<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header(); 
?>

<?php

$category = get_the_category();
$current_category = $category[0];
$parent_category = $current_category->category_parent;

?>

<section class="section">
    <div class="container">

        <h2 class="h2 mb-3"><?php echo $current_category->cat_name; ?></h2>
        <div class="row">
            <div class="col-lg-8  mb-5 mb-lg-0">
                <?php while(have_posts()){  
                    the_post();
                    $postid= get_the_ID();
                    ?>

                <article class="row mb-5">

                    <?php if(has_post_thumbnail()){ ?>
                    <div class="col-12">
                        <div class="post-slider">
                            <?php  the_post_thumbnail('full', array( 'class' => 'img-fluid',"alt"=>'post-thumb' )); ?>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="col-12 mx-auto">
                        <h3><a class="post-title" href="post-elements.html"><?php the_title(); ?></a></h3>
                        <ul class="list-inline post-meta mb-4">
                            <li class="list-inline-item"><i class="ti-user mr-2"></i>
                                <a href="author.html"><?php the_author(); ?></a>
                            </li>
                            <li class="list-inline-item">Date : <?php echo get_the_date(); ?> </li>
                            <?php $categories= get_the_category($postid); 
                             if(!empty($categories)){?>
                            <li class="list-inline-item">Categories :
                                <?php foreach($categories as $category) { ?>
                                <a href="#!" class="ml-1"><?php echo($category->cat_name) ?>, </a>
                                <?php } ?>
                            </li>
                            <?php } ?>
                            <?php $tags=get_the_tags($postid); 
                                if(!empty($tags)){?>
                            <li class="list-inline-item">Tags :
                                <?php foreach($tags as $tag) { ?>
                                <a href="" class="ml-1"><?php echo($tag->name) ?>, </a>
                                <?php } ?>
                            </li>
                            <?php } ?>
                        </ul>
                        <p><?php
                            $article_data = substr(get_the_content(), 0, 300);
                            echo $article_data .'....';
                            // $content = the_content();
                            // // $trimmed_content = wp_trim_words($content, 40, '...&lt;a href="' . get_permalink() . '">more&lt;/a>');
                            // echo $content;
                            ?></p>
                        <a href="<?php echo get_permalink($postid); ?>" class="btn btn-outline-primary">Continue
                            Reading</a>
                    </div>
                </article>
                <?php } ?>
                <?php wp_pagenavi(); ?>                           
            </div>
            <aside class="col-lg-4">
                <!-- Search -->
                <div class="widget">
                    <h5 class="widget-title"><span>Search</span></h5>
                    <form action="/logbook-hugo/search" class="widget-search">
                        <input id="search-query" name="s" type="search" placeholder="Type &amp; Hit Enter...">
                        <button type="submit"><i class="ti-search"></i>
                        </button>
                    </form>
                </div>
                <!-- categories -->
                <div class="widget">
                    <h5 class="widget-title"><span>Categories</span></h5>
                    <ul class="list-unstyled widget-list">
                        <?php 
                        $categories = get_categories();
                        // print_r($categories);
                        foreach($categories as $category) {
                        echo '
                        <li><a href="'. get_category_link($category->term_id) .'" class="d-flex">' . $category->name . '<small class="ml-auto">(' . $category->count . ')</small></a>
                        </li>';
                        }
                    ?>
                    </ul>
                </div>
                <!-- tags -->
                <div class="widget">
                    <h5 class="widget-title"><span>Tags</span></h5>
                    <ul class="list-inline widget-list-inline">
                        <li class="list-inline-item"><a href="#!">Booth</a>
                        </li>
                        <li class="list-inline-item"><a href="#!">City</a>
                        </li>
                        <li class="list-inline-item"><a href="#!">Image</a>
                        </li>
                        <li class="list-inline-item"><a href="#!">New</a>
                        </li>
                        <li class="list-inline-item"><a href="#!">Photo</a>
                        </li>
                        <li class="list-inline-item"><a href="#!">Seasone</a>
                        </li>
                        <li class="list-inline-item"><a href="#!">Video</a>
                        </li>
                    </ul>
                </div>
                <!-- latest post -->
                <div class="widget">
                    <h5 class="widget-title"><span>Latest Article</span></h5>
                    <!-- post-item -->
                    <ul class="list-unstyled widget-list">
                        <li class="media widget-post align-items-center">
                            <a href="post-elements.html">
                                <img loading="lazy" class="mr-3"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/post/post-6.jpg">
                            </a>
                            <div class="media-body">
                                <h5 class="h6 mb-0"><a href="post-elements.html">Elements That You Can Use To Create A
                                        New Post On
                                        This Template.</a></h5>
                                <small>March 15, 2020</small>
                            </div>
                        </li>
                    </ul>
                    <ul class="list-unstyled widget-list">
                        <li class="media widget-post align-items-center">
                            <a href="post-details-1.html">
                                <img loading="lazy" class="mr-3"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/post/post-1.jpg">
                            </a>
                            <div class="media-body">
                                <h5 class="h6 mb-0"><a href="post-details-1.html">Cheerful Loving Couple Bakers Drinking
                                        Coffee</a>
                                </h5>
                                <small>March 14, 2020</small>
                            </div>
                        </li>
                    </ul>
                    <ul class="list-unstyled widget-list">
                        <li class="media widget-post align-items-center">
                            <a href="post-details-2.html">
                                <img loading="lazy" class="mr-3"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/post/post-2.jpg">
                            </a>
                            <div class="media-body">
                                <h5 class="h6 mb-0"><a href="post-details-2.html">Cheerful Loving Couple Bakers Drinking
                                        Coffee</a>
                                </h5>
                                <small>March 14, 2020</small>
                            </div>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>
<?php
get_footer();
?>