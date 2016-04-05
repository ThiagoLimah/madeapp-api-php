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
     * Converte o encoding de uma string para UTF-8.
     *
     * @param string $str
     *
     * @return string
     */
    public static function toUTF8($str)
    {
        return mb_convert_encoding((string) $str, 'UTF-8', mb_list_encodings());
    }
}