<?php

$comments_args = [

	'status' => 'approve',

];

$comments_count = 0;

$all_comments = get_comments($comments_args);

foreach ($all_comments as $comment) {

	$post_id = $comment->comment_post_ID;

	if (!in_category('web', $post_id)) {

		continue;

	}

	$comments_count++;

}

$cat = get_queried_object();
$posts_count = $cat->count;

?>

<div class="sidebar-web">

	<div class="widget">

		<h3 class="widget-title"><?=single_cat_title();?> Statistics</h3>

		<div class="widget-content">
			<ul>
				<li>
					<span>Comments Count</span>: <?=$comments_count?>
				</li>

				<li>
					<span>Articles Count</span>: <?=$posts_count?>
				</li>

			</ul>
		</div>

	</div>

	<div class="widget">

		<h3 class="widget-title">Latest PHP Posts</h3>

		<div class="widget-content">

			<ul>
				<?php

$posts_args = [

	'posts_per_page' => 3,
	'cat' => 3,

];

$query = new WP_Query($posts_args);

if ($query->have_posts()) {

	while ($query->have_posts()) {

		$query->the_post();?>

		<li>

			<a target="_blank" href="<?=the_permalink()?>" > <?=the_title()?> </a>

		<li>
<?php
}
	wp_reset_postdata();
}

?>
			</ul>

		</div>

	</div>

	<div class="widget">

		<h3 class="widget-title">Hot Post By Comment</h3>

		<div class="widget-content">

		<div class="widget-content">

			<ul>
				<?php

$hostpost_args = [

	'posts_per_page' => 1,
	'orderby' => 'comment_count',

];

$hotquery = new WP_Query($hostpost_args);

if ($hotquery->have_posts()) {

	while ($hotquery->have_posts()) {

		$hotquery->the_post();?>

		<li>
			<a target="_blank" href="<?=the_permalink()?>" > <?=the_title()?> </a>
			<hr>

			<?=comments_popup_link('0 Comments', 'One Comments', '% Comments', 'comment-url', 'Comments Disabled')?>

		<li>


<?php
}
	wp_reset_postdata();
}

?>
			</ul>

		</div>
		</div>

	</div>

</div>