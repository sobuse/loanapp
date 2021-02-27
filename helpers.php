<?php

function extractPostValue($key) {
	$value = strip_tags(trim($_POST[$key]));
	return $value;
}

?>