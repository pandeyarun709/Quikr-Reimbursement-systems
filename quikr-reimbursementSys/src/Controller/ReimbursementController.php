<?php
namespace App\Controller;
   
  
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\Manager\ReimbursementManager;
   

class ReimbursementController extends DefaultController {

//    /**
//     * @var ReimbursementManager
//     */
//    protected $reimManger = new ReimbursementManager();


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
         $user = $this->session->get('user')->getAllProperties();
         $reimManger = new ReimbursementManager();
         $data = $reimManger->getForms($user , "pending");
         return $this->render('views/reimbursement.html.twig', array(
                "result" => $data,
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
                $manager->prepareAddExpenseRequest($raw, $user);
                return $this->redirectToRoute('reimbursemet_sys');
        } catch(\Exception $e) {
              echo "<h2>Sorry for the inconvenience!!(Add Reim view)<h2>";
              echo $e;
              return new Response();
          }
    }

}

 ?>  