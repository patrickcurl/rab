<?php $t =& peTheme(); ?>
<?php $layout =& $t->layout; ?>

	<div class="footer <?php echo $layout->footerStyle  ?>">
		<?php if ($layout->footerStyle !== "small"): ?>
		<footer class="pe-container">
			<div class="row-fluid">
				<?php $t->footer->widgets(); ?>
			</div>			
		</footer>
		<?php endif; ?>
		<section class="foot-lower">
			<div class="pe-container">
				<div class="row-fluid ">
					<div class="span12">
						<div class="span6 copyright">
							<?php echo $t->options->get("footerCopyright"); ?>
						</div>
						
						<div class="span6">
							<?php echo $t->options->get("footerPowered"); ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

<?php $t->footer->wp_footer(); ?>

</body>
</html>