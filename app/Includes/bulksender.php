<?php
namespace App\Includes;

function multiRequest($data, $options = array()) {
  // array of curl handles
  $curly = array();
  // data to be returned
  $result = array();
 
  // multi handle
  $mh = curl_multi_init();
 
  // loop through $data and create curl handles
  // then add them to the multi-handle
  foreach ($data as $id => $d) {
 
    $curly[$id] = curl_init();
 
    $url = (is_array($d) && !empty($d['url'])) ? $d['url'] : $d;
    curl_setopt($curly[$id], CURLOPT_URL,            $url);
    curl_setopt($curly[$id], CURLOPT_HEADER,         0);
    curl_setopt($curly[$id], CURLOPT_RETURNTRANSFER, 1);
 
    // post?
    if (is_array($d)) {
      if (!empty($d['post'])) {
        curl_setopt($curly[$id], CURLOPT_POST,       1);
        curl_setopt($curly[$id], CURLOPT_POSTFIELDS, $d['post']);
      }
    }
 
    // extra options?
    if (!empty($options)) {
      curl_setopt_array($curly[$id], $options);
    }
 
    curl_multi_add_handle($mh, $curly[$id]);
  }
 
  // execute the handles
  $running = null;
  do {
    curl_multi_exec($mh, $running);
  } while($running > 0);
 
 
  // get content and remove handles
  foreach($curly as $id => $c) {
    $result[$id] = curl_multi_getcontent($c);
    curl_multi_remove_handle($mh, $c);
  }
 
  // all done
  curl_multi_close($mh);
 
  return $result;
}

function sanitizeRecipient($recipient){
    $recipient = trim(preg_replace("/[\n]*/", '', $recipient));
    $recipients = preg_replace('/[^0-9]/', '', $recipients);
    $rlength = strlen($recipient);
    if($rlength>20){$recipient = "";}
    if($rlength<9){$recipient = "";}
    //Arrange Contact Correctly
    if(substr( $recipient, 0, 1 ) == "0" && substr( $recipient, 0, 3 ) != "009")
    {$recipient = "234".substr($recipient,1);}
    elseif(substr( $recipient, 0, 3 ) == "234"){$recipient = $recipient;}
    elseif(substr( $recipient, 0, 1 ) == "+"){$recipient = substr($recipient,1);}
    elseif(substr( $recipient, 0, 1 ) == " "){ $recipient = "";}
    elseif(substr( $recipient, 0, 1 ) == ""){ $recipient = "";}
    elseif(substr( $recipient, 0, 3 ) == "009"){$recipient= substr( $recipient, 3 );}
    elseif($rlength<7 || $rlength>18){$recipient = "";}
    else{$recipient = $recipient; }
    return $recipient;
}