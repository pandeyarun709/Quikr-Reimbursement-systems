<?php
namespace App\Controller;
   
  
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\Manager\ReimbursementManager;
   

class ReimbursementController extends DefaultController {

  /**
   *  @Route("/reimbursement", name="reimbursemet_sys")
   *  @Method({"GET"})
   */
   public function reimbursement() {
      
    try{
       // Check Authentication
        if( !$this->checkAuth()) {
           return $this->redirectToRoute('new_log');
         }
         
         if($this->session->get('user') == null){
            return $this->redirectToRoute('new_log');
         }
       

        // $user = $this->session->get('user')->getAllProperties();
        $data = '[{
	"empId": 1,
	"empName": "john",
	"vertical": "goods",
	"department": "technology",
	"designation": "backend-developer",
	"managerId": 101,
	"totalExp": 1000.50,
	"tasks": [{
		"airFare": 500.25,
		"roadFare": 0,
		"petrol": 0,
		"telephoneExp": 0,
		"hotelStay": 0,
		"businessMeal": 0,
		"miscelleneous": 0,
		"totalExp": 550.25,
		"description": "travel to mumbai",
		"startDate": "2019-04-04",
		"endDate": "2019-04-04",
		"imageUrls": [
			"imageurl1", "imageurl2"

		]
	}]
}, {
	"empId": 1,
	"empName": "john",
	"vertical": "goods",
	"department": "technology",
	"designation": "backend-developer",
	"managerId": 101,
	"totalExp": 1000.50,
	"tasks": [{
		"airFare": 500.25,
		"roadFare": 0,
		"petrol": 0,
		"telephoneExp": 0,
		"hotelStay": 0,
		"businessMeal": 0,
		"miscelleneous": 0,
		"totalExp": 550.25,
		"description": "travel to mumbai",
		"startDate": "2019-04-04",
		"endDate": "2019-04-04",
		"imageUrls": [
			"imageurl1", "imageurl2"

		]
	}]
}
]';

//var_dump(json_decode($data)); die;

        $final = null;
        $key = null;
        $st = "pending";
             $user = $this->session->get('user')->getAllProperties();
             //var_dump($user); die;
            return $this->render('views/reimbursement.html.twig', array(
              "status" => $st,
               "key"  =>  $key,
                "result" => json_decode($data),
                "emp"   =>  $user
            ));
      }catch(\Exception $e){
        echo "<h2>Sorry for the inconvenience!!(Reim view)</h2>";
        echo $e->getMessage();
        return new Response();
      }
  }

     
     

    //=======================================
    // Published Expense
    //========================================        
      /**
       * @Route("reimbursement/publish/{tid}" , name="publishing")
       * @Method({"GET"})
       */
       public function publishedExp($tid) {
         
        try {
              // Check Authentication
              if( !$this->checkAuth()) {
                return $this->redirectToRoute('new_log');
              }
                
                $user = $this->session->get('user')->getAllProperties();
                
                $data = array(
                    "id" => $user['empid'],
                    "topublish" => [$tid]
                );
                $urlString = 'localhost:8080/tasks/emp/publish';
                $get_data = $this->curlApi->callAPI('POST', $urlString,  json_encode($data));
                
                return $this->redirectToRoute('reimbursemet_sys');

           } catch(\Exception $e) {
                echo "<h2>Sorry for the inconvenience!!(Reim view)</h2>";
                echo $e;
                return new Response();
            }
           
        }

        //========================
        //  Render Expense  Form
        //========================
        /**
         * @Route("/reimbursement/new" , name="new_reimbursement")
         * @Method({"GET"})
         */
        public function addNewReimbursement() {
          
          try{
                // Check Authenticatio
                if( !$this->checkAuth()) {
                  return $this->redirectToRoute('new_log');
                }

                $user = $this->session->get('user')->getAllProperties();
                  return $this->render("/views/expenseForm.html.twig",array(
                     "emp" => $user
                  ));

            } catch(\Exception $e) {
              echo "<h2>Sorry for the inconvenience!!(Reim view)</h2>";
              echo $e;
              return new Response();
          }
        }



        //============================
        //   add expense form 
        //============================
        /**
         *  @Route("/reimbursement/addexpense" , name="add_reimbursement")
         *  @Method({"POST"})
         */
        public function addNewReimbursementData(Request $request) {
        
         try {
        
                // Check Authentication
                  if( !$this->checkAuth()) {
                    return $this->redirectToRoute('new_log');
                  }

                // Fetch body from Request
                $raw = $request->request->all();
                $user = $this->session->get('user')->getAllProperties();
                $manager = new ReimbursementManager();
                $request = $manager->prepareAddExpenseRequest($raw, $user);

                echo json_encode($request); die;

                


              //==================================
              // Sending Notification to manager
              //==================================
              // $get_data = $this->curlApi->callAPI('GET', 'https://hrms.quikrcorp.com/app/aboutEmpDetail?q='.$user['managerId'] ,false);
              // $res = json_decode($get_data , true);
              // $managerEmail = $res["emailId"];
              
              // $msg = "New NON-CTC Expense is submit by ".$user["name"].".";
              // $post_data = array(
              //     "to" => $managerEmail,
              //     "from_address" => "noreply@emailers.quikrrealty.com",
              //     "from_name"=> "test hourly limit max throttel testing",
              //     "replyto" => $managerEmail,
              //     "subject"=> "NON-CTC Reimbursement",
              //     "body"=> $msg,
              //     "emailFrom"=> "RegularQueue",
              //     "isCompressed"=>false,
              //     "notification_engine_email_context" => "1"
              // );
              // $get_data = $this->curlApi->callAPI('POST',
              //                'http://192.168.124.53:9010/mail' ,
              //                json_encode($post_data));


              return $this->redirectToRoute('reimbursemet_sys');

        } catch(\Exception $e) {
              echo "<h2>Sorry for the inconvenience!!(Add Reim view)<h2>";
              echo $e;
              return new Response();
          }
    }

}

 ?>  