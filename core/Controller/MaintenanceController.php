<?php

namespace Core\Controller;

use Core\Database\Database;
use Core\Http\Response;
use Core\Template\Template;

use Exception;
use PDO;

class MaintenanceController
{
    public function index(): void
    {

        try {
            $db = Database::getInstance();

            $valor = "com.bug.livre.oficial";

            $sql = "SELECT status, package FROM maintenance WHERE package = :package";

            $result = $db->prepare($sql);

            $result->bindParam(":package", $valor, PDO::PARAM_STR);
            $result->execute();


            Response::json($result->fetchAll(PDO::FETCH_ASSOC)); 

        } catch (Exception $exception) {
            Response::json([
                "error" => $exception->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }

    }

    public function creat() {
        Template::render("admin/maintenance.html");
    }
}