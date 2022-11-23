<?php
$the_locale = get_locale();

$responsible_link_fi = get_field('responsible_link_fi', 'option');
$policy_link_fi = get_field('policy_link_fi', 'option');

$responsible_link_sv = get_field('responsible_link_sv', 'option');
$policy_link_sv = get_field('policy_link_sv', 'option');

$responsible_link_en = get_field('responsible_link_en', 'option');
$policy_link_en = get_field('policy_link_en', 'option');

$responsible_link_de = get_field('responsible_link_de', 'option');
$policy_link_de = get_field('policy_link_de', 'option');

$responsible_link_dk = get_field('responsible_link_dk', 'option');
$policy_link_dk = get_field('policy_link_dk', 'option');

$responsible_link_no = get_field('responsible_link_no', 'option');
$policy_link_no = get_field('policy_link_no', 'option');

$img = get_stylesheet_directory_uri() . "/assets/css/images/18.png";
if ( $the_locale == "sv_SE" ) :
    echo "<son-beam responsible-link=\"{$responsible_link_sv}\" bonus-policy-link=\"{$policy_link_sv}\">
    </son-beam>";
elseif ( $the_locale == "fi" ):
    echo "<son-beam responsible-link=\"{$responsible_link_fi}\" bonus-policy-link=\"{$policy_link_fi}\">
    </son-beam>";
elseif ( $the_locale == "no" ):
    echo "<son-beam responsible-link=\"{$responsible_link_no}\" bonus-policy-link=\"{$policy_link_no}\">
    </son-beam>";
elseif ( $the_locale == "da_DK" ):
    echo "<son-beam responsible-link=\"{$responsible_link_dk}\" bonus-policy-link=\"{$policy_link_dk}\">
    </son-beam>";
elseif ( $the_locale == "de_DE" ):
    echo "<son-beam responsible-link=\"{$responsible_link_de}\" bonus-policy-link=\"{$policy_link_de}\">
    </son-beam>";
else: // English
    echo "<son-beam responsible-link=\"{$responsible_link_en}\" bonus-policy-link=\"{$policy_link_en}\">
    </son-beam>";
endif;
?>
