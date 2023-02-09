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
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8  mb-5 mb-lg-0">

                <?php 
                $search='';
                if($_GET['search']!=''){
                    $search=$_GET['search'];
                }
                $wpnew=array(
                    'post_status' => 'publish',
                    's' =>  $search
                );

                while(have_posts()){  
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
                    <form method="GET" class="widget-search">
                        <input id="search-query" name="s" type="search" placeholder="Type &amp; Hit Enter...">
                        <input type="hidden" value="movies" name="post_type" />
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
                    <?php 
                        $terms = get_terms([
                            'taxonomy' => 'Movietypes',
                            'hide_empty' => false,
                        ]);
                        // print_r($terms);
                        foreach($terms as $term) {
                        echo '
                        <li><a href="'. get_category_link($term->term_id) .'" class="d-flex">' . $term->name . '<small class="ml-auto">(' . $term->count . ')</small></a>
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

                    <?php 
                        // the query
                        $the_query = new WP_Query( array(
                            'posts_per_page' => 3,
                        )); 
                        ?>

                    <?php if ( $the_query->have_posts() ) : ?>
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post();   $postid1= get_the_ID();?>
                    <ul class="list-unstyled widget-list">
                        <li class="media widget-post align-items-center">
                        <?php if(has_post_thumbnail()){ ?>
                            <a href="<?php echo get_permalink($postid1); ?>">
                               <?php  the_post_thumbnail('shop_thumbnail', array( 'class' => 'mr-3',"alt"=>'post-thumb' )); ?>
                            </a>
                        <?php } ?>                        
                            <div class="media-body">
                                <h5 class="h6 mb-0"><a href="<?php echo get_permalink($postid1); ?>"> <?php the_title(); ?></a></h5>
                                <small><?php echo get_the_date(); ?></small>
                            </div>
                        </li>
                    </ul>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>

                    <?php else : ?>
                    <p><?php __('No News'); ?></p>
                    <?php endif; ?>

                    <!-- post-item -->
                 
                </div>
            </aside>
        </div>
    </div>
</section>
<?php
get_footer();
?>