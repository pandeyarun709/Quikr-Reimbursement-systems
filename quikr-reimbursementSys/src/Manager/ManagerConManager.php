<?php

namespace  App\Manager;

use App\Requests\RejectApprovedStatusRequest;

class ManagerConManager extends CurlApiRequest {

    public function managerAction($user, $raw , $formId,$empId) {

        $status = false;

        if(sizeof($raw) > 0 ) {
            $status = true;
        }
        $request = $this->prepareActionRequest($user , $formId , $raw , $status,$empId);

    }


    private function prepareActionRequest( $user , $formId ,$raw , $status,$empId) {
        $request = new RejectApprovedStatusRequest();

        try {
            $request->setUpdaterId($user["empId"]);
            $request->setUpdaterName($user["name"]);
            $request->setUdpaterEmail($user["email"]);
            $request->setType("manager");
            $request->setEmpId($empId);
            if($status) {
                $request->setComment($raw["comment"]);
                $request->setStatus("rejected");
            } else {
                $request->setStatus("approved");
            }

        } catch (\Exception $e) {

        }


    }

}

?>