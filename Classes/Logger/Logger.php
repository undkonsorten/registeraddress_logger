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

namespace Undkonsorten\RegisteraddressLogger\Logger;


use AFM\Registeraddress\Domain\Model\Address;
use Doctrine\Common\Persistence\ObjectManager;
use Undkonsorten\RegisteraddressLogger\Domain\Model\Logentry;
use Undkonsorten\RegisteraddressLogger\Domain\Repository\LogentryRepository;

class Logger implements \AFM\Registeraddress\Logger\LoggerInterface
{
    /**
     * @var LogentryRepository
     */
    protected $logentryRepository;


    public function injectLogentryRepository(LogentryRepository $logentryRepository){
        $this->logentryRepository = $logentryRepository;
    }


    public function logCreate(Address $address)
    {
        $this->createLogentry($address->getEmail(),"User created an entry",$address->getPid());
    }

    public function logDelete(Address $address)
    {
        $this->createLogentry($address->getEmail(),"User deleted an entry",$address->getPid());
    }

    public function logUpdate(Address $address)
    {
        $this->createLogentry($address->getEmail(),"User updated an entry",$address->getPid());
    }

    public function logApprove(Address $address)
    {
        $this->createLogentry($address->getEmail(),"User approved an entry",$address->getPid());
    }

    protected function createLogentry($email,$action, $actionPid){
        /* @var $logentry \Undkonsorten\RegisteraddressLogger\Domain\Model\Logentry  */
        $logentry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(Logentry::class);
        $logentry->setEmail($email);
        $logentry->setAction($action);
        $logentry->setPidOfAction($actionPid);
        $this->logentryRepository->add($logentry);
    }
}