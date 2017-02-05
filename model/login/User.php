<?php

/**
 * Created by PhpStorm.
 * User: eliamyro
 * Date: 11/12/16
 * Time: 6:19 μμ
 */
class User
{
    private $userId;
    private $firstName;
    private $lastName;
    private $username;
    private $password;
    private $address;
    private $email;
    private $accountType;
    private $telephone;
    private $userPhoto;
    private $isActive;
    private $emailCode;

    /**
     * User constructor.
     * @param $userId - the user id
     * @param $firstName - the first name of the user
     * @param $lastName - the last name of the user
     * @param $username - the user's username
     * @param $password - the password
     * @param $email    - the user's email
     * @param $accountType - type of account (0 for petter, 1 for getter, 2 for both)
     * @param $address - user's address
     * @param $telephone    - the telephone
     * @param $userPhoto    - photo of the user
     * @param $isActive    - whether the user has activated the account
     * @param $emailCode    - email code for verification
     */
    public function __construct($userId, $firstName, $lastName, $username, $password, $email, $accountType,$address, $telephone, $userPhoto, $isActive, $emailCode)
    {
        $this->userId = $userId;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->accountType = $accountType;
        $this->address = $address;
        $this->telephone = $telephone;
        $this->userPhoto = $userPhoto;
        $this->isActive = $isActive;
        $this->emailCode = $emailCode;
    }

    /**
     * @return int userId
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return String firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param String $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return String lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param String $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return String username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param String $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return String password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param String $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return String email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param String $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return int accountType
     */
    public function getAccountType()
    {
        return $this->accountType;
    }

    /**
     * @param int $accountType
     */
    public function setAccountType($accountType)
    {
        $this->accountType = $accountType;
    }

    /**
     * @return String telephone
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param String $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return mixed userPhoto
     */
    public function getUserPhoto()
    {
        return $this->userPhoto;
    }

    /**
     * @param mixed $userPhoto
     */
    public function setUserPhoto($userPhoto)
    {
        $this->userPhoto = $userPhoto;
    }

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    public function getAccountTypeString()
    {
        switch ($this->accountType){
            case 0:
                return "Petter";
            case 1:
                return "Getter";
            case 2:
                return "Both Petter and Getter";
        }
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }



}