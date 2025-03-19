<?php

class M2A
{
    public $result;

    public function __construct($request)
    {

        $url = "https://data.mulhouse-alsace.fr/api/explore/v2.1";

        $url .= $request;

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1
        ]);

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            $error_message = curl_error($curl);
            curl_close($curl);
            throw new Exception("Erreur cURL : " . $error_message);
        }

        $this->result = json_decode($response);

        curl_close($curl);
    }
}
