<?php
/*
 * Template Name: Project Portfolio
 */

get_header(); ?>

<?php

$query = get_queried_object();
// DEBUG
foreach( $query as $key => $value ) {
	echo $key . ' => ' . $value;
	echo '<br />';

}

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<!-- Call to Action Section
			============================================== -->
			<section id="conclusion" class="hero">
					<div class="hero-bg hero-dark">
						<div class="hero-container">
							<div class="hero-content">
								<div class="subsection section-body">
									<h2 class="section-title display-4">all projects page</h2>

									<p>Aliquam purus sit amet luctus venenatis. Tincidunt nunc pulvinar sapien et. Nulla aliquet porttitor lacus luctus accumsan. Tellus rutrum tellus pellentesque eu tincidunt tortor aliquam nulla. Gravida dictum fusce ut placerat orci nulla pellentesque dignissim enim. Suspendisse potenti nullam ac tortor vitae purus. Venenatis a condimentum vitae sapien.</p>
								</div>

								<div class="subsection section-footer">
								</div>
							</div>
						</div>
					</div>
			</section> <!-- /#conclusion -->

			<section class="featurette">
				<div class="subsection section-header">
					<h2 class="section-header display-flex-2">OUR GROWING PORTFOLIO</h2>
				</div>

				<div class="subsection section-body">

<?php
$terms = get_terms( array(
	'taxonomy'		=> 'cpt_clients',
	'hide_empty'	=> true
) );


$toggle = 0;
foreach( $terms as $term ) :
	// DEBUG
	// foreach( $term as $key => $value ) {
	// 	echo $key . ' => ' . $value;
	// 	echo '<br />';
  //
	// }
	if( $term->count ) :
		$featurette_title_id = preg_replace( '/(\s+)/i', '', $term->name );
		$featurette_title_pretty = preg_replace( '/(\s+)/i', '<br />', $term->name );

		$align_2 = $toggle ? 'left' : 'right';
		$align_1 = $toggle ? 'right' : 'left';
		$align_short_1 = $toggle ? 'r' : 'l';
		$align_short_2 = $toggle ? 'l' : 'r';
		$order_2 = $toggle ? 1 : 2;
		$order_1 = $toggle ? 2 : 1;
?>

						<style id="<?php echo $featurette_title_id; ?>" media="screen">

							<?php echo '#' . $featurette_title_id; ?>Bg {
								width: auto;
								height: 100%;
									min-height: initial;
								margin: 1em 2em;
								border-radius: 25px;
								background-image: url( <?php echo get_field( 'img', $term ); ?> );
								box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
							}

							<?php echo '#' . $featurette_title_id; ?>Overlay {
								width: auto;
								height: 100%;
								border-radius: 25px;
								padding: 3em 0;
								background-color: rgba(0, 0, 0, 0.6);
							}

							@media screen and ( min-width: 768px ) {
								<?php echo '#' . $featurette_title_id; ?>Description {
									padding-<?php echo $align_2 ?>: 10vw;
								}
							}

							@media screen and ( min-width: 1200px ) {
								<?php echo '#' . $featurette_title_id; ?>Description {
									padding-<?php echo $align_2 ?>: 22.5vw;
								}
							}
						</style>

						<!-- Hero Section
						============================================== -->
						<div id="<?php echo $featurette_title_id; ?>Bg" class="hero hero-sm">
							<div id="<?php echo $featurette_title_id; ?>Overlay" class="hero-bg">
								<div id="<?php echo $featurette_title_id; ?>" class="hero-container">
									<div class="hero-content">
										<div class="row align-items-center justify-content-center">
											<div class="col-12 col-md-5 order-<?php echo $order_1; ?>">
												<div class="subsection subsection-md-<?php echo $align_2; ?>">
													<h2 class="display-flex-2 display-bold text-md-<?php echo $align_2; ?>"><?php echo $featurette_title_pretty ?></h2>
													<a href="/projects/<?php echo $term->slug ?>">
														<div class="btn-wrapper-expand-<?php echo $align_1?>">
															<button type="button" class="btn btn-ghost btn-md-expand-<?php echo $align_2; ?> mx-2" name="button">
																SEE OUR WORK
															</button>
														</div>
													</a>
												</div>
											</div>
											<div class="col-12 col-md-7 order-<?php echo $order_2; ?> mobile-hide">
												<div id="<?php echo $featurette_title_id; ?>Description" class="subsection subsection-md-<?php echo $align_1; ?> ">
													<?php echo $term->description ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> <!-- /#hero -->

<?php
			$toggle = $toggle ? 0 : 1;
		endif;
	endforeach;
?>

			</div>
			<div id="footer-breakpoint"></div>
			</section>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
