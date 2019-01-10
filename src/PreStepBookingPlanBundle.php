<?php
/*******************************************************************
 * (c) 2019 Stephan Preßl, www.prestep.at <development@prestep.at>
 * All rights reserved
 * Modification, distribution or any other action on or with
 * this file is permitted unless explicitly granted by PreStep
 * www.prestep.at <development@prestep.at>
 *******************************************************************/

namespace PreStep\BookingPlanBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use PreStep\BookingPlanBundle\DependencyInjection\PreStepBookingPlanExtension;


/**
 * Configures the Contao PreStep Basic Bundle.
 *
 * @author Stephan Preßl <development@prestep.at>
 */
class PreStepBookingPlanBundle extends Bundle
{

    /**
     * Register extension
     *
     * @return PreStepBookingPlanExtension
     */
    public function getContainerExtension()
    {
        return new PreStepBookingPlanExtension();
    }
}
