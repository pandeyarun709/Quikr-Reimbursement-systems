<?php

namespace App\Requests;


abstract class BaseRequest{

    /**
     * @return array
     */
    public function getAllProperties(): array {
        return get_object_vars($this);
    }

    /**
     * @return array
     */
    public function getAllPropertiesFilter(): array {
        return array_filter(get_object_vars($this));
    }
}


?>