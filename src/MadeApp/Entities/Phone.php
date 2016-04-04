<?php namespace MadeApp\Entities;

/**
 * Class Phone
 *
 * Classe para representar a entidade Telefone.
 *
 * @package MadeApp\Entities
 * @author Thiago A. de Lima <thiagolimaes@gmail.com>
 * @version 1.0
 */
class Phone
{
    /**
     * Código
     * @var int
     */
    private $code;

    /**
     * Número
     * @var string
     */
    private $number;

    /**
     * Contato
     * @var string
     */
    private $contact;

    /**
     * Observações
     * @var string
     */
    private $obs;

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
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber($number)
    {
        $this->number = stripslashes($number);
    }

    /**
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param string $contact
     */
    public function setContact($contact)
    {
        $this->contact = stripslashes($contact);
    }

    /**
     * @return string
     */
    public function getObs()
    {
        return $this->obs;
    }

    /**
     * @param string $obs
     */
    public function setObs($obs)
    {
        $this->obs = stripslashes($obs);
    }
}