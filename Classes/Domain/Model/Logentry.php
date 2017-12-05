<?php
namespace Undkonsorten\RegisteraddressLogger\Domain\Model;

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

/**
 * Logentry
 */
class Logentry extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * email
     *
     * @var string
     */
    protected $email = '';

    /**
     * action
     *
     * @var string
     */
    protected $action = '';

    /**
     * pidOfAction
     *
     * @var int
     */
    protected $pidOfAction = 0;

    /**
     * Returns the email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the email
     *
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Returns the action
     *
     * @return string $action
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Sets the action
     *
     * @param string $action
     * @return void
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * Returns the pidOfAction
     *
     * @return int $pidOfAction
     */
    public function getPidOfAction()
    {
        return $this->pidOfAction;
    }

    /**
     * Sets the pidOfAction
     *
     * @param int $pidOfAction
     * @return void
     */
    public function setPidOfAction($pidOfAction)
    {
        $this->pidOfAction = $pidOfAction;
    }
}
