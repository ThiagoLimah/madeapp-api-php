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
            $company->setCode($response->company->codigo);
            $company->setType($response->company->especie);
            $company->setName($response->company->razao_social);
            $company->setSimpleName($response->company->nome_fantasia);
            $company->setCnpj($response->company->cnpj);
            $company->setDescription($response->company->descricao);
            $company->setKeywords($response->company->keywords);
            $company->setEmail($response->company->email);
            $company->setWebsite($response->company->website);
            $company->setLogo($response->company->logo_marca);
            $company->setVideo($response->company->video);
            $company->setFbFanPage($response->company->fb_fan_page);
            $company->setGoogleAnalytics($response->company->google_analytics);
            $company->setZopimCode($response->company->zopim_code);

            return $company;
        }
        else {
            throw new \Exception("");
        }
    }
}