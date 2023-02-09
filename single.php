<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>
<?php if (have_posts()) {
	 while (have_posts()) {
	  the_post();
	  $postid=get_the_ID();
	  ?>

<section class="section">
	<div class="container">
		<article class="row mb-4">
			<div class="col-lg-10 mx-auto mb-4">
				<h1 class="h2 mb-3"><?php the_title(); ?></h1>
				<ul class="list-inline post-meta mb-3">
					<li class="list-inline-item"><i class="ti-user mr-2"></i><a
							href="author.html"><?php the_author(); ?></a>
					</li>
					<li class="list-inline-item">Date : <?php echo get_the_date(); ?></li>
					<?php $categories= get_the_category($postid); 
                             if(!empty($categories)){?>
					<li class="list-inline-item">Categories :
						<?php foreach($categories as $category) { ?>
						<a href="#!" class="ml-1"><?php echo($category->name) ?>, </a>
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
			</div>

			<?php if(has_post_thumbnail()){ ?>
			<div class="col-12 mb-3">
				<div class="post-slider">
					<?php  the_post_thumbnail('full', array( 'class' => 'img-fluid',"alt"=>'post-thumb' )); ?>
				</div>
			</div>
			<?php } ?>
			<div class="col-lg-10 mx-auto">
				<div class="content">
					<p><?php the_content(); ?></p>
				</div>
			</div>
		</article>
	</div>
</section>


<?php } } ?>

<?php
get_footer();