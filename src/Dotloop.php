<?php 
namespace Buonzz\Template;

require __DIR__ . '/vendor/autoload.php';

use \Curl\Curl;

class Dotloop {

   public $curl;

   function __construct() {
      $curl = new Curl();
   }

   public function getTodos(){
      $curl->get("https://jsonplaceholder.typicode.com/todos/");

      if ($curl->error) {
         if($curl->errorCode!=404)
         return json_encode(["status"=>$curl->errorCode, "message"=>$curl->errorMessage], JSON_PRETTY_PRINT);
         else
         return json_encode(["status"=>$curl->errorCode, "message"=>"No record found"], JSON_PRETTY_PRINT);
            
      } else {
         return json_encode([
            "status"=>200,
            "data"=>$curl->response
         ], JSON_PRETTY_PRINT);
      }
   }

   public function getTodo($i){
      
      $curl->get("https://jsonplaceholder.typicode.com/todos/$i");

      if ($curl->error) {
         if($curl->errorCode!=404)
         return json_encode(["status"=>$curl->errorCode, "message"=>$curl->errorMessage], JSON_PRETTY_PRINT);
         else
         return json_encode(["status"=>$curl->errorCode, "message"=>"No record found"], JSON_PRETTY_PRINT);
            
      } else {
         return json_encode([
            "status"=>200,
            "data"=>$curl->response
         ], JSON_PRETTY_PRINT);
      }
   }
}