<?php

namespace App\Manager;


use App\Requests\RejectApprovedStatusRequest;

class FinanceManager extends CurlApiRequest {

    public function financeAction($user, $raw , $formId,$empId) {
        try{
            $status = false;
            if(sizeof($raw) > 0 ) {
                $status = true;
            }
            $request = $this->prepareActionRequest($user , $formId , $raw , $status,$empId);
            $getData = $this->callAPI("POST","http://192.168.0.100:8080/Forms/Finance/UpdateForm",json_encode($request->getAllProperties()));
           var_dump("success"); die;
        } catch (\Exception $e) {
            echo "managerAction ".$e->getMessage();
        }
    }

    /**
     * @param $user
     * @param $formId
     * @param $raw
     * @param $status
     * @param $empId
     * @return RejectApprovedStatusRequest
     */
    private function prepareActionRequest( $user , $formId ,$raw , $status,$empId) {
        $request = new RejectApprovedStatusRequest();
        try {
            $request->setUpdaterId($user["empid"]);
            $request->setUpdaterName($user["name"]);
            $request->setUdpaterEmail($user["email"]);
            $request->setType("finance");
            $request->setEmpId($empId);
            $request->setFormId($formId);
            if($status) {
                $request->setComment($raw["comment"]);
                $request->setStatus("rejected");
            } else {
                $request->setStatus("approved");
            }
        } catch (\Exception $e) {
            echo " prepareActionRequest ".$e->getMessage();
        }
        return $request;
    }
}


?>