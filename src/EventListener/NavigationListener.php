<?php
/*******************************************************************
 * (c) 2019 Stephan Preßl, www.prestep.at <development@prestep.at>
 * All rights reserved
 * Modification, distribution or any other action on or with
 * this file is permitted unless explicitly granted by PreStep
 * www.prestep.at <development@prestep.at>
 *******************************************************************/

namespace PreStep\BookingPlanBundle\EventListener;


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

        $arrIIDOModules =
        [
            'clients' =>
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
                $arrIIDOModules,
                $arrModules['psbooking']['modules']
            );
        }
        else
        {
            array_insert
            (
                $arrModules,
                3,
                [
                    'psbooking' =>
                    [
                        'class'     => 'node-expanded',
                        'title'     => 'Bereich schließen',
                        'label'     => 'Belegung',
                        'href'      => '/contao/psbooking?mtg=psbooking&ref=' . TL_REFERER_ID,
                        'ajaxUrl'   => '/contao',
                        'icon'      => 'modPlus.gif',
                        'modules'   => $arrIIDOModules
                    ]
                ]
            );
        }

        return $arrModules;
    }

}
