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
     * Retorna os dados de um conteúdo pelo código.
     *
     * @param int $code
     *
     * @return Entities\Content|null
     */
    public function get($code)
    {
        $result = $this->get('modContent/content', array(
            'code' => $code
        ));

        if (isset($result->status) && 1 === (int) $result->status
            && isset($result->conteudo) && !empty($result->conteudo)) {
            $this->total = 1;

            $content = new \MadeApp\Entities\Content();
            $content->setCode($result->conteudo->codigo);
            $content->setCategoryCode($result->conteudo->categoria);
            $content->setCategoryName($result->conteudo->categoria_nome);
            $content->setUserCode($result->conteudo->usuario);
            $content->setUserName($result->conteudo->usuario_nome);
            $content->setUserPhoto($result->conteudo->usuario_foto);
            $content->setTitle($result->conteudo->titulo);
            $content->setText($result->conteudo->texto);
            $content->setKeywords($result->conteudo->keywords);
            $content->setVideo($result->conteudo->video);
            $content->setAttachment($result->conteudo->anexo);
            $content->setSourceName($result->conteudo->fonte_nome);
            $content->setSourceLink($result->conteudo->fonte_url);
            $content->setFeature($result->conteudo->destaque);
            $content->setActive($result->conteudo->ativo);
            $content->setDate($result->conteudo->data_cadastro);

            foreach ($result->conteudo->galeria as $img) {
                $image = new \MadeApp\Entities\ImageGallery();
                $image->setCode($img->codigo);
                $image->setDescription($img->descricao);
                $image->setUrl($img->url);
                $image->setDate($img->data_envio);
                $image->setFeature($img->destaque);
                $image->setActive($img->status);

                $content->addImageGallery($image);
            }

            return $content;
        }

        /* Total setado para 0 */
        $this->total = 0;

        return null;
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

    /**
     * Retorna todos os conteúdos da categoria informada.
     *
     * Para buscar conteúdos de mais de uma categoria, use o parâmetro $combinedCategories
     * utilizando o caractere "|" para separá-las.
     *      Ex.: 4|8|18|30
     *
     * Para buscar conteúdos de categorias combinadas é necessário que o parâmetro $category
     * seja NULL.
     *
     * @param int    $category
     * @param string $combinedCategories
     * @param string $order
     * @param int    $limit
     * @param int    $offset
     *
     * @return array
     */
    public function allByCategory($category = null, $combinedCategories = null, $order = '3', $limit = null, $offset = null)
    {
        $result = $this->get('modContent/contents', array(
            'category'          => $category,
            'combineCategories' => $combinedCategories,
            'order'             => $order,
            'limit'             => $limit,
            'offset'            => $offset
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