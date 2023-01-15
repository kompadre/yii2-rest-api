<?php
		$ch = curl_init('https://api.stackexchange.com/2.3/questions?order=desc&sort=activity&site=stackoverflow');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// include the response headers in the output
		curl_setopt($ch, CURLOPT_HTTPHEADER, [
'Accept-Language: ca,en-US;q=0.9,en;q=0.8,es;q=0.7',
'Cache-Control: no-cache',
'Connection: keep-alive',
'Pragma: no-cache',
'Upgrade-Insecure-Requests: 1',
'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36',
		]);
		$data = curl_exec($ch);
		echo gzdecode($data);

