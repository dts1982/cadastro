<?php

// Constantes que contém as credenciais de acesso ao banco mysql
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'admin');
define('DB_NAME', 'teste');

//Apresenta a exibição de erros

//init_set('display_errors', true);
//error_reporting(E_ALL);

date_default_timezone_set('America/Sao_Paulo');

//Inclui o arquivo de funções

require_once 'functions.php';

