<?php
namespace Undkonsorten\RegisteraddressLogger\Controller;

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
use Undkonsorten\RegisteraddressLogger\Domain\Repository\LogentryRepository;

/**
 * LogentryController
 */
class LogentryController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * @var LogentryRepository
     */
    protected $logentryRepository;

    public function injectLogentryRepository(LogentryRepository $logentryRepository){
        $this->logentryRepository = $logentryRepository;
    }
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $logentries = $this->logentryRepository->findAll();
        $this->view->assign('logentries', $logentries);
    }
}
