<?php

//Faz a conexão com o banco de dados Mysql

function db_connect(){
    $PDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);

    return $PDO;
}

//Faz a conversão entre datas

function dateConvert($date){
    if( !strstr($date, '/'))
    {
        //converte formato (yyyy-mm-dd) para (dd-mm-yyyy)

        sscanf($date, '%d-%d-%d', $y, $m, $d);
        return sprintf('%04d-%02d-%02d', $y, $m, $d);
    }

    return false;
}

