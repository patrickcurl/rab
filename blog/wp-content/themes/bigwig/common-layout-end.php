<?php $t =& peTheme(); ?>
<?php $layout =& $t->layout; ?>

<?php if ($layout->fullscreen === "yes"): // fullscreen ?>
</div><!-- pe-full-page -->
<?php else: // not fullscreen ?>
<?php if ($layout->content != "fullwidth"): // boxed ?>
<?php if ($layout->sidebar === "right"): // sidebar ?>
</section>
<?php get_sidebar(); ?>
</div><!-- row-fluid -->
<?php endif; // end sidebar ?>
<?php endif; // end boxed ?>
</div><!-- pe-container -->
<?php endif; // end not fullscreen ?>

</div><!-- side-body -->

<?php if ($layout->fullscreen !== "yes" && $layout->footerMargin !== "no"): ?>
<div class="pe-spacer size100"></div>
<?php endif; ?>
