<?php

namespace App\Services;

class make_json {
    public function get_json(){
        $array = array(
            "type"=> env("type"),
            "project_id"=> env("project_id"),
            "private_key_id"=> env("private_key_id"),
            "private_key"=> env("private_key"),
            "client_email"=> env("client_email"),
            "client_id"=> env("client_id"),
            "auth_uri"=> env("auth_uri"),
            "token_uri"=> env( "token_uri"),
            "auth_provider_x509_cert_url"=> env("auth_provider_x509_cert_url"),
            "client_x509_cert_url"=> env("client_x509_cert_url"),
        );
    // 連想配列($array)をJSONに変換(エンコード)する
    $json = json_encode( $array );
    return $json;
    }
}
