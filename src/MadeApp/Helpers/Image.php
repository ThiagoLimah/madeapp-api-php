<?php namespace MadeApp\Helpers;

/**
 * Class Image
 *
 * Helper para manipulação de arquivos de imagem. 
 *
 * @package MadeApp\Helpers
 * @author Thiago A. de Lima <thiagolimaes@gmail.com>
 * @version 1.0
 */
class Image
{
    /**
     * Cria uma miniatura da imagem nas dimensões solicitadas.
     *
     * @param string $file
     * @param int    $width
     * @param int    $height
     *
     * @return string
     */
    public static function CreateThumbnail($file, $width = 800, $height = 600)
    {
        $mode = \Imagine\Image\ImageInterface::THUMBNAIL_OUTBOUND;
        $size = new \Imagine\Image\Box($width, $height);

        $thumbnail   = \Orchestra\Imagine\Facade::open($file)->thumbnail($size, $mode);
        $destination = public_path() . "/img/{$width}-{$height}/";
        $fileName    = self::GetFileName($file);

        if (file_exists($destination . $fileName)) {
            return url("/img/{$width}-{$height}/" . $fileName);
        }

        if (!file_exists($destination)) {
            @mkdir($destination, 0777);
        }

        $thumbnail->save($destination . $fileName);

        return url("/img/{$width}-{$height}/" . $fileName);
    }

    /**
     * Retorna o nome da imagem.
     *
     * @param string $file
     *
     * @return string
     */
    public static function GetFileName($file)
    {
        $explodedName = (array) explode('/', trim($file));
        $reversedName = array_reverse($explodedName);

        return $reversedName[0];
    }
}