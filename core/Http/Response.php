<?php

namespace Core\Http;

class Response
{

    public const HTTP_OK = 200;
    public const HTTP_BAD_REQUEST = 400;
    public const HTTP_UNAUTHORIZED = 401;
    public const HTTP_FORBIDDEN = 403;
    public const HTTP_NOT_FOUND = 404;
    public const HTTP_INTERNAL_ERROR = 500;

    public static function json(array $data, int $status = 200)
    {
        header("Content-Type: application/json; charset=utf-8");
        $json = json_encode($data);

        if (json_last_error() !== JSON_ERROR_NONE) {
            http_response_code(self::HTTP_BAD_REQUEST);
            echo json_encode([
                "erro_code" => 500,
                "erro" => "Ocorreu um erro ao processar sua solicitação. Por favor, tente novamente mais tarde!",
                "created_at" => date("Y-m-d H:i:s"),
            ]);
            exit;
        }

        http_response_code($status);
        echo ($json);
    }
}