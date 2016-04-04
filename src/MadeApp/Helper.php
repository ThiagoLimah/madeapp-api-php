<?php namespace MadeApp;

/**
 * Class Helper
 *
 * Responsável por realizar a conexão e obter os dados armazenados no
 * sistema MadeApp.
 *
 * @package MadeApp
 * @author Thiago A. de Lima <thiagolimaes@gmail.com>
 * @version 1.0
 */
class Helper
{
    /**
     * @var string
     */
    protected $wsURI = "http://api.madeapp.net/ws";

    /**
     * @var string
     */
    protected $clientToken;

    /**
     * Helper constructor.
     */
    public function __construct($token = null)
    {
        ini_set('MAX_EXECUTION_TIME', 300);
        set_time_limit(0);

        $this->setToken($token);
    }

    /**
     * Realiza uma chamada no webservice utilizando o método POST.
     *
     * @param string $endpoint
     * @param array  $parameters
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function post($endpoint, array $parameters = array())
    {
        return $this->call("POST", $endpoint, $parameters);
    }

    /**
     * Realiza uma chamada no webservice utilizando o método GET.
     *
     * @param string $endpoint
     * @param array  $parameters
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function get($endpoint, array $parameters = array())
    {
        return $this->call("GET", $endpoint, $parameters);
    }

    /**
     * Realiza uma chamada ao webservice do sistema MadeApp.
     *
     * @param string $method
     * @param string $endpoint
     * @param array  $parameters
     *
     * @return mixed
     *
     * @throws \Exception
     */
    protected function call($method = "POST", $endpoint, array $parameters = array())
    {
        /* URI da requisição com o endpoint */
        $requestURI = $this->wsURI . '/' . ltrim($endpoint, '/');

        /* Caso o token não venha nos parametros ele é adicionado */
        if (!array_key_exists("token", $parameters)) {
            $parameters["token"] = $this->_token();
        }

        if (strtoupper($method) === "GET") {
            $requestURI .= '?' . http_build_query($parameters);
        }

        /* Conexão com o webservice é criada */
        $cURL = curl_init();
        curl_setopt($cURL, CURLOPT_URL, $requestURI);

        if ("POST" === strtoupper($method)) {
            curl_setopt($cURL, CURLOPT_POST, true);
            curl_setopt($cURL, CURLOPT_POSTFIELDS, $parameters);
        }

        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURL, CURLOPT_HEADER, false);
        curl_setopt($cURL, CURLOPT_TIMEOUT, 0);

        /* Executa a conexão */
        $response     = curl_exec($cURL);
        $responseCode = curl_getinfo($cURL, CURLINFO_HTTP_CODE);

        /* Conexão encerrada */
        curl_close($cURL);

        if (200 === (int) $responseCode) {
            return json_decode($response);
        }
        else {
            throw new \Exception("MadeApp request failure. Request URI: " . $requestURI . " Request code: " . $responseCode . ".");
        }
    }

    /**
     * Retorna o token de acesso ao sistema MadeApp.
     * Caso o token não tenha sido setado, tenta buscar utilizando a função
     * env do laravel.
     *
     * @return string
     */
    private function _token()
    {
        if (!empty($this->clientToken)) {
            return $this->clientToken;
        }

        return env('MADEAPP_TOKEN', '');
    }

    /**
     * Seta o token de acesso na API.
     *
     * @param string $token
     */
    public function setToken($token = null)
    {
        if (!is_null($token)) {
            $this->clientToken = $token;
        }
    }
}