<?php
/*
Template Name: Contact Page
Template Post Type: post, page, event
*/

get_header(); 
?>
<section class="section-sm">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="title-bordered mb-5 d-flex align-items-center">
					<h1 class="h4">Talk To Me Anytime :)</h1>
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
			</div>
			<div class="col-md-6">
				<div class="content mb-5">
					<h1 id="ask-us-anything-br-or-just-say-hi">Ask Us Anything <br> Or just Say Hi,</h1>
					<p>Rather than just filling out a form, Sleeknote also offers help to the user
						<br>with links directing them to find additional information or take popular actions.</p>
					<h4 class="mt-5">Hate Forms? Write Us Email</h4>
					<p><i class="ti-email mr-2 text-primary"></i><a href="mailto:georgia.young@example.com">georgia.young@example.com</a>
					</p>
				</div>
			</div>
			<div class="col-md-6">
				<form method="POST" action="#">
					<div class="form-group">
						<label for="name">Your Name (Required)</label>
						<input type="text" name="name" id="name" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="email">Your Email Address (Required)</label>
						<input type="email" name="email" id="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="message">Your Message Here</label>
						<textarea name="message" id="message" class="form-control"></textarea>
					</div>
					<button type="submit" class="btn btn-primary">Send Now</button>
				</form>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();
?>