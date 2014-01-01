<?php

	/*
		use curl_getinfo() to print out the cURL post
	*/

// set up curl to point to your requested URL
$ch = curl_init($data);
// tell curl to return the result content instead of outputting it
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

// execute the request, I'm assuming you don't care about the result content
curl_exec($ch);

if (curl_errno($ch)) {
    // this would be your first hint that something went wrong
    die('Couldn\'t send request: ' . curl_error($ch));
} else {
    // check the HTTP status code of the request
    $resultStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($resultStatus == 200) {
        // everything went better than expected
    } else {
        // the request did not complete as expected. common errors are 4xx
        // (not found, bad request, etc.) and 5xx (usually concerning
        // errors/exceptions in the remote script execution)

        die('Request failed: HTTP status code: ' . $resultStatus);
    }
}

curl_close($ch);

?>