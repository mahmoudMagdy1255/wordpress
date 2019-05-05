<?php get_header();?>


	<div class="container author-page">
		<h1 class="text-center profile-header"> <?php the_author_meta('nickname')?> Page </h1>

		<div class="author-main-info">

			<div class="row">


				<div class="col-md-3">

					<?php
$avatar_args = [
	'class' => 'img-responsive img-thumbnail center-block',
];

echo get_avatar(get_the_author_meta('ID'), 196, '', 'User Avatar', $avatar_args);
?>


				</div>

				<div class="col-md-9">

					<ul class="author-names list-unstyled">
						<li> <span>First Name: <?php the_author_meta('first_name');?> </span> </li>
						<li> <span>Last Name: <?php the_author_meta('last_name');?> </span> </li>
						<li> <span>Nickname: <?php the_author_meta('nickname');?> </span> </li>

					</ul>

					<hr>

					<?php if (get_the_author_meta('description')) {?>

							<p><?php the_author_meta('description')?> </p>

						<?php } else {
	echo "There Is No Biographi";
}
?>

				</div>

			</div>

		</div>

		<div class="row author-stats">
			<div class="col-md-3">
				<div class="stats">
					Post Count
					<span><?php echo count_user_posts(get_the_author_meta('ID')); ?></span>
				</div>

			</div>

			<div class="col-md-3">
				<div class="stats">
					Comments Count
					<span><?php
$comments_count_args = [

	'user_id' => get_the_author_meta('ID'),
	'count' => true,

];
echo get_comments($comments_count_args)?></span>
				</div>
			</div>

			<div class="col-md-3">
				<div class="stats">
					Post Count
					<span><?php echo count_user_posts(get_the_author_meta('ID')); ?></span>
				</div>
			</div>

			<div class="col-md-3">
				<div class="stats">
					Post Count
					<span><?php echo count_user_posts(get_the_author_meta('ID')); ?></span>
				</div>
			</div>
		</div>

<div class="row">

<?php

$author_posts_per_page = 6;

$author_posts_args = [

	'author' => get_the_author_meta('ID'),
	'posts_per_page' => $author_posts_per_page,

];

$author_posts = new WP_Query($author_posts_args);

if ($author_posts->have_posts()) {
	?>

<h3 class="author-posts-title">

	<?php if (count_user_posts(get_the_author_meta('ID')) >= $author_posts_per_page) {

		echo "Latest [" . $author_posts_per_page . "] Posts Of " . the_author_meta('nickname');
	} else {

		echo "Latest Posts Of " . the_author_meta('nickname');
	}
	?>

</h3>




<?php

	while ($author_posts->have_posts()) {

		$author_posts->the_post();
		?>

	<div class="author-posts">
		<div class="col-sm-3">
			<?=the_post_thumbnail('thumbnail', ['class' => 'img-responsive img-thumbnail', 'title' => 'post title'])?>

		</div>

		<div class="col-sm-9">


				<?php ?>

				<h3 class="post-title">

					<a href="<?=the_permalink()?>">
						<?=the_title()?>
					</a>

				</h3>

				<span class="post-date">
					<i class="fa fa-calendar fa-fw"></i> <?=the_time('F j, Y')?>
				</span>

				<span class="post-comments">
					<i class="fa fa-comments fa-fw"></i>
					<?=comments_popup_link('0 Comments', 'One Comments', '% Comments', 'comment-url', 'Comments Disabled')?>
				</span>


				<div class="post-content"><?=the_excerpt()?></div>
		</div>
	</div>

	<div class="clearfix"></div>

<?php

	}

}

wp_reset_postdata();

$comments_per_page = 6;

$comments_args = [

	'user_id' => get_the_author_meta('ID'),
	'status' => 'approve',
	'number' => $comments_per_page,
	'post_status' => 'publish',
	'post_type' => 'post',

];

$comments = get_comments($comments_args);

if ($comments) {

	?>

	<h3 class="author-comments-title">

	<?php if (get_comments($comments_count_args) >= $comments_per_page) {

		echo " Latest [" . $comments_per_page . "] Comments Of ";

		the_author_meta('nickname');
	} else {

		echo " Latest Comments Of ";
		the_author_meta('nickname');
	}
	?>

</h3>

<?php
foreach ($comments as $comment) {

		?>


		<div class="author-comments">


				<?php ?>

				<h3 class="post-title">

					<a href="<?=the_permalink($comment->comment_post_ID)?>">
						<?=get_the_title($comment->comment_post_ID)?>
					</a>

				</h3>

				<span class="post-date">
					<i class="fa fa-calendar fa-fw"></i> <?=the_time('F j, Y')?>
				</span>

				<span class="post-comments">
					<i class="fa fa-comments fa-fw"></i>
					<?="Added on " . mysql2date("l, F j, Y", $comment->comment_date);?>
				</span>


				<div class="post-content"><?=$comment->comment_content?></div>
	</div>


<?php
}

} else {
	echo "No Comments Found";
}

?>
</div>
	</div>


<br>
<br>
<br>
<br>

<?php get_footer();?>