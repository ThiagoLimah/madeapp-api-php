<?php namespace MadeApp;

/**
 * Class Event
 *
 * Responsável por buscar as informações do módulo eventos.
 *
 * @package MadeApp
 * @author Thiago A. de Lima <thiagolimaes@gmail.com>
 * @version 1.0
 */
class Event extends Helper
{
    /**
     * @var string
     */
    protected $wsURI = 'http://api.madeapp.net/ws-v1';

    /**
     * Total de registros na última consulta
     * @var int
     */
    public $total;

    /**
     * Event constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Retorna os dados de um evento pelo código.
     *
     * @param int $code
     *
     * @return \MadeApp\Entities\Event
     */
    public function find($code)
    {
        $result = $this->get('modEvents/get', array(
            'code' => $code
        ));

        if (isset($result->status) && 1 === (int) $result->status && isset($result->result->content[0])) {
            $obj         = $result->result->content[0];
            $this->total = 1;

            $event = new \MadeApp\Entities\Event();
            $event->setCode($obj->code);
            $event->setTitle($obj->title);
            $event->setText($obj->description);
            $event->setPlace($obj->place);
            $event->setDate($obj->date);
            $event->setVideo($obj->video);
            $event->setAttachment($obj->attachment);
            $event->setFacebookEvent($obj->facebook);
            $event->setYoutubeChannel($obj->youtube_channel);
            $event->setActive($obj->active);
            $event->setCreatedAt($obj->created_at);
            $event->setSessionCode($obj->session_code);
            $event->setSessionName($obj->session_name);
            $event->setCategoryCode($obj->category_code);
            $event->setCategoryName($obj->category_name);

            foreach ($obj->gallery as $img) {
                $image = new \MadeApp\Entities\ImageGallery();
                $image->setCode($img->code);
                $image->setDescription($img->title);
                $image->setUrl($img->url);
                $image->setFeature($img->featured);
                $image->setActive($img->active);
                $image->setDate($img->date);

                $event->addImageGallery($image);
            }

            return $event;
        }

        /* Total setado para 0 */
        $this->total = 0;

        return null;
    }

    /**
     * Retorna todos os eventos cadastrados pela empresa.
     *
     * @param 0|1 $valid
     * @param int $order
     * @param int $limit
     * @param int $offset
     *
     * @return array<\MadeApp\Entities\Event>
     */
    public function all($valid = null, $order = null, $limit = null, $offset = null)
    {
        $options = array();

        if (!is_null($valid)) {
            $options['valid'] = $valid;
        }

        if (!is_null($order)) {
            $options['order'] = $order;
        }

        if (!is_null($limit)) {
            $options['limit'] = $limit;
        }

        if (!is_null($offset)) {
            $options['offset'] = $offset;
        }

        $result = $this->get('modEvents/get', $options);

        if (isset($result->status) && 1 === (int) $result->status) {
            $this->total = (int) $result->result->total;
            $response    = array();

            foreach ($result->result->content as $obj) {
                $event = new \MadeApp\Entities\Event();
                $event->setCode($obj->code);
                $event->setTitle($obj->title);
                $event->setText($obj->description);
                $event->setPlace($obj->place);
                $event->setDate($obj->date);
                $event->setVideo($obj->video);
                $event->setAttachment($obj->attachment);
                $event->setFacebookEvent($obj->facebook);
                $event->setYoutubeChannel($obj->youtube_channel);
                $event->setActive($obj->active);
                $event->setCreatedAt($obj->created_at);
                $event->setSessionCode($obj->session_code);
                $event->setSessionName($obj->session_name);
                $event->setCategoryCode($obj->category_code);
                $event->setCategoryName($obj->category_name);

                foreach ($obj->gallery as $img) {
                    $image = new \MadeApp\Entities\ImageGallery();
                    $image->setCode($img->code);
                    $image->setDescription($img->title);
                    $image->setUrl($img->url);
                    $image->setFeature($img->featured);
                    $image->setActive($img->active);
                    $image->setDate($img->date);

                    $event->addImageGallery($image);
                }

                $response[] = $event;
            }

            return $response;
        }

        /* Total setado para 0 */
        $this->total = 0;

        return array();
    }
}