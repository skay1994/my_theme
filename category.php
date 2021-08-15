<?php get_header(); ?>

	<main class="container">

        <h3 class="pb-4 mb-4 fst-italic border-bottom"></h3>
        <h3>Show all itens for <?= single_cat_title() ?> category</h3>
        <br />

		<div class="row g-5">
			<div class="col-md-8">

				<div class="row g-5">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							?>
							<div class="col-md-6">
								<div class="g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
									<div class="col p-4 d-flex flex-column position-static">
										<strong class="d-inline-block mb-2 text-success"><?= get_the_category()[0]->name ?? ''?></strong>

										<h3 class="mb-0"><?= the_title() ?></h3>
										<div class="mb-1 text-muted"><?php the_time('F j, Y'); ?></div>
										<?= the_excerpt(); ?>
										<a href="<?= the_permalink(); ?>" class="stretched-link">Continue reading</a>
									</div>
									<div class="col-auto d-none d-lg-block">
										<?php
										if(!has_post_thumbnail()){
											?>
											<svg class="bd-placeholder-img" width="420" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
												<title><?= the_title() ?></title>
												<rect width="100%" height="100%" fill="#55595c"></rect>
												<text x="40%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
											</svg>
											<?php
										} else {
											echo the_post_thumbnail([400, 0]);;
										}
										?>

									</div>
								</div>
							</div>
						<?php
						endwhile;
					else:
						_e( 'Sorry, no posts matched your criteria.', 'textdomain' );
					endif;
					?>
				</div>

			</div>

			<?php get_sidebar(); ?>
		</div>

	</main>

<?php
get_footer();