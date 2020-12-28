<?php
//$pdo = new PDO('mysql:host=localhost;dbname=eledonta_raldb;charset=utf8', 'eledonta_raldb', 'ral3@1996$$');
$pdo = new PDO('mysql:host=localhost;dbname=raldb;charset=utf8', 'raldb_user', 'ral3@1996$$');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);