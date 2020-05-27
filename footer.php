<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->
    <?php get_template_part( 'footer-widget' ); ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="row">
	            <div class="col-6">
	                &copy; <?php echo date('Y'); ?> <?php echo '<a href="'.home_url().'">'.get_bloginfo('name').'</a>'; ?>

	            </div><!-- close .site-info -->
	            <div class="col-6">
					<div class="sociallinks pull-right">
					<a target="_blank" title="Facebook" href=""><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
					<a target="_blank" title="Instagram" href=""><i class="fab fa-instagram" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>

<script>

function openNav() {
	if( document.getElementById("logo").style.color == "white" ){
		closeNav();
	}else{
	    document.getElementById("myNav").style.width = "100%";
	    document.getElementById("logo").style.color = "white";
	    setTimeout(function() {
	    	document.getElementById("logoimage").src=document.getElementById("logoimage").src.replace('_r', '_w');
		}, 100 );
	}
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
    document.getElementById("logo").style.color = "#DC143C";
    setTimeout(function() {
    	document.getElementById("logoimage").src=document.getElementById("logoimage").src.replace('_w', '_r');
	}, 300 );
}

document.addEventListener( 'wpcf7mailsent', function( event ) {
    location.reload();
}, false );


</script>


<!-- Matomo -->
<script type="text/javascript">
  var _paq = window._paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//piwik.sofasurfer.org/";
    _paq.push(['setTrackerUrl', u+'matomo.php']);
    _paq.push(['setSiteId', '39']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Matomo Code -->


</body>
</html>
