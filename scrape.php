<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.google.com/search?tbm=map&authuser=0&hl=en&gl=us&pb=!4m12!1m3!1d129315.5159015119!2d-74.11976397304606!3d40.69766374874431!2m3!1f0!2f0!3f0!3m2!1i1920!2i513!4f13.1!7i20!8i20!10b1!12m8!1m1!18b1!2m3!5m1!6e2!20e3!10b1!16b1!19m4!2m3!1i360!2i120!4i8!20m57!2m2!1i203!2i100!3m2!2i4!5b1!6m6!1m2!1i86!2i86!1m2!1i408!2i240!7m42!1m3!1e1!2b0!3e3!1m3!1e2!2b1!3e2!1m3!1e2!2b0!3e3!1m3!1e3!2b0!3e3!1m3!1e8!2b0!3e3!1m3!1e3!2b1!3e2!1m3!1e9!2b1!3e2!1m3!1e10!2b0!3e3!1m3!1e10!2b1!3e2!1m3!1e10!2b0!3e4!2b1!4b1!9b0!22m6!1sMgqqXsfiDJfRtAaowr5A%253A1!2s1i%253A0%252Ct%253A11886%252Cp%253AMgqqXsfiDJfRtAaowr5A%253A1!7e81!12e5!17sMgqqXsfiDJfRtAaowr5A%253A57!18e15!24m48!1m12!13m6!2b1!3b1!4b1!6i1!8b1!9b1!18m4!3b1!4b1!5b1!6b1!2b1!5m5!2b1!3b1!5b1!6b1!7b1!10m1!8e3!14m1!3b1!17b1!20m2!1e3!1e6!24b1!25b1!26b1!30m1!2b1!36b1!43b1!52b1!54m1!1b1!55b1!56m2!1b1!3b1!65m5!3m4!1m3!1m2!1i224!2i298!26m4!2m3!1i80!2i92!4i8!30m28!1m6!1m2!1i0!2i0!2m2!1i458!2i513!1m6!1m2!1i1870!2i0!2m2!1i1920!2i513!1m6!1m2!1i0!2i0!2m2!1i1920!2i20!1m6!1m2!1i0!2i493!2m2!1i1920!2i513!34m13!2b1!3b1!4b1!6b1!8m3!1b1!3b1!4b1!9b1!12b1!14b1!20b1!23b1!37m1!1e81!42b1!47m0!49m1!3b1!50m4!2e2!3m2!1b1!3b0!65m0&q=resturants",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET"
));

$response = curl_exec($curl);

curl_close($curl);

$response = substr($response,4,-1);
$response = str_replace("null,",'"",',$response);
$data = json_decode($response,1);
$arr = [];
if(isset($data[0][1])) {
	foreach($data[0][1] as $single) {
		if(isset($single[14])) {
			$restaurant = $single[14];
			$temparr = [];
					if(isset($restaurant[11]))
			$temparr['name'] = $restaurant[11];
					if(isset($restaurant[18]))
			$temparr['location'] = $restaurant[18];
			if(isset($restaurant[178][0][0]))
			$temparr['phone'] = $restaurant[178][0][0];
			$arr[] = $temparr;
		}
	}

}
var_dump($arr);
