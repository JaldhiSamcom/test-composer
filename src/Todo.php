<?php

namespace Buonzz\Template;

require __DIR__ . '../vendor/autoload.php';

use \Curl\Curl;

class Todo
{

    public $curl;

    /**
     * Todo constructor.
     */
    function __construct()
    {
        try {
            $this->curl = new Curl();
        } catch (\ErrorException $e) {
        }
    }

    /**
     * Todo get list of todos
     * @return false|string
     */
    public function getTodos()
    {

        try {
            $this->curl->get("https://jsonplaceholder.typicode.com/todos/");

            if ($this->curl->error) {
                if ($this->curl->errorCode != 404)
                    return json_encode(["status" => $this->curl->errorCode, "message" => $this->curl->errorMessage, "data" => []], JSON_PRETTY_PRINT);
                else
                    return json_encode(["status" => $this->curl->errorCode, "message" => "No record found", "data" => []], JSON_PRETTY_PRINT);

            } else {
                return json_encode([
                    "status" => 200,
                    "data" => $this->curl->response
                ], JSON_PRETTY_PRINT);
            }
        } catch (\Exception $exception) {
            return json_encode([
                "status" => 500,
                "message" => $exception->getMessage(),
                "data" => []
            ], JSON_PRETTY_PRINT);
        }


    }

    /**
     * Todo get particular todo detail
     * @param $i
     * @return false|string
     */
    public function getTodo($i)
    {

        try {
            $this->curl->get("https://jsonplaceholder.typicode.com/todos/$i");

            if ($this->curl->error) {
                if ($this->curl->errorCode != 404)
                    return json_encode(["status" => $this->curl->errorCode, "message" => $this->curl->errorMessage, "data" => []], JSON_PRETTY_PRINT);
                else
                    return json_encode(["status" => $this->curl->errorCode, "message" => "No record found", "data" => []], JSON_PRETTY_PRINT);

            } else {
                return json_encode([
                    "status" => 200,
                    "data" => $this->curl->response
                ], JSON_PRETTY_PRINT);
            }
        } catch (\Exception $exception) {
            return json_encode([
                "status" => 500,
                "message" => $exception->getMessage(),
                "data" => []
            ], JSON_PRETTY_PRINT);
        }


    }
}