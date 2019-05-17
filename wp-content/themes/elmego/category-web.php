<?php get_header();?>

<div class="container home-page web-category">

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
					<span>This Is Special Layouts</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>

		<div class="col-md-9">
<?php

if (have_posts()) {

	while (have_posts()) {

		the_post();
		?>

			<div class="main-post">

				<div class="row">

					<div class="col-md-6">
						<?=the_post_thumbnail('', ['class' => 'img-responsive img-thumbnail', 'title' => 'post title'])?>

					</div>

					<div class="col-md-6">

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


						<div class="post-content"><?=the_excerpt()?></div>

					</div>

				</div>




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
?>

</div>


<div class="col-md-3">

<div class="linux-sidebar">
	<?php
if (is_active_sidebar('main-sidebar')) {
	//dynamic_sidebar('main-sidebar');
	get_sidebar('web');
}

?>
</div>

</div>



<div class='clearfix'></div>


<div class='pagination-numbers'>

<?=numbering_pagination();?>

	</div>


	</div>
</div>


<?php get_footer()?>