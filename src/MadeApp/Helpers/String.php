<?php namespace MadeApp\Helpers;

/**
 * Class Strings
 *
 * Helper para manipulação de strings.
 *
 * @package MadeApp\Helpers
 * @author Thiago A. de Lima <thiagolimaes@gmail.com>
 * @version 1.0
 */
class Strings
{
    /**
     * @param string $str
     *
     * @return string
     */
    public static function Sanitize($str)
    {
        return filter_var($str, FILTER_SANITIZE_STRING);
    }

    /**
     * @param string $str
     *
     * @return string
     */
    public static function reSanitize($str)
    {
        return stripslashes(mb_convert_encoding(utf8_encode($str), "UTF-8", "HTML-ENTITIES"));
    }

    /**
     * Retorna a string cortada nas posições solicitadas.
     *
     * @param string $str
     * @param int    $start
     * @param int    $limit
     *
     * @return string
     */
    public static function SubStr($str, $start, $limit)
    {
        $str = self::reSanitize($str);

        return mb_substr(self::toUTF8($str), $start, $limit, "UTF-8");
    }

    /**
     * Limpa a string informada removendo todos os acentos.
     *
     * @link http://blog.thiagobelem.net/removendo-acentos-de-uma-string-urls-amigaveis
     *
     * @param string $str
     * @param string $slug
     *
     * @return string
     */
    public static function CleanString($str, $slug = false)
    {
        $str = \Illuminate\Support\Str::lower($str);

        /* Códigos de substituição */
        $codes      = array();
        $codes['a'] = array('à', 'á', 'ã', 'â', 'ä');
        $codes['e'] = array('è', 'é', 'ê', 'ë');
        $codes['i'] = array('ì', 'í', 'î', 'ï');
        $codes['o'] = array('ò', 'ó', 'õ', 'ô', 'ö');
        $codes['u'] = array('ù', 'ú', 'û', 'ü');
        $codes['c'] = array('ç');
        $codes['n'] = array('ñ');
        $codes['y'] = array('ý', 'ÿ');

        /* Substituo os caracteres da string */
        foreach ($codes as $key => $values) {
            $str = str_replace($values, $key, $str);
        }

        if ($slug) {
            /* Troca tudo que não for letra ou número por um caractere ($slug) */
            $str = preg_replace("/[^a-z0-9]/i", $slug, $str);

            /* Tira os caracteres ($slug) repetidos */
            $str = preg_replace("/" . $slug . "{2,}/i", $slug, $str);

            /* Remove os caracteres ($slug) do início/fim da string */
            $str = trim($str, $slug);
        }

        return $str;
    }

    /**
     * Converte o encoding de uma string para UTF-8.
     *
     * @param string $str
     *
     * @return string
     */
    public static function toUTF8($str)
    {
        return mb_convert_encoding((string) $str, "UTF-8", mb_list_encodings());
    }

    /**
     * Converte a string informada para caixa baixa.
     *
     * @param string $str
     *
     * @return string
     */
    public static function toLowerCase($str)
    {
        return mb_strtolower($str, "UTF-8");
    }

    /**
     * Converte a string informada para caixa alta.
     *
     * @param string $str
     *
     * @return string
     */
    public static function toUpperCase($str)
    {
        $str = self::reSanitize($str);

        return mb_strtoupper(self::toUTF8($str), "UTF-8");
    }
}