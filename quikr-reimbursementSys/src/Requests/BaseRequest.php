<?php

namespace App\Requests;


abstract class BaseRequest{

    /**
     * @return array
     */
    public function getAllProperties(): array {
        return get_object_vars($this);
    }
}


?>