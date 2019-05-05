<?php

if (comments_open()) {

	$comments_args = [
		'max_depth' => 3,
		'type' => 'comment',
		'avatar_size' => 64,
	];

	?>
	<h3 class="comments-count"> <?php comments_number('0 Comments', '1 Comment', '% Comments')?> </h3>

<?php
echo "<ul class='list-unstyles comments-list'>";
	wp_list_comments($comments_args);
	echo "</ul>";

	echo "<hr class='comment-separator'>";

	$commentform_arguments = [

		'title_reply' => 'Add Your Comment',
		'title_reply_to' => 'Add a reply to [%s]',
		'class_submit' => 'btn btn-primary  btn-md',
		'comment_notes_before' => '',

	];

	comment_form($commentform_arguments);

} else {
	echo "Comments disabled";
}