<?php

namespace GP\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="GP\PlatformBundle\Repository\MessageRepository")
 */
class Message
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="user_name", type="string", length=255)
     */
    private $userName;

    /**
     * @var string
     *
     * @ORM\Column(name="user_email", type="string", length=255)
     */
    private $userEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=255)
     */
    private $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="user_message", type="string", length=1000)
     */
    private $userMessage;

    /**
     * @var string
     *
     * @ORM\Column(name="message_response", type="string", length=1000, nullable = true)
     */
    private $messageResponse;

    /**
     * @var string
     *
     * @ORM\Column(name="message_response_by", type="string", length=255, nullable = true)
     */
    private $messageResponseBy;

    /**
     * @ORM\Column(name="is_read", type="boolean")
     */
    private $isRead = false;

    /**
     * @ORM\Column(name="is_reply", type="boolean")
     */
    private $isReply = false;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="send_at", type="datetime")
     */
    private $sendAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="reply_at", type="datetime", nullable =true)
     */
    private $replyAt;

    public function __construct()
    {
      $this->sendAt = new \Datetime();
    }


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userName.
     *
     * @param string $userName
     *
     * @return Message
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get userName.
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set userEmail.
     *
     * @param string $userEmail
     *
     * @return Message
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;

        return $this;
    }

    /**
     * Get userEmail.
     *
     * @return string
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * Set subject.
     *
     * @param string $subject
     *
     * @return Message
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject.
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set userMessage.
     *
     * @param string $userMessage
     *
     * @return Message
     */
    public function setUserMessage($userMessage)
    {
        $this->userMessage = $userMessage;

        return $this;
    }

    /**
     * Get userMessage.
     *
     * @return string
     */
    public function getUserMessage()
    {
        return $this->userMessage;
    }



    /**
     * Set isRead.
     *
     * @param bool $isRead
     *
     * @return Message
     */
    public function setIsRead($isRead)
    {
        $this->isRead = $isRead;

        return $this;
    }

    /**
     * Get isRead.
     *
     * @return bool
     */
    public function getIsRead()
    {
        return $this->isRead;
    }

    /**
     * Set isReply.
     *
     * @param bool $isReply
     *
     * @return Message
     */
    public function setIsReply($isReply)
    {
        $this->isReply = $isReply;

        return $this;
    }

    /**
     * Get isReply.
     *
     * @return bool
     */
    public function getIsReply()
    {
        return $this->isReply;
    }

    /**
     * Set messageResponse.
     *
     * @param string|null $messageResponse
     *
     * @return Message
     */
    public function setMessageResponse($messageResponse = null)
    {
        $this->messageResponse = $messageResponse;

        return $this;
    }

    /**
     * Get messageResponse.
     *
     * @return string|null
     */
    public function getMessageResponse()
    {
        return $this->messageResponse;
    }

    /**
     * Set messageResponseBy.
     *
     * @param string|null $messageResponseBy
     *
     * @return Message
     */
    public function setMessageResponseBy($messageResponseBy = null)
    {
        $this->messageResponseBy = $messageResponseBy;

        return $this;
    }

    /**
     * Get messageResponseBy.
     *
     * @return string|null
     */
    public function getMessageResponseBy()
    {
        return $this->messageResponseBy;
    }

    /**
     * Set sendAt.
     *
     * @param \DateTime $sendAt
     *
     * @return Message
     */
    public function setSendAt($sendAt)
    {
        $this->sendAt = $sendAt;

        return $this;
    }

    /**
     * Get sendAt.
     *
     * @return \DateTime
     */
    public function getSendAt()
    {
        return $this->sendAt;
    }

    /**
     * Set replyAt.
     *
     * @param \DateTime|null $replyAt
     *
     * @return Message
     */
    public function setReplyAt($replyAt = null)
    {
        $this->replyAt = $replyAt;

        return $this;
    }

    /**
     * Get replyAt.
     *
     * @return \DateTime|null
     */
    public function getReplyAt()
    {
        return $this->replyAt;
    }
}
