<?php
function polylang_add_xdefault( $hreflangs ) {
	$default = array(
		'x-default' => reset( $hreflangs ) // Fetch the first language URL in the list as x-default
	);

	return $hreflangs = $default + $hreflangs;
}
