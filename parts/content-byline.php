<?php if (is_home() || is_single()) { ?>
<p class="byline">
	<span class="post_time" itemprop="dateCreated">Posted on <?php the_time('F j, Y') ?></span> <span class="post_author" itemprop="author">by <?php the_author(); ?></span>
</p>
<?php } ?>