<?php
/*******************************************************************
 * (c) 2019 Stephan Preßl, www.prestep.at <development@prestep.at>
 * All rights reserved
 * Modification, distribution or any other action on or with
 * this file is permitted unless explicitly granted by PRESTEP
 * www.prestep.at <development@prestep.at>
 *******************************************************************/

namespace PRESTEP\BookingPlanBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use PRESTEP\BookingPlanBundle\DependencyInjection\PRESTEPBookingPlanExtension;


/**
 * Configures the Contao PRESTEP Basic Bundle.
 *
 * @author Stephan Preßl <development@prestep.at>
 */
class PRESTEPBookingPlanBundle extends Bundle
{

    /**
     * Register extension
     *
     * @return PRESTEPBookingPlanExtension
     */
    public function getContainerExtension()
    {
        return new PRESTEPBookingPlanExtension();
    }
}
