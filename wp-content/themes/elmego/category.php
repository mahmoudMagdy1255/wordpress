<?php get_header();?>

<div class="container home-page">

	<div class="row">

		<div class="category-information text-center ">

			<div class="col-md-4">

				<h1 class="category-title"><?php single_cat_title();?></h1>

			</div>


			<div class="col-md-4">
				<p class="category-description"><?=category_description();?></p>
			</div>


			<div class="col-md-4">

				<div class="cat-stats">
					<span>Articles Count: 20</span>
					<span>Comments Count: 100</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
<?php

if (have_posts()) {

	while (have_posts()) {

		the_post();
		?>

		<div class="col-sm-6">

			<div class="main-post">

				<?php ?>

				<h3 class="post-title">

					<a href="<?=the_permalink()?>">
						<?=the_title()?>
					</a>

				</h3>

				<span class="post-author">
					<i class="fa fa-user fa-fw"></i><?=the_author_posts_link()?>
				</span>

				<span class="post-date">
					<i class="fa fa-calendar fa-fw"></i> <?=the_time('F j, Y')?>
				</span>

				<span class="post-comments">
					<i class="fa fa-comments fa-fw"></i>
					<?=comments_popup_link('0 Comments', 'One Comments', '% Comments', 'comment-url', 'Comments Disabled')?>
				</span>

				<?=the_post_thumbnail('thumbnail', ['class' => 'img-responsive img-thumbnail', 'title' => 'post title'])?>

				<div class="post-content"><?=the_excerpt()?></div>

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
		</div>

<?php

	}

}
echo "<div class='clearfix'></div>";
/*
echo "<div class='post-pagination'>";
if (get_previous_posts_link()) {

previous_posts_link("<i class='fa fa-chevron-left fa-lg'></i> Newest Articles");

} else {

echo "<span class='previous'> Previous </span>";

}

if (get_next_posts_link()) {

next_posts_link("Oldest Articles <i class='fa fa-chevron-right fa-lg'></i>");

} else {

echo "<span class='next'> Next </span>";

}

echo "</div>";
 */

echo "<div class='pagination-numbers'>";

echo numbering_pagination();

echo "</div>";

?>

	</div>
</div>


<?php get_footer()?>