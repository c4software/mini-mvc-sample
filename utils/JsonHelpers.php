<?php

namespace utils;

class JsonHelpers
{
    static function stringify($data){
        header("content-type: application/json");
        header("Access-Control-Allow-Origin: *");

        return json_encode($data);
    }
}