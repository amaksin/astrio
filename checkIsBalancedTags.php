<?php

function checkIsBalancedTags(array $tagList)
{
	$stack = [];
	foreach ($tagList as $tag) {
		if (substr_count($tag, '/') == 0) {	//if opening tag
			array_push($stack, $tag);
		} else {							//if closing tag
			if (count($stack) == 0) {
				return false;
			}
			$openTag = array_pop($stack);
			if ($openTag !== substr_replace($tag, '', 1, 1)) {
				return false;
			}
		}
	}

	return (count($stack) == 0);
}

