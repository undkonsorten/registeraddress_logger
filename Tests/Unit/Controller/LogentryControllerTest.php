<?php
namespace Undkonsorten\RegisteraddressLogger\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Eike Starkmann <es@undkonsorten.com>
 */
class LogentryControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Undkonsorten\RegisteraddressLogger\Controller\LogentryController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Undkonsorten\RegisteraddressLogger\Controller\LogentryController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllLogentriesFromRepositoryAndAssignsThemToView()
    {

        $allLogentries = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $logentryRepository = $this->getMockBuilder(\::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $logentryRepository->expects(self::once())->method('findAll')->will(self::returnValue($allLogentries));
        $this->inject($this->subject, 'logentryRepository', $logentryRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('logentries', $allLogentries);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }
}
