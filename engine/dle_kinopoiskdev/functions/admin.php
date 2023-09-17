<?php

if ( !defined( 'DATALIFEENGINE' ) OR !defined( 'LOGGED_IN' )) {
	die( 'Hacking attempt!' );
}

function showRow( $title = "", $description = "", $field = "", $class = "" ) {

	if ( $class ) { $class = " class=\"{$class}\""; }

	echo "<tr{$class}>
	<td class=\"col-xs-6 col-sm-6 col-md-7\"><h6 class=\"media-heading text-semibold\">{$title}</h6><span class=\"text-muted text-size-small hidden-xs\">{$description}</span></td>
	<td class=\"col-xs-6 col-sm-6 col-md-5\">{$field}</td>
    </tr>";
}

function showInput( $data ) {

    $input_element = '';
	$input_element .= $data[3] ? " placeholder=\"{$data[3]}\"" : '';
	$input_element .= $data[4] ? ' disabled' : '';

	if ( $data[1] == 'range' ) {

		$class = ' custom-range';
		$input_element .= $data[5] ? " step=\"{$data[5]}\"" : '';
		$input_element .= $data[6] ? " min=\"{$data[6]}\"" : '';
		$input_element .= $data[7] ? " max=\"{$data[7]}\"" : '';

	} elseif ( $data[1] == 'number' ) {

		$class = ' w-9';
		$input_element .= isset($data[5]) ? " min=\"{$data[5]}\"" : '';
		$input_element .= $data[6] ? " max=\"{$data[6]}\"" : '';
	}

	return <<<HTML
	<input type="{$data[1]}" autocomplete="off" style="float: right;" value="{$data[2]}" class="form-control{$class}" name="{$data[0]}"{$input_element}>
	HTML;
}

?>