			</div>
		</div>
	</main>
	<footer class="footer">
		<div class="container">
			<?php echo str_replace(']]>', ']]>', apply_filters('the_content', get_option('footer_copy'))); ?>
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>