<?php
/*******************************************************************
 * (c) 2019 Stephan Preßl, www.prestep.at <development@prestep.at>
 * All rights reserved
 * Modification, distribution or any other action on or with
 * this file is permitted unless explicitly granted by PRESTEP
 * www.prestep.at <development@prestep.at>
 *******************************************************************/

namespace PRESTEP\BookingPlanBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class BackendController extends Controller
{

    public function roomsAction()
    {
        $this->get('contao.framework')->initialize();

        $arrConfig = [];

        return new Response( $this->get('twig')->render('@PRESTEPBookingPlan/Backend/clients.html.twig', $arrConfig) );
    }

}
