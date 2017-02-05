<?php

/**
 * Created by PhpStorm.
 * User: A. Michailidis
 * Date: 10/12/2016
 * Time: 8:55 μμ
 */
class PetDetails
{

    private $id;
    private $userId;
    private $petType;
    private $petBreed;
    private $age;
    private $advertType;
    private $advertDetails;
    private $petPicture;
    private $time;
    private $dueTime;

    /**
     * PetDetails constructor.
     * @param $id
     * @param $userId
     * @param $petType
     * @param $petBreed
     * @param $age
     * @param $advertType
     * @param $advertDetails
     * @param $petPicture
     * @param $time
     * @param $dueTime
     */
    public function __construct($id, $userId, $petType, $petBreed, $age, $advertType, $advertDetails, $petPicture, $time, $dueTime)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->petType = $petType;
        $this->petBreed = $petBreed;
        $this->age = $age;
        $this->advertType = $advertType;
        $this->advertDetails = $advertDetails;
        $this->petPicture = $petPicture;
        $this->time = $time;
        $this->dueTime = $dueTime;
    }


    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getPetType()
    {
        return $this->petType;
    }

    /**
     * @param mixed $petType
     */
    public function setPetType($petType)
    {
        $this->petType = $petType;
    }

    /**
     * @return mixed
     */
    public function getAdvertType()
    {
        return $this->advertType;
    }

    /**
     * @param mixed $advertType
     */
    public function setAdvertType($advertType)
    {
        $this->advertType = $advertType;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @return mixed
     */
    public function getDueTime()
    {
        return $this->dueTime;
    }

    /**
     * @param mixed $dueTime
     */
    public function setDueTime($dueTime)
    {
        $this->dueTime = $dueTime;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPetBreed()
    {
        return $this->petBreed;
    }

    /**
     * @param mixed $petBreed
     */
    public function setPetBreed($petBreed)
    {
        $this->petBreed = $petBreed;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getAdvertDetails()
    {
        return $this->advertDetails;
    }

    /**
     * @param mixed $advertDetails
     */
    public function setAdvertDetails($advertDetails)
    {
        $this->advertDetails = $advertDetails;
    }

    /**
     * @return mixed
     */
    public function getPetPicture()
    {
        return $this->petPicture;
    }

    /**
     * @param mixed $petPicture
     */
    public function setPetPicture($petPicture)
    {
        $this->petPicture = $petPicture;
    }


}

?>