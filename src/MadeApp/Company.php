<?php namespace MadeApp;

use MadeApp\Entities\Phone;

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

        if (isset($response->status) && 1 === (int) $response->status) {
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

            $company->setAddress(array(
                'street'        => stripslashes($response->company->endereco->logradouro),
                'number'        => stripslashes($response->company->endereco->numero),
                'complement'    => stripslashes($response->company->endereco->complemento),
                'zipcode'       => stripslashes($response->company->endereco->cep),
                'district'      => stripslashes($response->company->endereco->bairro),
                'city'          => stripslashes($response->company->endereco->cidade),
                'state'         => stripslashes($response->company->endereco->uf),
                'stateInitials' => stripslashes($response->company->endereco->uf_sigla),
                'lat'           => stripslashes($response->company->endereco->geolocation->lat),
                'lng'           => stripslashes($response->company->endereco->geolocation->lng)
            ));

            foreach ($response->telefones as $obj) {
                $phone = new Phone();
                $phone->setCode($obj->codigo);
                $phone->setNumber($obj->numero);
                $phone->setContact($obj->contato);
                $phone->setObs($obj->obs);

                $company->addPhone($phone);
            }

            return $company;
        }
        else {
            throw new \Exception("The data of the company could not be found.");
        }
    }
}