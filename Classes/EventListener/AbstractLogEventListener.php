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


use AFM\Registeraddress\Domain\Model\Address;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use Undkonsorten\RegisteraddressLogger\Domain\Model\Logentry;
use Undkonsorten\RegisteraddressLogger\Domain\Repository\LogentryRepository;

abstract class AbstractLogEventListener
{
    /**
     * @var LogentryRepository
     */
    protected $logentryRepository;

    public function __construct(\Undkonsorten\RegisteraddressLogger\Domain\Repository\LogentryRepository $logentryRepository)
    {
        $this->logentryRepository = $logentryRepository;
    }

    protected function createLogentry(Address $address,$action, $actionPid){

        /* @var $logentry \Undkonsorten\RegisteraddressLogger\Domain\Model\Logentry  */
        $logentry = GeneralUtility::makeInstance(Logentry::class);
        $logentry->setEmail($address->getEmail());
        $logentry->setAction($action);
        $logentry->setPidOfAction($actionPid);
        $logentry->setConsent($address->getConsent());
        $logentry->setAddress($address);
        $logentry->setIp($this->getRequestIp());
        $this->logentryRepository->add($logentry);
    }

    protected function getRequestIp(){
        $ip = GeneralUtility::getIndpEnv('REMOTE_ADDR');
        if(!empty($ip)){
            return $ip;
        }
        if(!empty($_SERVER['TYPO3_DB'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else {
            return $_SERVER['REMOTE_ADDR'];
        }

    }
}
