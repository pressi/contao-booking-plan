<?php
/*******************************************************************
 * (c) 2019 Stephan Preßl, www.prestep.at <development@prestep.at>
 * All rights reserved
 * Modification, distribution or any other action on or with
 * this file is permitted unless explicitly granted by PRESTEP
 * www.prestep.at <development@prestep.at>
 *******************************************************************/

namespace PRESTEP\BookingPlanBundle\EventListener;


use Contao\CoreBundle\Routing\ScopeMatcher;
use Symfony\Component\HttpFoundation\RequestStack;


class System
{

    private $requestStack;
    private $scopeMatcher;



    public function __construct(RequestStack $requestStack, ScopeMatcher $scopeMatcher)
    {
        $this->requestStack = $requestStack;
        $this->scopeMatcher = $scopeMatcher;
    }



    public function isBackend()
    {
        return $this->scopeMatcher->isBackendRequest($this->requestStack->getCurrentRequest());
    }



    public function isFrontend()
    {
        return $this->scopeMatcher->isFrontendRequest($this->requestStack->getCurrentRequest());
    }



    public function initializeSystem()
    {
        if( $this->isFrontend )
        {
//            $GLOBALS['TL_CSS'][] = 'bundles/dummybundle/css/dummy.css|static';
//            $GLOBALS['TL_JAVASCRIPT'][] = 'bundles/dummybundle/js/dummy.js|static';
        }

//        array_insert($GLOBALS['TL_CTE']['texts'], 2, array(
//            'content_dummy' => 'Sioweb\ContentElement\ContentDummy',
//        ));
    }

}