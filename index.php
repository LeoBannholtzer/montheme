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
				<h2>
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

				function example_callback() {
					$args = array(
						'post_status' => array('publish'),
						'posts_per_page' => 2,
						'orderby' => 'date',
						'order' => 'DESC',
					);
					$query = new WP_Query($args);
					$posts = $query->posts;
					$i = 0;

					function get_string_between($string, $start, $end){
						$string = ' ' . $string;
						$ini = strpos($string, $start);
						if ($ini == 0) return '';
						$ini += strlen($start);
						$len = strpos($string, $end, $ini) - $ini;
						return substr($string, $ini, $len);
					}

					foreach ($posts as $post) {
						if ($i == 0) {
							?>
								<!-- PARTIE 1 -->
								<div class="col-sm-6 bg-dark text-white py-5">
									<div class="col-sm-8 offset-sm-4">
										<?php
											$date = DateTime::createFromFormat('Y-m-d H:i:s', $post->post_date);
											$mois = $date->format('M');
											$jour = $date->format('d');
											$annee = $date->format('Y');
											echo "<p class='text-muted'>".$mois." ".$jour.", ".$annee." | In Culture</p>";

											$link = get_site_url()."/";
											$link .= $annee."/".$date->format('m')."/".$jour."/".$post->post_name;
										?>
										<h4 class="text-uppercase"><a class="btn btn-outline-light" href="<?php echo $link ?>"><?php echo $post->post_title ?></a></h4>
										<p class="text-muted" style="font-size:10px;"><?php $content = get_string_between($post->post_content, '<!-- wp:paragraph -->', '<!-- /wp:paragraph -->'); $content = strlen($content) > 100 ? substr($content,0,100)."..." : $content ;echo $content; ?></p>
									</div>
								</div>
								<div class="col-sm-6" style="padding-left: 0px !important;padding-right: 0px !important;">
									<?php
										$doc = new DOMDocument();
										libxml_use_internal_errors(true);
										$doc->loadHTML($post->post_content);
										$xpath = new DOMXPath($doc);
										$imgs = $xpath->query("//img");
										$src = null;
										for ($i=0; $i < $imgs->length; $i++) {
											$img = $imgs->item($i);
											$src = $img->getAttribute("src");
										}
										if ($src != null) {
											echo "<img src='".$src."'>";
										}
									?>
								</div>
							<?php
						} else {
							?>
								<!-- PARTIE 2 -->
								<div class="col-sm-6" style="padding-left: 0px !important;padding-right: 0px !important;">
									<?php
										$doc = new DOMDocument();
										libxml_use_internal_errors(true);
										$doc->loadHTML($post->post_content);
										$xpath = new DOMXPath($doc);
										$imgs = $xpath->query("//img");
										$src = null;
										for ($i=0; $i < $imgs->length; $i++) {
											$img = $imgs->item($i);
											$src = $img->getAttribute("src");
										}
										if ($src != null) {
											echo "<img src='".$src."'>";
										}
									?>
								</div>
								<div class="col-sm-6 py-5">
									<div class="col-sm-8 offset-sm-4">
										<?php
											$date = DateTime::createFromFormat('Y-m-d H:i:s', $post->post_date);
											$mois = $date->format('M');
											$jour = $date->format('j');
											$annee = $date->format('Y');
											echo "<p class='text-muted'>".$mois." ".$jour.", ".$annee." | In Culture</p>";

											$link = get_site_url()."/";
											$link .= $annee."/".$date->format('m')."/".$jour."/".$post->post_name;
										?>
										<h4 class="text-uppercase"><a class="btn btn-outline-dark" href="<?php echo $link ?>"><?php echo $post->post_title ?></a></h4>
										<p class="text-muted" style="font-size:10px;"><?php $content = get_string_between($post->post_content, '<!-- wp:paragraph -->', '<!-- /wp:paragraph -->'); $content = strlen($content) > 100 ? substr($content,0,100)."..." : $content ;echo $content; ?></p>
									</div>
								</div>
							<?php
						}
						$i++;
					}


					/*
					get_template_part('view/last-two-articles', 'posts', array(
						'query' => $query,
					));
					*/
				}
				add_action( 'example_action', 'example_callback', 10);
				do_action('example_action');


				/*
				if ( have_posts() ) :
					if ( is_home() && ! is_front_page() ) :
						?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
						<?php
					endif;

					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', get_post_type() );
					endwhile;
					the_posts_navigation();
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
				*/
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
<?php
	get_sidebar();
	get_footer();
?>