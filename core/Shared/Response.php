<?php
namespace Core\Shared;
// jsonapi.org format standar

class Response{
    private $data;
    private $status;
    private $message;
    private $errors;
    private $meta;
    private $links;
    private $included;
    private $jsonapi;
    private $headers;
    private $httpCode;

    // eliminar clase si existia
    public function __construct(
        $data = null, 
        $status = null, 
        string $message = null, 
        $errors = null, 
        $meta = null, 
        $links = null, 
        $included = null, 
        $jsonapi = null, 
        $headers = null, 
        $httpCode = null
    ) {
        $this->data = $data;
        $this->status = $status;
        $this->message = $message;
        $this->errors = $errors;
        $this->meta = $meta;
        $this->links = $links;
        $this->included = $included;
        $this->jsonapi = $jsonapi;
        $this->headers = $headers;
        $this->httpCode = $httpCode;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function __isset($name) {
        return isset($this->$name);
    }

    public function __unset($name) {
        unset($this->$name);
    }

    public function __toString() {
        return json_encode($this->toArray());
    }

    public function toArray() {
        // convertir todos los atributos de esta clase en un array
        $array = get_object_vars($this);
        // eliminar atributos que no son necesarios
        unset($array['headers']);
        unset($array['httpCode']);
        // eliminar atributos que son null
        foreach ($array as $key => $value) {
            if ($value === null) {
                unset($array[$key]);
            }
        }
        return $array;
    }
}