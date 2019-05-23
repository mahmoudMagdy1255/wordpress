<?php

$cats = get_the_category();

?>

<div class="breadcrumb-holder">
	<div class="container">

		<ol class="breadcrumb">

			<li>
				<a href="<?=get_home_url()?>"><?=get_bloginfo('name');?></a>
			</li>


			<li>
				<a href="<?=esc_url(get_category_link($cats[0]->term_id));?>">

					<?=esc_html($cats[0]->name)?>

				</a>
			</li>


			<li class="active">
				<a href="">
					<?=the_title();?>

				</a>
			</li>

		</ol>

	</div>
</div>