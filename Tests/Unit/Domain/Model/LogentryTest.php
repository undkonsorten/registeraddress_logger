<?php
namespace Undkonsorten\RegisteraddressLogger\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Eike Starkmann <es@undkonsorten.com>
 */
class LogentryTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Undkonsorten\RegisteraddressLogger\Domain\Model\Logentry
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Undkonsorten\RegisteraddressLogger\Domain\Model\Logentry();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getEmailReturnsInitialValueFor()
    {
    }

    /**
     * @test
     */
    public function setEmailForSetsEmail()
    {
    }

    /**
     * @test
     */
    public function getFirstNameReturnsInitialValueFor()
    {
    }

    /**
     * @test
     */
    public function setFirstNameForSetsFirstName()
    {
    }

    /**
     * @test
     */
    public function getLastNameReturnsInitialValueFor()
    {
    }

    /**
     * @test
     */
    public function setLastNameForSetsLastName()
    {
    }

    /**
     * @test
     */
    public function getActionReturnsInitialValueFor()
    {
    }

    /**
     * @test
     */
    public function setActionForSetsAction()
    {
    }
}
