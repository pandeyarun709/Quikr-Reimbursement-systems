<?php

namespace App\Manager;


use App\Requests\AddExpenseRequest;
use App\Requests\Tasks;
use Symfony\Component\HttpKernel\Log\Logger;

class ReimbursementManager extends  CurlApiRequest {
    /**
     * @param $raw
     * @param $user
     * @return array
     */
    public static function prepareAddExpenseRequest($raw , $user) {
        $req = array();
        try {
            $postParam = self::setRequest($raw , $user);
            $response = self::callAPI("POST" ,"http://192.168.90.182:8080/Forms/AddForm",json_encode($postParam));

        } catch(\Exception $e) {
           echo "<h2> ERROR!! -- (Reim manger)</h2>".$e->getMessage();
        }
        return $req;

    }


    /**
     * @param $raw
     * @param $user
     * @return AddExpenseRequest
     */
    private function setRequest($raw , $user) {
        $req = new AddExpenseRequest();
        $totalExp =0;
              $task = new Tasks();
              $size = sizeof($raw['expense']);
              $task->setStartDate($raw['dateStart']);
              $task->setEndDate($raw['dateEnd']);
              $task->setDescription($raw["disc"]);

              for ($i = 0; $i < $size; $i++) {

                  switch ($raw["expense"][$i]) {
                      case 'road' :
                          $task->setRoadFare($raw['amount'][$i]);
                          break;

                      case 'air' :
                          $task->setAirFare($raw['amount'][$i]);
                          break;

                      case 'petrol' :
                          $task->setPetrol($raw['amount'][$i]);
                          break;

                      case 'telephone' :
                          $task->setTelephoneExp($raw['amount'][$i]);
                          break;

                      case 'hotel' :
                          $task->setHotelStay($raw['amount'][$i]);
                          break;

                      case 'buisness' :
                          $task->setBusinessMeal($raw['amount'][$i]);
                          break;

                      case 'miscellaneous' :
                          $task->setMiscelleneous($raw['amount'][$i]);
                          break;
                  }

                  $totalExp = $totalExp + $raw["amount"][$i];

              }
              $task->setImageUrls(array("img1" , "img2"));
              $task->setTotalExp($totalExp);
              $req->setTasks($task->getAllProperties());

              $req->setEmpId($user["empid"]);
              $req->setEmpName($user["name"]);
              $req->setEmail($user["email"]);
              $req->setDesignation($user["designation"]);
              $req->setDepartment("Technolgy");//$user["department"]);
              $req->setManagerId($user["managerId"]);
              $req->setTotalExp($totalExp);
              $req->setVertical("Goods");//$user["vertical"]);
              $req->setManagerName("Arpan");
        return $req->getAllProperties();

    }

}



?>