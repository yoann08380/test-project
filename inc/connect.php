<?php
    $dsn = 'mysql:host=localhost;dbname=shop;charset=utf8';
    $pdo = new \PDO($dsn, 'root', '1234');
    $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);