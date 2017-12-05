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
     * firstName
     *
     * @var
     */
    protected $firstName = null;

    /**
     * lastName
     *
     * @var
     */
    protected $lastName = null;

    /**
     * action
     *
     * @var
     */
    protected $action = null;

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
     * Returns the firstName
     *
     * @return  $firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Sets the firstName
     *
     * @param string $firstName
     * @return void
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * Returns the lastName
     *
     * @return  $lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Sets the lastName
     *
     * @param string $lastName
     * @return void
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
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
}
