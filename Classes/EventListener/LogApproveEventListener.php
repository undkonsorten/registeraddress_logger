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


use AFM\Registeraddress\Event\ApproveBeforePersistEvent;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

class LogApproveEventListener extends AbstractLogEventListener
{

    public function logApprove(ApproveBeforePersistEvent $event): void
    {
        $address = $event->getAddress();
        $this->createLogentry($address,LocalizationUtility::translate("tx_registeraddresslogger_domain_model_logentry.approveAction",'registeraddress_logger'),$address->getPid());
    }

}
