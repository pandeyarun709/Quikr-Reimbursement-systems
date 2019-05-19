<?php

namespace App\Manager;


use App\Requests\AddExpenseRequest;
use App\Requests\Tasks;


class ReimbursementManager extends  CurlApiRequest {
    /**
     * @param $raw
     * @param $user
     * @return array
     */
    public  function prepareAddExpenseRequest($raw , $user) {
        $req = array();
        try {
            $postParam = self::setRequest($raw , $user);
            echo  json_encode($postParam); die;
            $response = self::callAPI("POST" ,"http://192.168.0.100:8080/Forms/AddForm",json_encode($postParam));
        } catch(\Exception $e) {
           echo "<h2> ERROR!! -- (Reim manger)</h2>".$e->getMessage();
        }
        return $req;

    }


    /**
     * @param $raw
     * @param $user
     * @return array
     */
    private function setRequest($raw , $user) {
        $req = new AddExpenseRequest();
        $totalExp =0;
              $task = new Tasks();
              $size = sizeof($raw['expense']);
              $img = self::getImagesUrl();

              $imageData = [];
              $task->setStartDate($raw['dateStart']);
              $task->setEndDate($raw['dateEnd']);
              $task->setDescription($raw["disc"]);

              for ($i = 0; $i < $size; $i++) {

                  switch ($raw["expense"][$i]) {
                      case 'localTravel' :
                          $task->setRoadFare($raw['amount'][$i]);
                          $imageData['localTravel'] = $img[$i];
                          break;

                      case 'air' :
                          $task->setAirFare($raw['amount'][$i]);
                          $imageData['airFare']= $img[$i];
                          break;

                      case 'outstationTravel' :
                           $task->setOutstationTravel($raw['amount'][$i]);
                           $imageData['outstationTravel'] = $img[$i];
                           break;

                      case 'petrol' :
                          $task->setPetrol($raw['amount'][$i]);
                          $imageData['petrol']=$img[$i];
                          break;

                      case 'telephone' :
                          $task->setTelephoneExp($raw['amount'][$i]);
                          $imageData['telephoneExp']= $img[$i];
                          break;

                      case 'hotel' :
                          $task->setHotelStay($raw['amount'][$i]);
                          $imageData['hotelStay']= $img[$i];
                          break;

                      case 'lunchSnacks' :
                          $task->setLunchSnacks($raw['lunchSnacks'][$i]);
                          $imageData['lunchSnacks']= $img[$i];
                          break;

                      case 'teamOuting' :
                           $task->setTeamOuting($raw['amount'][$i]);
                           $imageData['teamOuting'] = $img[$i];
                           break;

                      case 'miscellaneous' :
                          $task->setMiscelleneous($raw['amount'][$i]);
                          $imageData['miscelleneous']=  $img[$i];
                          break;
                  }

                  $totalExp = $totalExp + $raw["amount"][$i];

              }
              $task->setImageUrls($imageData);
              $task->setTotalExp($totalExp);
              $req->setTasks($task->getAllProperties());

              $req->setEmpId($user["empid"]);
              $req->setEmpName($user["name"]);
              $req->setTotalExp($totalExp);
        return $req->getAllPropertiesFilter();

    }

    /**
     * @return array
     */
    private function  getImagesUrl():array {
        $imgUrls=[];
        $x=0;
        foreach($_FILES['files']['tmp_name'] as $key => $tmp_name){
            $file_tmp = $_FILES['files']['tmp_name'][$key];
            $file_size=$_FILES['files']['size'][$key];
            $file_name = $_FILES['files']['name'][$key];
            $file_type=$_FILES['files']['type'][$key];
            $info = getimagesize($file_tmp);
            $f = fopen($file_tmp, "r");
            $string = base64_encode(fread($f, filesize($file_tmp)));
            $imagerawdata="data:" . $info["mime"] . ";base64," . $string;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://raven.kuikr.com/upload");
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('imagerawdata' => $imagerawdata)));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result=json_decode(curl_exec($ch),true);
            curl_close($ch);
            unset($ch);
            $imgUrls[$x]=$result['fileurl'];
            $x++;
        }
        return $imgUrls;

    }



}



?>