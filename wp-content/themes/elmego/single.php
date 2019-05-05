<?php get_header();?>

<div class="container post-page">

<?php

if (have_posts()) {

	while (have_posts()) {

		the_post();
		?>
			<div class="main-post single-post">

				<?php edit_post_link('Edit <i class="fa fa-pencil"></i>');?>

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

				<?=the_post_thumbnail('thumbnail', ['class' => 'img-responsive img-thumbnail', 'title' => 'post title'])?>

				<div class="post-content"><?=the_content()?></div>

				<hr>

				<p class="post-categories">
					<i class="fa fa-tags fa-fw"></i>
					<?=the_category(', ')?>

				</p>

				<p class="post-tags">


					<?php
if (has_tag()) {

			the_tags();

		} else {
			echo "Tags: \nThere Are No Tags";

		}
		?>

				</p>

			</div>

<?php

	}

}
echo "<div class='clearfix'></div>";
?>

<div class="author-area">


<div class="row">
	<div class="col-md-2">

<?php
$avatar_args = [
	'class' => 'img-responsive img-thumbnail center-block',
];

echo get_avatar(get_the_author_meta('ID'), 100, '', 'User Avatar', $avatar_args);
?>

	</div>

	<div class="col-md-10 author-info">

	<h4>
		<?php the_author_meta('first_name');?>
		<?php the_author_meta('last_name');?>
		( <span class="nickname"> <?php the_author_meta('nickname');?> </span>)
	</h4>

	<?php if (get_the_author_meta('description')) {?>

	<p><?php the_author_meta('description')?> </p>

	<?php } else {
	echo "There Is No Biographi";
}
?>

		</div>

	</div>

<hr>

<p class="author-stats">
	User Post Count <span class="posts-count"> <?=count_user_posts(get_the_author_meta('ID'));?> </span>
	User Profile Link <?=the_author_posts_link();?>
</p>

<?php

echo "<hr class='comment-separator'>";

echo "<div class='post-pagination'>";
if (get_previous_post_link()) {

	previous_post_link('%link', '<i class="fa fa-chevron-left fa-lg"></i> %title');

} else {

	echo "<span class='previous'> None </span>";

}

if (get_next_post_link()) {

	next_post_link('%link', '%title <i class="fa fa-chevron-right fa-lg"></i> ');

} else {

	echo "<span class='next'> None </span>";

}

echo "</div>";

echo "<hr class='comment-separator'>";

comments_template();

?>

</div>

<?php get_footer()?>