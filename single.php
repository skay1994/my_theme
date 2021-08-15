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

            <h3 class="pb-4 mb-4 fst-italic border-bottom"></h3>

			<nav class="blog-pagination" aria-label="Pagination">
                <?php
                $nextPost = '<a class="btn btn-outline-primary disabled" href="#" tabindex="-1" aria-disabled="true">'.__('Next Post').
                            '<span class="screen-reader-text">'.__( 'Next post') . '</span></a>';

                $prevPost = '<a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">'.__('Previous Post').
                            '<span class="screen-reader-text">'.__( 'Previous post') . '</span></a>';
                if($post = get_next_post()) {
	                $nextPost = '<a class="btn btn-outline-primary" href="'.get_permalink($post).'">'.__('Next Post').
	                            '<span class="screen-reader-text">'.__('Next Post') .': '. get_the_title().'</span></a>';
                }

                if($post = get_previous_post()) {
	                $prevPost = '<a class="btn btn-outline-secondary" href="'.get_permalink( $post ).'">'.__('Previous Post').
	                            '<span class="screen-reader-text">'.__('Previous Post') .': '. get_the_title().'</span></a>';
                }
                echo $nextPost, $prevPost;
                ?>
			</nav>

		</div>

		<?php get_sidebar(); ?>
	</div>

</main>

<?php get_footer(); ?>