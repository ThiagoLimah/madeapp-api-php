<?php namespace MadeApp\Entities;

/**
 * Class Content
 *
 * Classe para representar a entidade Conteúdo.
 *
 * @package MadeApp\Entities
 * @author Thiago A. de Lima <thiagolimaes@gmail.com>
 * @version 1.0
 */
class Content
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
     * Palavras Chaves
     * @var string
     */
    private $keywords;

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
     * Nome da Fonte
     * @var string
     */
    private $sourceName;

    /**
     * Link da Fonte
     * @var string
     */
    private $sourceLink;

    /**
     * Destaque
     * @var bool
     */
    private $feature;

    /**
     * Ativo
     * @var bool
     */
    private $active;

    /**
     * Data de Cadastro
     * @var date
     */
    private $date;

    /**
     * Galerias do Conteúdo
     * @var array<\MadeApp\Entities\ImageGallery>
     */
    private $gallery = array();

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
     * Código do Autor
     * @var int
     */
    private $userCode;

    /**
     * Nome do Autor
     * @var string
     */
    private $userName;

    /**
     * Link da Foto do Usuário
     * @var string
     */
    private $userPhoto;

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
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param string $keywords
     */
    public function setKeywords($keywords)
    {
        $this->keywords = stripslashes($keywords);
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
    public function getSourceName()
    {
        return $this->sourceName;
    }

    /**
     * @param string $sourceName
     */
    public function setSourceName($sourceName)
    {
        $this->sourceName = stripslashes($sourceName);
    }

    /**
     * @return string
     */
    public function getSourceLink()
    {
        return $this->sourceLink;
    }

    /**
     * @param string $sourceLink
     */
    public function setSourceLink($sourceLink)
    {
        $this->sourceLink = stripslashes($sourceLink);
    }

    /**
     * @return boolean
     */
    public function isFeature()
    {
        return (bool) $this->feature;
    }

    /**
     * @param boolean $feature
     */
    public function setFeature($feature)
    {
        $this->feature = (bool) $feature;
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

    /**
     * @return int
     */
    public function getUserCode()
    {
        return $this->userCode;
    }

    /**
     * @param int $userCode
     */
    public function setUserCode($userCode)
    {
        $this->userCode = (int) $userCode;
    }

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     */
    public function setUserName($userName)
    {
        $this->userName = stripslashes($userName);
    }

    /**
     * @return string
     */
    public function getUserPhoto()
    {
        return $this->userPhoto;
    }

    /**
     * @param string $userPhoto
     */
    public function setUserPhoto($userPhoto)
    {
        $this->userPhoto = stripslashes($userPhoto);
    }

    /**
     * @return array
     */
    public function getGallery()
    {
        return (array) $this->gallery;
    }

    /**
     * Adiciona uma imagem a galeria do conteúdo.
     *
     * @param ImageGallery $image
     */
    public function addImageGallery(\MadeApp\Entities\ImageGallery $image)
    {
        $this->gallery[] = $image;
    }
}