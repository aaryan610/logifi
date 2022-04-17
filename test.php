<?php
    // $ch = curl_init();

    // $url = "https://reqres.in/api/users?page=2";

    // curl_setopt($ch, CURLOPT_URL, $url);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // $resp = curl_exec($ch);

    // if($e = curl_error($ch)) {
    //     echo $e;
    // } else {
    //     $decoded = json_decode($resp);
    //     print_r($decoded);
    // }

    $url = "https://www.ulip.dpiit.gov.in/ulip/v1.0.0/user/login";

    $data_array = array(
        "username" => "Garud_usr",
        "password" => "Trans@07042022"
    );

    // $data = http_build_query($data_array);
    $data = json_encode($data_array);

    // echo $data;

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);

    if($e = curl_error($ch)) {
        echo $e;
    } else {
        $decoded = json_decode($resp);
        foreach($decoded as $key => $val) {
            echo $key . ": " . $val . "<br />";
        }
    }

    curl_close($ch);
?>