<?php

namespace Core\Database;

use PDO;
use PDOException;

class Database {
    private static ?PDO $pdo = null;

    private function __construct() {
        try {
            self::$pdo = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE,
                DB_USERNAME,
                DB_PASSWORD
            );

            // Define o modo de erro para exceções
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            // Encerra a execução e exibe mensagem de erro (ou loga, em produção)
            die("Erro de conexão com o banco de dados: " . $e->getMessage());
        }
    }

    public static function getInstance(): PDO {
        if (!isset(self::$pdo)) {
            new self();
        }

        return self::$pdo;
    }
}
