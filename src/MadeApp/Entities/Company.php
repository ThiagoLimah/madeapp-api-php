<?php namespace MadeApp\Entities;

/**
 * Class Company
 *
 * Classe para representar a entidade Empresa.
 *
 * @package MadeApp\Entities
 * @author Thiago A. de Lima <thiagolimaes@gmail.com>
 * @version 1.0
 */
class Company
{
    /**
     * Código.
     * @var int
     */
    private $code;

    /**
     * Espécie
     * @var string
     */
    private $type;

    /**
     * CNPJ
     * @var string
     */
    private $cnpj;

    /**
     * Razão Social
     * @var string
     */
    private $name;

    /**
     * Nome Fantasia
     * @var string
     */
    private $simpleName;

    /**
     * Descrição
     * @var string
     */
    private $description;

    /**
     * E-mail
     * @var string
     */
    private $email;

    /**
     * Website
     * @var string
     */
    private $website;

    /**
     * Palavras Chaves
     * @var string
     */
    private $keywords;

    /**
     * Logo
     * @var string
     */
    private $logo;

    /**
     * Video
     * @var string
     */
    private $video;

    /**
     * Endereço
     * @var array
     */
    private $address = array(
        'street'        => '',
        'number'        => '',
        'complement'    => '',
        'zipcode'       => '',
        'district'      => '',
        'city'          => '',
        'state'         => '',
        'stateInitials' => '',
        'lat'           => '',
        'lng'           => ''
    );

    /**
     * Telefones
     * @var array<\MadeApp\Entities\Phone>
     */
    private $phones = array();

    /**
     * Fan Page do Facebook
     * @var string
     */
    private $fbFanPage;

    /**
     * Código do Google Analytics
     * @var string
     */
    private $googleAnalytics;

    /**
     * Código do Zopim
     * @var string
     */
    private $zopimCode;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = stripslashes($name);
    }

    /**
     * @return string
     */
    public function getSimpleName()
    {
        return $this->simpleName;
    }

    /**
     * @param string $simpleName
     */
    public function setSimpleName($simpleName)
    {
        $this->simpleName = stripslashes($simpleName);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = stripslashes($type);
    }

    /**
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     */
    public function setLogo($logo)
    {
        $this->logo = stripslashes($logo);
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
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * @param string $cnpj
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = stripslashes($cnpj);
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = stripslashes($email);
    }

    /**
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @param string $website
     */
    public function setWebsite($website)
    {
        $this->website = stripslashes($website);
    }

    /**
     * @return string
     */
    public function getFbFanPage()
    {
        return $this->fbFanPage;
    }

    /**
     * @param string $fbFanPage
     */
    public function setFbFanPage($fbFanPage)
    {
        $this->fbFanPage = stripslashes($fbFanPage);
    }

    /**
     * @return string
     */
    public function getGoogleAnalytics()
    {
        return $this->googleAnalytics;
    }

    /**
     * @param string $googleAnalytics
     */
    public function setGoogleAnalytics($googleAnalytics)
    {
        $this->googleAnalytics = stripslashes($googleAnalytics);
    }

    /**
     * @return string
     */
    public function getZopimCode()
    {
        return $this->zopimCode;
    }

    /**
     * @param string $zopimCode
     */
    public function setZopimCode($zopimCode)
    {
        $this->zopimCode = stripslashes($zopimCode);
    }

    /**
     * @return array
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param array $address
     */
    public function setAddress(array $address = array())
    {
        $this->address = $address;
    }

    /**
     * @return array
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * Adiciona um telefone na empresa.
     *
     * @param \MadeApp\Entities\Phone $phone
     */
    public function addPhone(\MadeApp\Entities\Phone $phone)
    {
        $this->phones[] = $phone;
    }
}