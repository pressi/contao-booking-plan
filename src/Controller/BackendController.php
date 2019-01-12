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

        $mode           = 'table';
        $tableMode      = '\DC_' . ucfirst($mode);

        $strTable       = 'tl_prestep_bookingplan_room';
        $objTable       = new $tableMode( $strTable );

        $tableFuncName  = (($mode === 'file') ? 'edit' : 'showAll');
        $action         = \Input::get("act");

        if( $action )
        {
            if( $action !== "select" )
            {
                $tableFuncName = $action;
            }
        }

        $strContent = $objTable->$tableFuncName();

        $arrConfig =
        [
            'mode'      => $mode,
            'content'   => $strContent
        ];

        return new Response( $this->get('twig')->render('@PRESTEPBookingPlan/Backend/rooms.html.twig', $arrConfig) );
    }

}
