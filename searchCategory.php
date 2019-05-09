<?php

function searchCategory(array $categories, $id)
{
	$title = 'not found';

	function recursiveSearch($category, $id, &$title) {
		if ($category['id'] == $id) {
			$title = $category['title'];
			return;
		}
		if (!isset($category['children'])) {
			return;
		}

		foreach($category['children'] as $children) {
		recursiveSearch($children, $id, $title);
		}
	}

	foreach ($categories as $category) {
		recursiveSearch($category, $id, $title);
	}

	return $title;
}
