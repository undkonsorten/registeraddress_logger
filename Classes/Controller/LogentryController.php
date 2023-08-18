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

use TYPO3\CMS\Backend\Template\ModuleTemplate;
use TYPO3\CMS\Backend\Template\ModuleTemplateFactory;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Pagination\SimplePagination;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Pagination\QueryResultPaginator;
use Undkonsorten\RegisteraddressLogger\Domain\Repository\LogentryRepository;

/**
 * LogentryController
 */
class LogentryController extends ActionController
{

    /**
     * @var LogentryRepository
     */
    protected $logentryRepository;

    /**
     * @var ModuleTemplateFactory
     */
    protected $moduleTemplateFactory;

    /**
     * @var ModuleTemplate
     */
    protected $moduleTemplate;
    /**
     * @param NewsletterRepository $newsletterRepository
     * @param RecipientListRepositoryInterface $recipientListRepository
     */
    public function __construct(
        LogentryRepository $logentryRepository,
        ModuleTemplateFactory $moduleTemplateFactory,
    )
    {
        $this->logentryRepository = $logentryRepository;
        $this->moduleTemplateFactory = $moduleTemplateFactory;
    }

    public function initializeAction()
    {
        $this->moduleTemplate = $this->moduleTemplateFactory->create($this->request);
    }
    /**
     * action list
     *
     * @return void
     */
    public function listAction(): ResponseInterface
    {
        $logentries = $this->logentryRepository->findAll();
        $this->view->assign('logentries', $logentries);
        
        if(isset($this->settings['pagination']['hidePagination']) && !$this->settings['pagination']['hidePagination']) {
            $currentPage = $this->request->hasArgument('currentPage')
                ? (int)$this->request->getArgument('currentPage')
                : 1;
            $itemsPerPage = $this->settings['pagination']['itemsPerPage'] ?? 100;
            $paginator = new QueryResultPaginator($logentries, $currentPage, $itemsPerPage);
            $pagination = new SimplePagination($paginator);
            $this->view->assign('paginatedItems', $paginator->getPaginatedItems());
            $this->view->assign(
                'pagination',
                [
                    'pagination' => $pagination,
                    'paginator' => $paginator,
                ]
            );
        }

        $this->moduleTemplate->setContent($this->view->render());
        return $this->htmlResponse($this->moduleTemplate->renderContent());
    }
}
