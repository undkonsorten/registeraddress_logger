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
     * @var
     */
    protected $email = null;

    /**
     * action
     *
     * @var
     */
    protected $action = null;

    /**
     * pidOfAction
     *
     * @var
     */
    protected $pidOfAction = null;

    /**
     * Returns the email
     *
     * @return  $email
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
     * @return  $action
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
     * @return  $pidOfAction
     */
    public function getPidOfAction()
    {
        return $this->pidOfAction;
    }

    /**
     * Sets the pidOfAction
     *
     * @param string $pidOfAction
     * @return void
     */
    public function setPidOfAction($pidOfAction)
    {
        $this->pidOfAction = $pidOfAction;
    }
}
