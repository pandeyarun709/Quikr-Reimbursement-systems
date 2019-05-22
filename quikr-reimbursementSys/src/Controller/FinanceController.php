<?php
namespace App\Controller;



use App\Manager\FinanceManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FinanceController extends DefaultController {


    /**
     * @Route("/finance" ,name = "finanace_view")
     * @Method({"GET"})
     */
    public function finance()
    {
        try {
            // Check Authentication
             if( !$this->checkAuth()) {
               return $this->redirectToRoute('new_log');
             }
             $user = $this->session->get('user')->getAllProperties();
            $d=array(
                "financeStatus" => "pending"
            );

            $get_data = $this->curlApi->callAPI('GET',"http://192.168.89.154:8080/Forms/Finance",json_encode($d));
            $response = json_decode($get_data, true);
            return $this->render('views/financeView.html.twig', array(
                "result" => $response,
                   "emp"   => $user
            ));

        } catch(\Exception $e) {
            echo "<h2>Sorry for the inconvenience!!</h2>";
            echo "finance ".$e->getMessage();
            return new Response();
        }
    }



    /**
     * @Route("/finance/view/{fid}" ,name = "details")
     * @Method({"GET"})
     */
    public function financeview($fid)
    {

        // Check Authentication
        if( !$this->checkAuth()) {
            return $this->redirectToRoute('new_log');
        }
        try {
            $user = $this->session->get('user')->getAllProperties();
            $data = array(
                "formid" => $fid
            );
            $urlString = 'http://192.168.89.154:8080/Forms/Tasks';
            $get_data = $this->curlApi->callAPI('GET', $urlString , json_encode($data));
            $response = json_decode($get_data, true);
            return $this->render('views/detailview.html.twig', array(
                "emp"   => $user,
                "result" => $response,
            ));
        } catch(\Exception $e) {
            echo "<h2>Sorry for the inconvenience!!(Finance view)</h2>";
            echo $e;
            return new Response();
        }
    }


    /**
     * @Route("/finance/action/{formId}/{empId}" ,name="action")
     * @Method({"POST"})
     */
    public function finanAeaction(Request $request,$formId ,$empId ) {
        try {
             // Check Authenticatio
             if( !$this->checkAuth()) {
               return $this->redirectToRoute('new_log');
             }
            $user = $this->session->get('user')->getAllProperties();
            $raw = $request->request->all();
            $manager = new FinanceManager();
            $manager->financeAction($user, $raw , $formId,$empId);

            return $this->redirectToRoute("finanace_view");
        } catch(\Exception $e) {
            echo "<h2>Sorry for the inconvenience!!(Manager view)</h2>";
            echo $e;
            return new Response();
        }
    }



    /**
     * @Route("/finance/paidview" , name="paidview")
     * @Method({"GET"})
     */
    public function paidview()
    {

        try {
            // Check Authentication
            if( !$this->checkAuth()) {
                return $this->redirectToRoute('new_log');
            }
            $user = $this->session->get('user')->getAllProperties();
            $data=array(
                "financeid" =>$user['empid']
            );
            $get_data = $this->curlApi->callAPI('GET', 'localhost:8080/Forms/Finance/History', json_encode($data));
            $response = json_decode($get_data, true);
            return $this->render('views/paidview.html.twig', array(
                "result" => $response,
                "emp"   => $user
            ));
        } catch(\Exception $e) {
            echo "<h2>Sorry for the inconvenience!!(Finance view)</h2>";
            echo $e;
            return new Response();
        }
    }

    /**
     * @Route("/finance/filter", name="finance_filter")
     * @Method({"POST"})
     */
    public function financeFilter(Request $request) {

        try {
             //Check Authentication
             if( !$this->checkAuth()) {
               return $this->redirectToRoute('new_log');
             }

            $raw=$request->request->all();
            $user = $this->session->get('user')->getAllProperties();
            //print_r($request->request->all());die;
            $body=array(
                "financeId"=>401
            );
            $d = array_merge($body,$raw);
            $url = 'http://192.168.0.100:8080/Forms/Finance';
            $get = $this->curlApi->callAPI('GET' , $url , json_encode($d));
            $response = json_decode($get , true);
            //  print_r($response);die;
            return $this->render("Views/financeView.html.twig",array(
                "result" => $response,
                "emp" => $user
            ));
        } catch(\Exception $e) {
            echo "<h2>Sorry for the inconvenience!!(Finance view)</h2>";
            echo $e;
            return new Response();
        }

    }


    /**
     * @Route("/finance/history" ,name = "details_view")
     * @Method({"GET"})
     */
    public function history()
    {
        try {

            //Check Authentication
            if( !$this->checkAuth()) {
               return $this->redirectToRoute('new_log');
             }
             $user = $this->session->get('user')->getAllProperties();
                 $body= array(
                   "financeStatus" => "approved"
              );
            $get_data=$this->curlApi->callAPI('GET','http://192.168.89.154:8080/Forms/Finance/History',json_encode($body));
            $final=json_decode($get_data);
            //var_dump($final); die;
            return $this->render('views/paymenthistory.html.twig', array(
                "res"=>$get_data,
                "result"=>$final,
                "emp" => $user
            ));

        } catch(\Exception $e) {
            echo "<h2>Sorry for the inconvenience!!(Finance view)</h2>";
            echo $e;
            return new Response();
        }
    }

    /**
     * @Route("/finance/reject/{fid}" , name="history")
     * @Method({"GET"})
     */
    public function reject(Request $request,$fid){
        try{
            // Check Authentication
            // if( !$this->checkAuth()) {
            //   return $this->redirectToRoute('new_log');
            // }
            $raw = $request->request->all();

            // $user = $this->session->get('user')->getAllProperties();
            $body= array(
                "formid"=>$fid,
                //          "financeid"=>$user['empid']
            );
            $final=array_merge($body,$raw);
            print_r($final);die;
            $url = 'localhost:8080/Forms/Finance/';
            $get = $this->curlApi->callAPI('GET' , $url , json_encode($final));
            $response = json_decode($get , true);
            //  print_r($response);die;
            return $this->render("/views/financeView.html.twig",array(
                "result"=>$response
            ));
        }catch(\Exception $e) {
            echo "<h2>Sorry for the inconvenience!!(Finance view)</h2>";
            echo $e;
            return new Response();
        }

    }
}

?>


