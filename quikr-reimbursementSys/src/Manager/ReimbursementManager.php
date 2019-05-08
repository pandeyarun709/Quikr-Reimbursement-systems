<?php

namespace App\Manager;


use App\Requests\AddExpenseRequest;
use App\Requests\Tasks;

class ReimbursementManager
{
    /**
     * @param $raw
     * @param $user
     * @return array
     */
    public static function prepareAddExpenseRequest($raw , $user) {
        $req = array();
        try {

            $req = self::setRequest($raw , $user);

        } catch(\Exception $e) {
           echo "<h2> ERROR!! -- (Reim manger)</h2>".$e;
        }
        return $req->getAllProperties();

    }


    /**
     * @param $raw
     * @param $user
     * @return AddExpenseRequest
     */
    private function setRequest($raw , $user) {
        $req = new AddExpenseRequest();

        $totalExp =0;
        $size = sizeof($raw['dateStart']);
        for($i = 0 ; $i < $size ; $i++){
            $total = $raw['road'][$i] +$raw['air'][$i] + $raw['petrol'][$i]+ $raw['hotel'][$i]+ $raw['buisness'][$i]+$raw['telephone'][$i];
            $task = new Tasks();
            $task->setStartDate($raw['dateStart'][$i]);
            $task->setEndDate($raw['dateEnd'][$i]);
            $task->setRoadFare($raw['road'][$i]);
            $task->setAirFare($raw['air'][$i]);
            $task->setPetrol($raw['petrol'][$i]);
            $task->setTelephoneExp($raw['telephone'][$i]);
            $task->setHotelStay($raw['hotel'][$i]);
            $task->setBusinessMeal($raw['buisness'][$i]);
            $task->setMiscelleneous($raw['miscellaneous'][$i]);
            $task->setDescription($raw['disc'][$i]);
            $task->setTotalExp($total);

            $req->setTasks($task->getAllProperties());
            $totalExp = $totalExp + $total;

        }

        $req->setEmpId($user["empid"]);
        $req->setEmpName($user["name"]);
        $req->setEmail($user["email"]);
        $req->setDesignation($user["designation"]);
        $req->setDepartment("Technolgy");//$user["department"]);
        $req->setManagerId($user["managerId"]);
        $req->setTotalExp($totalExp);
        $req->setVertical("Goods");//$user["vertical"]);

        return $req;


    }

}



?>