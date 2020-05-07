<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ev_theme
 */

?>

</main>

    <footer class="container-fluid">
        <div class="row">
            <div class="col-4 col-md-1 site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 117 63"><defs/><path fill-rule="evenodd" d="M23.573 57.204l6.995 4.006L27.444 63l-3.871-2.215v-3.58zm0-8.948l14.81 8.48-3.127 1.79-11.683-6.69v-3.58zm-4.82-16.145V58.02l-3.125-1.79V33.902l3.126-1.79zm4.82 7.196l22.623 12.955-3.126 1.79-19.497-11.165v-3.58zM10.94 36.585v16.96l-3.126-1.79v-13.38l3.126-1.79zm43.95 7.123v3.58l-3.87 2.217-3.126-1.79 6.997-4.007zM3.127 41.06v8.01L0 47.28v-4.432l3.126-1.788zm51.763-6.301v3.579l-11.683 6.69-3.126-1.788 14.81-8.481zM90.001 18v4.248h-14.21v6.671h12.893v4.249H75.79v7.584H91V45H71V18h19.001zm8.565.085l5.505 18.12c.4 1.345.878 3.402.878 3.56l1.036-3.56 5.665-18.12h4.947l-8.776 26.903h-5.864L93.54 18.085h5.026zM54.89 25.812v3.58L35.393 40.555l-3.127-1.79L54.89 25.812zM19.5 22.582l3.127 1.79L.005 37.327v-3.58L19.5 22.583zM36.141 5.12l3.125 1.788v22.33l-3.126 1.789V5.12zM11.687 18.11l3.126 1.79-14.81 8.48v-3.58l11.684-6.69zm32.266-8.515l3.126 1.79v13.38l-3.126 1.789V9.594zm-32.13-.508L31.32 20.252v3.58L8.698 10.875l3.126-1.79zm39.944 4.982l3.126 1.79v4.431l-3.126 1.79v-8.011zm-47.894-.433L7 15.423.004 19.43v-3.58l3.87-2.215zm15.764-9.023l11.683 6.69v3.58l-14.81-8.48 3.127-1.79zM27.452.138l3.869 2.217v3.579l-6.995-4.005L27.452.14z"/></svg>
                    </a>
            </div>
            <div class="col-md-2 offset-md-2">
			<?php wp_nav_menu( array(
				'name'  => 'secondary',
				'menu' => 'secondary',
				'container' => '',
				'menu_class' => 'secondary-nav',
			) ); ?>
            </div>
            <div class="col-md-2">
				<?php the_field('text_column_1', 'option'); ?>
            </div>
            <div class="col-md-2">
				<?php the_field('text_column_2', 'option'); ?>
            </div>
            <div class="col-md-2">
				<?php the_field('text_column_3', 'option'); ?>
            </div>
        </div>
        <div class="page-footer row">
            <div class="col-md-3 offset-3">
                <p>© EV Private Equity 2020. All Rights Reserved.</p>
            </div>
            <div class="col-md-4 offset-1">
				<?php the_field('register', 'option'); ?>
            </div>
        </div>
    </footer>   



<?php wp_footer(); ?>

</body>
</html>
