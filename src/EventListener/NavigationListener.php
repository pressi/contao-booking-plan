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
                'label'     => 'IIDO Clients',
                'class'     => 'navigation iido-clients',
                'href'      => $this->router->generate('contao_backend_iido_clients'),
                'isActive'  => 'contao_backend_iido_clients' === $request->attributes->get('_route'),
            ],

            'apiConfig' =>
            [
                'label'     => 'IIDO API',
                'class'     => 'navigation iido-api-config',
                'href'      => $this->router->generate('contao_backend_iido_apiConfig'),
                'isActive'  => 'contao_backend_iido_apiConfig' === $request->attributes->get('_route'),
            ]
        ];

        if( isset($arrModules['iido']) )
        {
            $arrModules['iido']['modules'] = array_merge
            (
                $arrIIDOModules,
                $arrModules['iido']['modules']
            );
        }
        else
        {
            array_insert
            (
                $arrModules,
                3,
                [
                    'iido' =>
                    [
                        'class'     =>  'node-expanded',
                        'title'     => 'Bereich schließen',
                        'label'     => 'IIDO',
                        'href'      => '/contao/iido?mtg=iido&ref=' . TL_REFERER_ID,
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
