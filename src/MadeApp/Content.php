<?php namespace MadeApp;

/**
 * Class Company
 *
 * Responsável por buscar as informações do módulo conteúdo.
 *
 * @package MadeApp
 * @author Thiago A. de Lima <thiagolimaes@gmail.com>
 * @version 1.0
 */
class Content extends Helper
{
    /**
     * Total de registros na última consulta
     * @var int
     */
    public $total;

    /**
     * Content constructor.
     *
     * @param string $token
     */
    public function __construct($token = null)
    {
        parent::__construct($token);
    }

    /**
     * Retorna todos os conteúdos cadastrados no MadeApp.
     *
     * @param string $order
     * @param int    $limit
     * @param int    $offset
     *
     * @return array<\MadeApp\Entities\Content>
     */
    public function all($order = '3', $limit = null, $offset = null)
    {
        $result = $this->get('modContent/contents', array(
            'order'  => $order,
            'limit'  => $limit,
            'offset' => $offset
        ));

        if (isset($result->status) && 1 === (int) $result->status) {
            $this->total = (int) $result->total;
            $response    = array();

            foreach ($result->conteudos as $obj) {
                $content = new \MadeApp\Entities\Content();
                $content->setCode($obj->codigo);
                $content->setCategoryCode($obj->categoria);
                $content->setCategoryName($obj->categoria_nome);
                $content->setUserCode($obj->usuario);
                $content->setUserName($obj->usuario_nome);
                $content->setUserPhoto($obj->usuario_foto);
                $content->setTitle($obj->titulo);
                $content->setText($obj->texto);
                $content->setKeywords($obj->keywords);
                $content->setVideo($obj->video);
                $content->setAttachment($obj->anexo);
                $content->setSourceName($obj->fonte_nome);
                $content->setSourceLink($obj->fonte_url);
                $content->setFeature($obj->destaque);
                $content->setActive($obj->ativo);
                $content->setDate($obj->data_cadastro);

                foreach ($obj->galeria as $img) {
                    $image = new \MadeApp\Entities\ImageGallery();
                    $image->setCode($img->codigo);
                    $image->setDescription($img->descricao);
                    $image->setUrl($img->url);
                    $image->setDate($img->data_envio);
                    $image->setFeature($img->destaque);
                    $image->setActive($img->status);

                    $content->addImageGallery($image);
                }

                $response[] = $content;
            }

            return $response;
        }

        /* Total setado para 0 */
        $this->total = 0;

        return array();
    }
}