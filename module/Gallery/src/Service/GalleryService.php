<?php

namespace Gallery\Service;

class GalleryService
{
    const SLUG_CERAMICS = 'ceramics';
    const SLUG_MOSAIC = 'mosaic';
    const SLUG_PAINTINGS = 'paintings';

    /**
     * @return array
     */
    public static function getSlug() : array
    {
        return [
            self::SLUG_CERAMICS  => self::SLUG_CERAMICS,
            self::SLUG_MOSAIC    => self::SLUG_MOSAIC,
            self::SLUG_PAINTINGS => self::SLUG_PAINTINGS,
        ];
    }
}