<?php
/*******************************************************************
 * (c) 2019 Stephan Preßl, www.prestep.at <development@prestep.at>
 * All rights reserved
 * Modification, distribution or any other action on or with
 * this file is permitted unless explicitly granted by PRESTEP
 * www.prestep.at <development@prestep.at>
 *******************************************************************/

namespace PRESTEP\BookingPlanBundle\EventListener;


use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\RouterInterface;


class NavigationListener
{

    protected $requestStack;
    protected $router;

    public function __construct(RequestStack $requestStack, RouterInterface $router)
    {
        $this->requestStack = $requestStack;
        $this->router = $router;
    }



    public function onGetUserNavigation( $arrModules )
    {
        $request = $this->requestStack->getCurrentRequest();

        $GLOBALS['TL_CSS'][] = 'bundles/prestepbookingplan/css/backend.css|static';

        $arrBookingPlanModules =
        [
            'rooms' =>
            [
                'label'     => 'Zimmer/Wohnungen/Häuser',
                'class'     => 'navigation psbooking-rooms',
                'href'      => $this->router->generate('contao_backend_psbooking_rooms'),
                'isActive'  => 'contao_backend_psbooking_rooms' === $request->attributes->get('_route'),
            ],
        ];

        if( isset($arrModules['psbooking']) )
        {
            $arrModules['psbooking']['modules'] = array_merge
            (
                $arrBookingPlanModules,
                $arrModules['psbooking']['modules']
            );
        }
        else
        {
            array_insert
            (
                $arrModules,
                0,
                [
                    'psbooking' =>
                    [
                        'class'     => 'node-expanded',
                        'title'     => 'Bereich schließen',
                        'label'     => 'Belegung',
                        'href'      => '/contao/psbooking?mtg=psbooking&ref=' . TL_REFERER_ID,
                        'ajaxUrl'   => '/contao',
                        'icon'      => 'modPlus.gif',
                        'modules'   => $arrBookingPlanModules
                    ]
                ]
            );
        }
echo "<pre>"; print_r( $arrModules ); exit;
        return $arrModules;
    }

}
