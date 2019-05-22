<?php 
 namespace App\Controller;
   
  
 use App\Manager\ManagerConManager;
 use Symfony\Component\HttpFoundation\Request;
 use Symfony\Component\HttpFoundation\Response;
 use Symfony\Component\Routing\Annotation\Route;
 use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
 use Symfony\Bundle\FrameworkBundle\Controller\Controller;

 class ManagerController extends DefaultController {
      

       /**
        * @Route("/manager", name="manager_view")
        * @Method({"GET"})
        */
        public function managerView() {
          
          try {  
          // Check Authenticatio
              if( !$this->checkAuth()) {
                  return $this->redirectToRoute('new_log');
              }
              $user = $this->session->get('user')->getAllProperties();
              $manger = new ManagerConManager();
              $response= $manger->getManagerView($user);
              return $this->render("/views/managerViewNew.html.twig",array(
                 "result" => $response,
                 "emp"   => $user,
              ));
           } catch(\Exception $e) {
              echo "<h2>Sorry for the inconvenience!!</h2>";
              echo " managerView ".$e->getMessage();
              return new Response();
           }
        }

        /**
         * @Route("/manager/action/{formId}/{empId}" ,name="approved")
         * @Method({"POST"})
         */
        public function managerAction($formId ,$empId , Request $request)
        {
          try {
              // Check Authenticatio
              if( !$this->checkAuth()) {
                return $this->redirectToRoute('new_log');
              }
               $raw = $request->request->all();
               $user = $this->session->get('user')->getAllProperties();
               $manager = new ManagerConManager();
                $manager->managerAction($user ,$raw,$formId ,$empId);
                return $this->redirectToRoute('manager_view');
           } catch(\Exception $e) {
            echo "<h2>Sorry for the inconvenience!!(Manager view)</h2>";
            echo "managerAction ".$e->getMessage();
            return new Response();
         }
      }

//        /**
//         * @Route("/manager/{tid}/reject" ,name="reject")
//         * @Method({"GET"})
//         */
//        public function rejected($tid)
//        {
//
//
//         try {
//                // Check Authenticatio
//                if( !$this->checkAuth()) {
//                  return $this->redirectToRoute('new_log');
//                }
//
//                  $user = $this->session->get('user')->getAllProperties();
//                      $data = array(
//                      "managerid"=>$user['empid'],
//                      "formid" =>$tid,
//                    "status"=>"rejected"
//                  );
//
//                  $url='localhost:8080/Forms/Manager/UpdateForm';
//                  $get_req = $this->curlApi->callAPI('PUT',$url,json_encode($data));
//                  return $this->redirectToRoute('manager_view');
//             } catch(\Exception $e) {
//                echo "<h2>Sorry for the inconvenience!!(Manager view)</h2>";
//                echo $e;
//                return new Response();
//              }
//        }


        /**
         * @Route("/manager/filter", name="manager_filter")
         * @Method({"POST"})
         */
        public function managerFilter(Request $request) {

          try {
                  // Check Authenticatio
                if( !$this->checkAuth()) {
                    return $this->redirectToRoute('new_log');
                 }
                $user = $this->session->get('user')->getAllProperties();
                $manger = new ManagerConManager();
                $response= $manger->getManagerView($user , $request->request->all());
                return $this->render("/views/managerViewNew.html.twig",array(
                    "result" => $response,
                    "emp"   => $user
                  ));
            } catch(\Exception $e) {
              echo "<h2>Sorry for the inconvenience!!</h2>";
              echo "managerFilter ".$e->getMessage();
              return new Response();
           }

        }

    }
?>