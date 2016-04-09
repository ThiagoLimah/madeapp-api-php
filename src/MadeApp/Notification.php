<?php namespace MadeApp;

use Illuminate\Support\Facades\Mail;

/**
 * Class Notification
 *
 * Responsável por enviar notificações ao sistema MadeApp.
 *
 * @package MadeApp
 * @author Thiago A. de Lima <thiagolimaes@gmail.com>
 * @version 1.0
 */
class Notification extends Helper
{
    /**
     * @var string
     */
    protected $wsURI = 'http://api.madeapp.net/ws-v1';

    /**
     * @var array
     */
    private $data = array(
        'origin'      => '',
        'title'       => '',
        'description' => '',
        'icon'        => '',
        'link'        => ''
    );

    /**
     * Notification constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Envia a notificação para o MadeApp.
     *
     * @return bool
     */
    public function send()
    {
        if (!empty( $this->data['title'] ) && !empty( $this->data['description'])) {
            $result = $this->post('notifications/transport', $this->data);

            if (isset($result->result->flag)) {
                if ((bool) $result->result->flag) {
                    $this->clearFields();

                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Limpa os parâmetros para uma nova notificação.
     */
    private function clearFields()
    {
        $this->data = array(
            'origin'      => '',
            'title'       => '',
            'description' => '',
            'icon'        => '',
            'link'        => ''
        );
    }

    /**
     * Seta a origem da notificação.
     *
     * Ex.:
     *      website
     *
     * @param string $str
     */
    public function setOrigin( $str )
    {
        $this->data['origin'] = $str;
    }

    /**
     * Seta o título da notificação.
     *
     * @param string $str
     */
    public function setTitle( $str )
    {
        $this->data['title'] = $str;
    }

    /**
     * Seta a descrição/texto da notificação.
     *
     * @param string $str
     */
    public function setDescription( $str )
    {
        $this->data['description'] = $str;
    }

    /**
     * Seta o ícone da notificação.
     * Usar icones do pack fontawesome.
     *
     * @param string $str
     */
    public function setIcon( $str )
    {
        $this->data['icon'] = $str;
    }

    /**
     * Seta o link da notificação.
     *
     * @param string $str
     */
    public function setLink( $str )
    {
        $this->data['link'] = $str;
    }

    /**
     * Envia um e-mail notificação a empresa sobre esta nova notificação.
     * Usa a view emails.theme-api-notify como tema do e-mail.
     *
     * @param string $companyName
     * @param string $companyEmail
     */
    public function notify($companyName, $companyEmail)
    {
        Mail::send('emails.theme-api-notify', [], function($message) use ($companyName, $companyEmail){
            $message->to($companyEmail, $companyName)
                    ->from('noreply.madeapp@gmail.com', 'MadeApp Notificações')
                    ->subject('MadeApp | Nova Notificação');
        });
    }
}