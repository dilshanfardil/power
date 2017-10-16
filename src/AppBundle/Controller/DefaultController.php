<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Log;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        //get data from request
        $dataString = $request->get('data');

        $logger = $this->get('logger');
        $logger->info('logging data');
        $logger->info($dataString);

        $data = explode(",", $dataString);

        $logger->info($data[0]);
        $logger->info($data[1]);
        $logger->info($data[2]);
        $logger->info($data[3]);
        $logger->info($data[4]);

        if(count($data)!=6){
            $response=new JsonResponse(array('error' => 500));
            $response->headers->set('Access-Control-Allow-Origin', '*');
            return $response;
        }

        //save data to database
        $log = new Log();
        $log->setTimeStamp(new \DateTime('now'));
        $log->setPower1($data[0]);
        $log->setPower2($data[1]);
        $log->setPower3($data[2]);
        $log->setPowerlimit($data[3]);
        $log->setTotalpower($data[4]);

        $em = $this->getDoctrine()->getManager();
        $em->persist($log);
        $em->flush();

        $response=new JsonResponse(array('success' => 200));
        $response->headers->set('Access-Control-Allow-Origin', '*');

        return $response;
    }

    /**
     * @Route("/viewlog", name="viewlog")
     */
    public function viewAction(Request $request)
    {
        //load data from database
        //sort decending
        //pass to view
    }

    /**
     * @Route("/getData", name="viewlog")
     */
    public function getDataAction(Request $request)
    {
        //get data from database
        $Log = $this->getDoctrine()
            ->getRepository('AppBundle:Log')->findBy([], ['id' => 'DESC']);
        //send value to page

        $power1 = 0;
        $power2 = 0;
        $power3 = 0;
        $total_power = 0;
        $power_limit = 0;

        if (count($Log) > 0) {

            $power1 = $Log[0]->getPower1();
            $power2 = $Log[0]->getPower2();
            $power3 = $Log[0]->getPower3();
            $power_limit = $Log[0]->getPowerlimit();
            $total_power = $Log[0]->getTotalpower();
        }

        return new JsonResponse(array(
            'total_power' => $total_power,
            'power_limit' => $power_limit,
            'power1'=>$power1,
            'power2'=>$power2,
            'power3'=>$power3
        ));

    }

}
