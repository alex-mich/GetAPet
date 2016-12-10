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
    private $petBreed;
    private $age;
    private $isForSale;
    private $advertDetails;
    private $petPicture;

    /**
     * PetDetails constructor.
     * @param $id
     * @param $petBreed
     * @param $age
     * @param $isForSale
     * @param $advertDetails
     * @param $petPicture
     */
    public function __construct($id, $petBreed, $age, $isForSale, $advertDetails, $petPicture)
    {
        $this->id = $id;
        $this->petBreed = $petBreed;
        $this->age = $age;
        $this->isForSale = $isForSale;
        $this->advertDetails = $advertDetails;
        $this->petPicture = $petPicture;
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
    public function getIsForSale()
    {
        return $this->isForSale;
    }

    /**
     * @param mixed $isForSale
     */
    public function setIsForSale($isForSale)
    {
        $this->isForSale = $isForSale;
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