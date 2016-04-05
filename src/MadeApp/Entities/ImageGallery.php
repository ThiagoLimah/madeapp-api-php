<?php namespace MadeApp\Entities;

/**
 * Class ImageGallery
 *
 * Classe para representar a entidade Imagem.
 *
 * @package MadeApp\Entities
 * @author Thiago A. de Lima <thiagolimaes@gmail.com>
 * @version 1.0
 */
class ImageGallery
{
    /**
     * Código
     * @var int
     */
    private $code;

    /**
     * Descrição
     * @var string
     */
    private $description;

    /**
     * Url
     * @var string
     */
    private $url;

    /**
     * Data de Cadastro
     * @var date
     */
    private $date;

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
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = stripslashes($url);
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
}