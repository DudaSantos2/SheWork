<?php
require_once "../../DAO/ServiceDao.php";

$serviceDao = new ServiceDao();

$result = $serviceDao->all();

echo json_encode(["status" => true, "dados" => $result]);
