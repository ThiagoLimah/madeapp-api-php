<?php namespace MadeApp\Entities;

/**
 * Class Event
 *
 * Classe para representar a entidade Evento.
 *
 * @package MadeApp\Entities
 * @author Thiago A. de Lima <thiagolimaes@gmail.com>
 * @version 1.0
 */
class Event
{
    /**
     * Código
     * @var int
     */
    private $code;

    /**
     * Título
     * @var string
     */
    private $title;

    /**
     * Texto
     * @var string
     */
    private $text;

    /**
     * Local do Evento
     * @var string
     */
    private $place;

    /**
     * Data do Evento
     * @var date
     */
    private $date;

    /**
     * Video
     * @var string
     */
    private $video;

    /**
     * Anexo
     * @var string
     */
    private $attachment;

    /**
     * Link do Evento no Facebook
     * @var string
     */
    private $facebookEvent;

    /**
     * Link do Canal do Evento no Youtube
     * @var string
     */
    private $youtubeChannel;

    /**
     * Status
     * @var bool
     */
    private $active;

    /**
     * Data de Criação
     * @var date
     */
    private $createdAt;

    /**
     * Galeria do Evento
     * @var array<\MadeApp\Entities\ImageGallery>
     */
    private $gallery;

    /**
     * Código da Sessão da Categoria
     * @var int
     */
    private $sessionCode;

    /**
     * Nome da Sessão da Categoria
     * @var string
     */
    private $sessionName;

    /**
     * Código da Categoria
     * @var int
     */
    private $categoryCode;

    /**
     * Nome da Categoria
     * @var string
     */
    private $categoryName;

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param int $code
     */
    public function setCode($code)
    {
        $this->code = (int) $code;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = stripslashes($title);
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = stripslashes($text);
    }

    /**
     * @return string
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param string $place
     */
    public function setPlace($place)
    {
        $this->place = stripslashes($place);
    }

    /**
     * @return date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param date $date
     */
    public function setDate($date)
    {
        $this->date = stripslashes($date);
    }

    /**
     * @return string
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * @param string $video
     */
    public function setVideo($video)
    {
        $this->video = stripslashes($video);
    }

    /**
     * @return string
     */
    public function getAttachment()
    {
        return $this->attachment;
    }

    /**
     * @param string $attachment
     */
    public function setAttachment($attachment)
    {
        $this->attachment = stripslashes($attachment);
    }

    /**
     * @return string
     */
    public function getFacebookEvent()
    {
        return $this->facebookEvent;
    }

    /**
     * @param string $facebookEvent
     */
    public function setFacebookEvent($facebookEvent)
    {
        $this->facebookEvent = stripslashes($facebookEvent);
    }

    /**
     * @return string
     */
    public function getYoutubeChannel()
    {
        return $this->youtubeChannel;
    }

    /**
     * @param string $youtubeChannel
     */
    public function setYoutubeChannel($youtubeChannel)
    {
        $this->youtubeChannel = stripslashes($youtubeChannel);
    }

    /**
     * @return boolean
     */
    public function isActive()
    {
        return (bool) $this->active;
    }

    /**
     * @param boolean $active
     */
    public function setActive($active)
    {
        $this->active = (bool) $active;
    }

    /**
     * @return date
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param date $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = stripslashes($createdAt);
    }

    /**
     * @return array
     */
    public function getGallery()
    {
        return $this->gallery;
    }

    /**
     * @param \MadeApp\Entities\ImageGallery $gallery
     */
    public function setGallery(\MadeApp\Entities\ImageGallery $gallery)
    {
        $this->gallery[] = $gallery;
    }

    /**
     * @return int
     */
    public function getSessionCode()
    {
        return $this->sessionCode;
    }

    /**
     * @param int $sessionCode
     */
    public function setSessionCode($sessionCode)
    {
        $this->sessionCode = (int) $sessionCode;
    }

    /**
     * @return string
     */
    public function getSessionName()
    {
        return $this->sessionName;
    }

    /**
     * @param string $sessionName
     */
    public function setSessionName($sessionName)
    {
        $this->sessionName = stripslashes($sessionName);
    }

    /**
     * @return int
     */
    public function getCategoryCode()
    {
        return $this->categoryCode;
    }

    /**
     * @param int $categoryCode
     */
    public function setCategoryCode($categoryCode)
    {
        $this->categoryCode = (int) $categoryCode;
    }

    /**
     * @return string
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * @param string $categoryName
     */
    public function setCategoryName($categoryName)
    {
        $this->categoryName = stripslashes($categoryName);
    }
}