<?php namespace MadeApp\Entities;

/**
 * Class Gallery
 *
 * Classe para representar a entidade Galeria.
 *
 * @package MadeApp\Entities
 * @author Thiago A. de Lima <thiagolimaes@gmail.com>
 * @version 1.0
 */
class Gallery
{
    /**
     * Código
     * @var int
     */
    private $code;

    /**
     * Nome da galeria
     * @var string
     */
    private $title;

    /**
     * Descrição da galeria
     * @var string
     */
    private $description;

    /**
     * Data da criação
     * @var date
     */
    private $date;

    /**
     * Imagens da Galeria
     * @var array<\MadeApp\Entities\ImageGallery>
     */
    private $gallery = array();

    /**
     * Código da galeria
     * @var int
     */
    private $categoryCode;

    /**
     * Nome da galeria
     * @var string
     */
    private $categoryName;

    /**
     * Código do autor
     * @var int
     */
    private $userCode;

    /**
     * Nome do autor
     * @var string
     */
    private $userName;

    /**
     * Link da foto do autor
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = stripslashes($description);
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
    public function getUserCode()
    {
        return $this->userCode;
    }

    /**
     * @param int $userCode
     */
    public function setUserCode($userCode)
    {
        $this->userCode = $userCode;
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
        $this->userName = $userName;
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
        $this->userPhoto = $userPhoto;
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
        $this->categoryCode = $categoryCode;
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
        $this->categoryName = $categoryName;
    }

    /**
     * @return array
     */
    public function getGallery()
    {
        return $this->gallery;
    }

    /**
     * Adiciona uma imagem a galeria da galeria.
     *
     * @param ImageGallery $image
     */
    public function addImageGallery(\MadeApp\Entities\ImageGallery $image)
    {
        $this->gallery[] = $image;
    }
}