<?php
namespace Undkonsorten\RegisteraddressLogger\Tests\Unit\Controller;

use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use Undkonsorten\RegisteraddressLogger\Controller\LogentryController;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use Undkonsorten\RegisteraddressLogger\Domain\Repository\LogentryRepository;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;
/**
 * Test case.
 *
 * @author Eike Starkmann <es@undkonsorten.com>
 */
class LogentryControllerTest extends UnitTestCase
{
    /**
     * @var LogentryController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(LogentryController::class)
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

        $allLogentries = $this->getMockBuilder(ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $logentryRepository = $this->getMockBuilder(LogentryRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $logentryRepository->expects(self::once())->method('findAll')->will(self::returnValue($allLogentries));
        $this->inject($this->subject, 'logentryRepository', $logentryRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('logentries', $allLogentries);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }
}
