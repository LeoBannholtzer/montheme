<?php
get_header();
?>
	<style>
		.header {
			background: url("<?php bloginfo('template_directory'); ?>/images/header.png ") no-repeat center/cover;
		}
		.rond_bleu {
			background: url("<?php bloginfo('template_directory'); ?>/images/rond_bleu_edit.png ") no-repeat center;
		}
	</style>

	<div class="header">
		<div class="container">
			<div class="row">
				<h2 class="animate__animated animate__zoomIn">
					CREATIVES
					<small>POWER BY PSDFREEBIES.COM</small>
				</h2>
				<div>
					<a href="#agency" class="chevron-header">
						<i class="fas fa-chevron-circle-down fa-3x hvr-grow"></i>
					</a>
				</div>
			</div>
		</div>
	</div>


	<div id="agency" class="agency-content">
		<div class="container">
			<div class="row text-center">
				<div class="col-xs-12 my-5">
					<h2>WE ARE AN AWESOME AGENCY</h2>
				</div>

				<div class="col-xs-12 col-sm-6 col-lg-3 text-center">
					<div class="rond_bleu"></div>
					<h3>feature one</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In imperdiet turpis a lorem elementum vehicula</p>
				</div>
				<div class="col-xs-12 col-sm-6 col-lg-3 text-center">
					<div class="rond_bleu"></div>
					<h3>feature two</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In imperdiet turpis a lorem elementum vehicula</p>
				</div>
				<div class="col-xs-12 col-sm-6 col-lg-3 text-center">
					<div class="rond_bleu"></div>
					<h3>feature three</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In imperdiet turpis a lorem elementum vehicula</p>
				</div>
				<div class="col-xs-12 col-sm-6 col-lg-3 text-center">
					<div class="rond_bleu"></div>
					<h3>feature four</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In imperdiet turpis a lorem elementum vehicula</p>
				</div>
			</div>
		</div>
	</div>

	<main id="primary" class="site-main container-fluid">
		<div class="row">
			<?php
				do_action('last_two_articles');
			?>
		</div>
	</main>

	<div class="article-content">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="row">
						<div class="col-sm-2 text-center">
							<br>
							<i class="far fa-edit fa-2x"></i>
						</div>
						<div class="col-sm-10">
							<p class="display-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In imperdiet turpis a lorem elementum vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In imperdiet turpis a lorem elementum vehicula.</p>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6">
				<div class="row">
						<div class="col-sm-2 text-center">
							<br>
							<i class="far fa-edit fa-2x"></i>
						</div>
						<div class="col-sm-10">
							<p class="display-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In imperdiet turpis a lorem elementum vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In imperdiet turpis a lorem elementum vehicula.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(window).resize(function() {
			if ($(window).width() > 576) {
				var height_img_article1 = $("#img_article1").height();
				$("#div_text_article1").height(height_img_article1);
				var height_img_article2 = $("#img_article2").height();
				$("#div_text_article2").height(height_img_article2);
			} else {
				$("#div_text_article1").height(height_img_article1);
				$("#div_text_article1").height(height_img_article1);
			}
		});
	</script>
<?php
	get_sidebar();
	get_footer();
?>