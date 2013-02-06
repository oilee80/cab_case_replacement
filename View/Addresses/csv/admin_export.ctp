<?php
	$data = array();

	foreach($addresses As $address) {
		$data[] = array(
			$address['Address']['address_line_1'],
			$address['Address']['address_line_2'],
			$address['Address']['address_line_3'],
			$address['Address']['address_line_4'],
			strtoupper($address['Address']['post_code'])
		);
	}

	$h = fopen('php://output', 'w');
	foreach($data As $line) {
		fputcsv($h, $line);
	}
	fclose($h);
?>