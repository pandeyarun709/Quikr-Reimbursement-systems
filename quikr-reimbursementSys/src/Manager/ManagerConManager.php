<?php

namespace  App\Manager;

use App\Requests\GetViewRequest;
use App\Requests\RejectApprovedStatusRequest;

class ManagerConManager extends CurlApiRequest {

    public function managerAction($user, $raw , $formId,$empId) {
        $response = array();
      try{
          $status = false;
          if(sizeof($raw) > 0 ) {
              $status = true;
          }
          $request = $this->prepareActionRequest($user , $formId , $raw , $status,$empId);
          //echo json_encode($request->getAllProperties()); die;
          $getData = $this->callAPI("POST","http://192.168.89.154:8080/Forms/Manager/FormUpdate",json_encode($request->getAllProperties()));

          if(!empty($getData)){
              $response = json_decode($getData , true);
          }
      } catch (\Exception $e) {
          echo "managerAction ".$e->getMessage();
      }
      return $response;
    }

    public function getManagerView($user , $raw=array()) {

           $postParam = new GetViewRequest();
           $response = null;
           $postParam->setVertical($user["vertical"]);
           $postParam->setManagerId(308);//$user["empid"]);
           try {
               if(sizeof($raw) > 0) {
                   if(isset($raw["tofetch"]))
                   {
                       $postParam->setManagerStatus($raw["tofetch"]);
                   }

                   if(isset($raw["month"]))
                   {
                       $postParam->setMonth($raw["month"]);
                   }

                   if(isset($raw["year"]))
                   {
                       $postParam->setYear($raw["year"]);
                   }
               } else {
                   $postParam->setManagerStatus("pending");
               }
               $data = $this->callAPI("GET" , "http://192.168.89.154:8080/Forms/Manager" , json_encode($postParam->getAllProperties()));
               if(!empty($data)) {
                   $response = json_decode($data,true);
               }
           } catch (\Exception $e) {
               echo "Get Maneger ".$e->getMessage();
           }
         return $response;
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
            $request->setType("manager");
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