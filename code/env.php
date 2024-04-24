<?php

const DBNAME = "shopee_limited";
const DBUSER = "root";
const DBPASS = "";
const DBHOST = "127.0.0.1";
const DBCHARSET = "utf8";

const BASE_URL = "http://localhost:81/FPL_Shopee_Limited(phone,laptop)/test/";

function route($url)
{
    return BASE_URL . $url;
}

function flash($key, $msg, $route)
{
    $_SESSION[$key] = $msg;
    switch ($key) {
        case 'success':
            unset($_SESSION['errors']);
            break;
        case 'errors':
            unset($_SESSION['success']);
            break;
    }
    header('location:' . BASE_URL . $route . '?msg=' . $key);
    die;
}