<?php get_header(); ?>
	<main class="container">
		<div class="row g-5">
			<div class="col-md-8">

				<h3 class="pb-4 mb-4 fst-italic border-bottom"></h3>

				<article class="blog-post">
					<h2 class="blog-post-title"><?= the_title() ?></h2>
					<p class="blog-post-meta"><?= the_time('F j, Y').' '.__("by").' '; ?> <a href="<?= get_the_author_posts_link()?>"><?= get_the_author() ?> </a> | <?= get_the_category_list(', ');?></p>

					<?php
					if(has_post_thumbnail()) {
						echo the_post_thumbnail('medium_large').'<br/><br />';
					}
					?>

					<?= the_content(); ?>
				</article>

			</div>

			<?php get_sidebar(); ?>
		</div>

	</main>
<?php get_footer(); ?>