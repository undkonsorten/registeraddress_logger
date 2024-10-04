<?php
/***
 *
 * This file is part of the "Registeraddress Logger" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Eike Starkmann <es@undkonsorten.com>, undkonsorten
 *
 ***/

namespace Undkonsorten\RegisteraddressLogger\EventListener;


use AFM\Registeraddress\Event\CreateBeforePersistEvent;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

class LogCreateEventListener extends AbstractLogEventListener
{

    public function logCreate(CreateBeforePersistEvent $event): void
    {
        $address = $event->getAddress();
        $this->createLogentry($address,LocalizationUtility::translate("tx_registeraddresslogger_domain_model_logentry.createAction",'RegisteraddressLogger'),$address->getPid());
    }

}
