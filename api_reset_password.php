<?php

$newPass = "P@SS-OH-".rand(1, 99999);
$user = $utilisateur;

?>
<?php 

$server_ip = 'srv02.dedigo.fr';

function CpanelRequest($query,$ip=false) {
    /**
     *   Change These!!!!
     */
    $whm_user = 'wmeesdgu';
    $whm_passwd = 'gds5vg1d5fg185df1g581df85g1df';
    
    if($ip){
        $query = 'https://'.$ip.':2087'.$query;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $header[0] = "Authorization: Basic " . base64_encode($whm_user. ":" . $whm_passwd) . "\n\r";
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_URL, $query);
        $result = curl_exec($curl);
        if ($result == false) {
            error_log("curl_exec threw error \"" . curl_error($curl) . "\" for $query");
        }
        curl_close($curl);
        $result = json_encode($result,1);
        return $result;
    } else {
        return false;
    }
}
$qry = '/json-api/passwd?api.version=1&user='.$user.'&password='.$newPass.'&enabledigest=0';

?> 
<?php

    $result =  CpanelRequest($qry,$server_ip);



if($result){



$test = $result;

$parsed_json = json_decode($test, JSON_UNESCAPED_SLASHES);

//$parsed_json;

}

?>