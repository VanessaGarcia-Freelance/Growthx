<?php the_content(); ?>

 <article class="page-story">

     <div class="entry-content">
		<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
	</div>
</article>