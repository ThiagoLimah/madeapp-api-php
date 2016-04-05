<?php namespace MadeApp\Helpers;

/**
 * Class Paginator
 *
 * Helper responsável pela criação de uma simples paginação.
 *
 * @package MadeApp\Helpers
 * @author Thiago A. de Lima <thiagolimaes@gmail.com>
 * @version 1.0
 */
class Paginator
{
    /**
     * @var int
     */
    public $total;

    /**
     * @var int
     */
    public $limit;

    /**
     * @var int
     */
    public $offset;

    /**
     * @var int
     */
    public $page;

    /**
     * @var int
     */
    public $previousPageNumber;

    /**
     * @var int
     */
    public $nextPageNumber;

    /**
     * @var int
     */
    public $pageTotal;

    /**
     * @var int
     */
    public $firstCurrent;

    /**
     * @var int
     */
    public $lastCurrent;

    /**
     * @var int|false
     */
    public $previousPage;

    /**
     * @var int|false
     */
    public $nextPage;

    /**
     * @var int
     */
    public $firstPage;

    /**
     * @var int
     */
    public $lastPage;

    /**
     * @var string
     */
    public $url;

    /**
     * Monta o HTML para os botões da paginação.
     *
     * @return string
     */
    public function html()
    {
        $html = '<ul class="pagination">';

        /* Sanitize */
        $this->url = urldecode( $this->url );

        /* Verifico o ? na url */
        if ( strpos( $this->url, '?' ) === false ) {
            $this->url .= '?';
        }

        /* Adiciono link para a primeira página */
        $html .= '<li><a href="'.( $this->page == 1 ? 'javascript:;' : $this->url.'&page=1' ).'" class="paginator-first-page"><i class="fa fa-angle-double-left"></i></a></li>';

        /* Adiciono link para a página anterior */
        $html .= '<li><a href="'.( ( $this->page - 1 ) < 1 ? 'javascript:;' : $this->url.'&page='.( $this->page - 1 ) ).'" class="paginator-previous-page"><i class="fa fa-angle-left"></i></a></li>';

        for ( $i = 3; $i >= 1; $i-- ) {
            if ( ( $this->page - $i ) >= 1 ) {
                $html .= '<li><a href="'.( $this->url.'&page='.( $this->page - $i ) ).'" class="paginator-simple-page">'.( $this->page - $i ).'</a></li>';
            }
        }

        /* Página atual */
        $html .= '<li class="active"><a href="javascript:;" class="paginator-current current">'.$this->page.'</a></li>';

        for ( $i = 1; $i <= 3; $i++ ) {
            if ( ( $this->page + $i ) <= $this->pageTotal ) {
                $html .= '<li><a href="'.( $this->url.'&page='.( $this->page + $i ) ).'" class="paginator-simple-page">'.( $this->page + $i ).'</a></li>';
            }
        }

        /* Adiciono link para a próxima página */
        $html .= '<li><a href="'.( ( $this->page + 1 ) > $this->pageTotal ? 'javascript:;' : $this->url.'&page='.( $this->page + 1 ) ).'" class="paginator-next-page"><i class="fa fa-angle-right"></i></a></li>';

        /* Adiciono link para a última página */
        $html .= '<li><a href="'.( $this->page == $this->pageTotal ? 'javascript:;' : $this->url.'&page='.$this->pageTotal ).'" class="paginator-last-page"><i class="fa fa-angle-double-right"></i></a></li>';

        /* Sanitize */
        $html .= '</ul>';
        $html  = str_replace( '?&', '?', $html );

        return $html;
    }

    /**
     * Realiza os cálculos necessários para o sistema de paginação.
     */
    public function prepare()
    {
        $this->pageTotal          = (int) ceil( $this->total / $this->limit );
        $this->page               = (int) min( max( 1, $this->page ), max( 1, $this->total ) );
        $this->firstCurrent       = (int) min( ( ( $this->page - 1 ) * $this->limit ) + 1, $this->total );
        $this->lastCurrent        = (int) min( $this->firstCurrent + $this->limit - 1, $this->total );

        $this->previousPage       = ( $this->page > 1) ? $this->page - 1 : false;
        $this->nextPage           = ( $this->page < $this->pageTotal ) ? $this->page + 1 : false;

        $this->firstPage          = ( $this->page === 1 ) ? false : 1;
        $this->lastPage           = ( $this->page >= $this->pageTotal ) ? false : $this->pageTotal;

        $this->previousPageNumber = ( ( $this->page - 1 ) >= 1 ) ? $this->page - 1 : false;
        $this->nextPageNumber     = ( ( $this->page + 1 ) <= $this->pageTotal ) ? $this->page + 1 : false;

        $this->offset             = (int) ( ( $this->page - 1 ) * $this->limit );
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param int $page
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param int $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }
}