<?php namespace MadeApp;

/**
 * Class Gallery
 *
 * Responsável por buscar as informações do módulo galeria.
 *
 * @package MadeApp
 * @author Thiago A. de Lima <thiagolimaes@gmail.com>
 * @version 1.0
 */
class Gallery extends Helper
{
    /**
     * @var string
     */
    protected $uriServer = 'http://api.madeapp.net/ws-v1';

    /**
     * Total de registros na última consulta
     * @var int
     */
    public $total;

    /**
     * Gallery constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Retorna os dados de uma galeria pelo código.
     *
     * @param $code
     *
     * @return \MadeApp\Entities\Gallery
     */
    public function find($code)
    {
        $options           = array();
        $options['active'] = '1';
        $options['code']   = $code;

        $result = $this->get('modImageGallery/get', $options);

        if (isset($result->result->content[0])) {
            $this->total = 1;
            $obj         = $result->result->content[0];

            $gallery = new \MadeApp\Entities\Gallery();
            $gallery->setCode($obj->code);
            $gallery->setTitle($obj->name);
            $gallery->setDescription($obj->description);
            $gallery->setDate($obj->date);
            $gallery->setCategoryCode($obj->categorie_code);
            $gallery->setCategoryName($obj->categorie_name);
            $gallery->setUserCode($obj->user_code);
            $gallery->setUserName($obj->user_name);
            $gallery->setUserPhoto($obj->user_photo);

            foreach ($obj->images as $img) {
                $image = new \MadeApp\Entities\ImageGallery();
                $image->setCode($img->code);
                $image->setDescription($img->title);
                $image->setUrl($img->url);
                $image->setDate($img->date);
                $image->setFeature($img->featured);
                $image->setActive(true);

                $gallery->addImageGallery($image);
            }

            return $gallery;
        }

        /* Total setado para 0 */
        $this->total = 0;

        return null;
    }

    /**
     * Retorna todas as galerias cadastradas no MadeApp.
     *
     * @param int $category
     * @param int $limit
     * @param int $offset
     *
     * @return array<\MadeApp\Entities\Gallery>
     */
    public function all($category = null, $limit = null, $offset = null)
    {
        $options           = array();
        $options['active'] = '1';
        $options['order']  = '2';

        if (!is_null($category)) {
            $options['categorie'] = $category;
        }

        if (!is_null($limit)) {
            $options['limit'] = $limit;
        }

        if (!is_null($offset)) {
            $options['offset'] = $offset;
        }

        $result = $this->get('modImageGallery/get', $options);

        if (isset($result->status) && 1 === (int) $result->status) {
            $this->total = $result->result->total;
            $response    = array();

            foreach ($result->result->content as $obj) {
                $gallery = new \MadeApp\Entities\Gallery();
                $gallery->setCode($obj->code);
                $gallery->setTitle($obj->name);
                $gallery->setDescription($obj->description);
                $gallery->setDate($obj->date);
                $gallery->setCategoryCode($obj->categorie_code);
                $gallery->setCategoryName($obj->categorie_name);
                $gallery->setUserCode($obj->user_code);
                $gallery->setUserName($obj->user_name);
                $gallery->setUserPhoto($obj->user_photo);

                foreach ($obj->images as $img) {
                    $image = new \MadeApp\Entities\ImageGallery();
                    $image->setCode($img->code);
                    $image->setDescription($img->title);
                    $image->setUrl($img->url);
                    $image->setDate($img->date);
                    $image->setFeature($img->featured);
                    $image->setActive(true);

                    $gallery->addImageGallery($image);
                }

                $response[] = $gallery;
            }

            return $response;
        }

        /* Total setado para 0 */
        $this->total = 0;

        return array();
    }
}