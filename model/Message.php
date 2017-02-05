<?php

/**
 * Created by PhpStorm.
 * User: A. Michailidis
 * Date: 5/2/2017
 * Time: 11:21 πμ
 */
class Message
{
    private $senderId;
    private $receiverId;
    private $messageSubject;
    private $messageBody;
    private $messageDate;

    /**
     * Message constructor.
     * @param $senderId
     * @param $receiverId
     * @param $messageSubject
     * @param $messageBody
     * @param $messageDate
     */
    public function __construct($senderId, $receiverId, $messageSubject, $messageBody, $messageDate)
    {
        $this->senderId = $senderId;
        $this->receiverId = $receiverId;
        $this->messageSubject = $messageSubject;
        $this->messageBody = $messageBody;
        $this->messageDate = $messageDate;
    }

    /**
     * @return mixed
     */
    public function getSenderId()
    {
        return $this->senderId;
    }

    /**
     * @param mixed $senderId
     */
    public function setSenderId($senderId)
    {
        $this->senderId = $senderId;
    }

    /**
     * @return mixed
     */
    public function getReceiverId()
    {
        return $this->receiverId;
    }

    /**
     * @param mixed $receiverId
     */
    public function setReceiverId($receiverId)
    {
        $this->receiverId = $receiverId;
    }

    /**
     * @return mixed
     */
    public function getMessageSubject()
    {
        return $this->messageSubject;
    }

    /**
     * @param mixed $messageSubject
     */
    public function setMessageSubject($messageSubject)
    {
        $this->messageSubject = $messageSubject;
    }

    /**
     * @return mixed
     */
    public function getMessageBody()
    {
        return $this->messageBody;
    }

    /**
     * @param mixed $messageBody
     */
    public function setMessageBody($messageBody)
    {
        $this->messageBody = $messageBody;
    }

    /**
     * @return mixed
     */
    public function getMessageDate()
    {
        return $this->messageDate;
    }

    /**
     * @param mixed $messageDate
     */
    public function setMessageDate($messageDate)
    {
        $this->messageDate = $messageDate;
    }

}