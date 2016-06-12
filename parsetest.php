<?php
	$curl_connection = curl_init('http://localhost/login.php');
	curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl_connection, CURLOPT_FOLLOWLOCATION, 1);
	$post_data['username'] = 'admin';
	$post_data['submit'] = 'Submit';
	$post_data['password'] = '59rCu';
	foreach ( $post_data as $key => $value) {
		$post_items[] = $key . '=' . $value;
	}
	$post_string = implode ('&', $post_items);
	curl_setopt($curl_connection, CURLOPT_POSTFIELDS, $post_string);
	$result = curl_exec($curl_connection);
	curl_close($curl_connection);
	$answer = false;
	if (strpos($result,'<img') !== false) {
		$answer = true;
	}
	if ($answer) {
		die("It Worked!");
	} else {
		print "bad pw";
	}
?>