<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


use App\Service\Master;
use App\Service\Capital;
use App\Service\Log;
use App\Service\Change;


class MasterController extends AbstractController
{
    /**
     * @Route("/master", name="master")
     * @return Response
     */
    public function index(Request $request): Response
    {
        $capital = new Capital();
        $change= new Change();
        $log = new Log();
        $message = "";
        
        $request = Request::createFromGlobals();
        if ($request->isMethod('POST')) {
            if ($request->request->get('message')) {
                $message = $request->request->get('message');
                $className = $request->request->get('classNames');
                if($className === 'Capital'){
                    $master = new Master($capital,$log);
                 $message=  $master->transform($message);
                 $master->log($message);


                }

               elseif($className === 'Change'){
                    $master = new Master($change,$log);
                 $message= $master->transform($message);
                   $master->log($message);

               }
            }
        }
        return $this->render('master/index.html.twig', [
            'message' => $message,
        ]);
    }
}