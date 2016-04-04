<?php namespace MadeApp;

/**
 * Class Company
 *
 * Responsável por buscar as informações básicas da empresa.
 *
 * @package MadeApp
 * @author Thiago A. de Lima <thiagolimaes@gmail.com>
 * @version 1.0
 */
class Company extends Helper
{
    /**
     * Company constructor.
     *
     * @param string $token
     */
    public function __construct($token = null)
    {
        parent::__construct($token);
    }

    /**
     * Recupera as informações básicas da empresa.
     *
     * @return Entities\Company
     *
     * @throws \Exception
     */
    public function info()
    {
        $response = $this->get("company/details");

        if (1 === (int) $response->status) {
            $company = new \MadeApp\Entities\Company();



            return $company;
        }
        else {
            throw new \Exception("");
        }
    }
}