<?php
/*******************************************************************
 * (c) 2019 Stephan Preßl, www.prestep.at <development@prestep.at>
 * All rights reserved
 * Modification, distribution or any other action on or with
 * this file is permitted unless explicitly granted by PreStep
 * www.prestep.at <development@prestep.at>
 *******************************************************************/

namespace PreStep\BookingPlanBundle\ContaoManager;


use PreStep\BookingPlanBundle\PreStepBookingPlanBundle;

use Contao\CoreBundle\ContaoCoreBundle;

use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;

use Contao\ManagerPlugin\Routing\RoutingPluginInterface;
use Contao\ManagerPlugin\Dependency\DependentPluginInterface;
use Symfony\Component\Config\Loader\LoaderResolverInterface;
use Symfony\Component\HttpKernel\KernelInterface;

use Contao\ManagerPlugin\Config\ConfigPluginInterface;
use Symfony\Component\Config\Loader\LoaderInterface;


/**
 * Plugin for the Contao Manager.
 *
 * @author Stephan Preßl <development@prestep.at>
 */
class Plugin implements BundlePluginInterface, RoutingPluginInterface, ConfigPluginInterface, DependentPluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        $arrLoadAfter   = [ContaoCoreBundle::class];

        return [
            BundleConfig::create(PreStepBookingPlanBundle::class)
                ->setLoadAfter($arrLoadAfter)
        ];
    }



    /**
     * {@inheritdoc}
     */
    public function getPackageDependencies()
    {
        return [];
    }


    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function getRouteCollection(LoaderResolverInterface $resolver, KernelInterface $kernel)
    {
        $file = __DIR__ . '/../Resources/config/routing.yml';

        return $resolver->resolve($file)->load($file);
    }
}
