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


use AFM\Registeraddress\Event\DeleteBeforePersistEvent;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

class LogDeleteEventListener extends AbstractLogEventListener
{

    public function logDelete(DeleteBeforePersistEvent $event): void
    {
        $address = $event->getAddress();
        $extensionConfiguration = GeneralUtility::makeInstance(ExtensionConfiguration::class)
            ->get('registeraddress_logger');
        if ($extensionConfiguration['deleteLogs'] == 1) {
            $logentries = $this->logentryRepository->findByAddress($address);
            foreach ($logentries as $logentry) {
                $this->logentryRepository->remove($logentry);
            }
        } else {
            $this->createLogentry($address,
                LocalizationUtility::translate("tx_registeraddresslogger_domain_model_logentry.deleteAction",
                    'RegisteraddressLogger'), $address->getPid());
        }

    }

}
