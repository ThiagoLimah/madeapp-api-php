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
     * @param string $str
     * @param string $slug
     *
     * @return string
     */
    public static function CleanString($str, $slug = false)
    {
        $str = self::toLowerCase($str);
        $str = utf8_decode($str);

        // Código ASCII das vogais
        $ascii['a'] = range(224, 230);
        $ascii['e'] = range(232, 235);
        $ascii['i'] = range(236, 239);
        $ascii['o'] = array_merge(range(242, 246), array(240, 248));
        $ascii['u'] = range(249, 252);

        // Código ASCII dos outros caracteres
        $ascii['b'] = array(223);
        $ascii['c'] = array(231);
        $ascii['d'] = array(208);
        $ascii['n'] = array(241);
        $ascii['y'] = array(253, 255);

        foreach ($ascii as $key => $item) {
            $accentuation = "";

            foreach ($item AS $code) {
                $accentuation .= chr($code);
            }

            $change[$key] = "/[{$accentuation}]/i";
        }

        $str = preg_replace(array_values($change), array_keys($change), $str);

        if ($slug) {
            /* Troca tudo que não for letra ou número por um caractere ($slug) */
            $str = preg_replace("/[^a-z0-9]/i", $slug, $str);

            /* Tira os caracteres ($slug) repetidos */
            $str = preg_replace("/{$slug}{2,}/i", $slug, $str);

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
        $str = self::reSanitize($str);

        return mb_strtolower(self::toUTF8($str), "UTF-8");
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