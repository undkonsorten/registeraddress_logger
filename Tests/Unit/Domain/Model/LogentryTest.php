<?php
namespace Undkonsorten\RegisteraddressLogger\Tests\Unit\Domain\Model;

use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use Undkonsorten\RegisteraddressLogger\Domain\Model\Logentry;
/**
 * Test case.
 *
 * @author Eike Starkmann <es@undkonsorten.com>
 */
class LogentryTest extends UnitTestCase
{
    /**
     * @var Logentry
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new Logentry();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getEmailReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getEmail()
        );
    }

    /**
     * @test
     */
    public function setEmailForStringSetsEmail()
    {
        $this->subject->setEmail('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'email',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getActionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getAction()
        );
    }

    /**
     * @test
     */
    public function setActionForStringSetsAction()
    {
        $this->subject->setAction('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'action',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPidOfActionReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getPidOfAction()
        );
    }

    /**
     * @test
     */
    public function setPidOfActionForIntSetsPidOfAction()
    {
        $this->subject->setPidOfAction(12);

        self::assertAttributeEquals(
            12,
            'pidOfAction',
            $this->subject
        );
    }
}
