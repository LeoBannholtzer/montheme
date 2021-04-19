	<style>
		.footer {
			background: url("<?php bloginfo('template_directory'); ?>/images/footer.png ") no-repeat center/cover;
		}
	</style>
	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 my-5">
					<h2>WE'D LOVE TO HEAR ABOUT YOUR PROJECT</h2>
				</div>

				<div class="form_contact">
					<?php echo do_shortcode( '[contact-form-7 id="15" title="Contact form 1"]' ); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>
