<?php

namespace  App\Manager;

class ManagerConManager extends CurlApiRequest {

    public function prepareActionRequest($user, $raw , $formId) {
        echo "hello";
        var_dump($raw); die;

    }

}

?>