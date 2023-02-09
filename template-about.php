<?php
/*
Template Name: About Page
Template Post Type: post, page, event
*/

get_header(); 
?>
<section class="section-sm">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="title-bordered mb-5 d-flex align-items-center">
					<h1 class="h4">About Us</h1>
					<ul class="list-inline social-icons ml-auto mr-3 d-none d-sm-block">
						<li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a>
						</li>
						<li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a>
						</li>
						<li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a>
						</li>
						<li class="list-inline-item"><a href="#"><i class="ti-github"></i></a>
						</li>
					</ul>
				</div>
				<?php if(has_post_thumbnail()){
					the_post_thumbnail('full', array( 'class' => 'img-fluid w-100 mb-4 rounded-lg',"alt"=>'author' ));
					} else { ?>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/author-full.jpg" class="img-fluid w-100 mb-4 rounded-lg" alt="author">
				<?php } ?>
				
				<div class="content">
					<?php echo get_the_content(); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();
?>