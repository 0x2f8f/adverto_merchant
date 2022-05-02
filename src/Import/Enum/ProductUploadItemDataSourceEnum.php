<?php

namespace App\Import\Enum;

/**
 * С какого сайта была получена информация о продукте по EAN или другому коду
 */
final class ProductUploadItemDataSourceEnum
{
    public const NEW       = 4001; // новая запись
    public const NOT_FOUND = 4005; // ничего не найдено в базах
    public const ICECLOG   = 4010; // iceclog.com or live.icecat.biz
    public const UPCITEMDB = 4020; // upcitemdb.com

    public const PIDS_NAMES = [
        self::NEW       => 'New',
        self::NOT_FOUND => 'Not found',
        self::ICECLOG   => 'iceclog.com',
        self::UPCITEMDB => 'upcitemdb.com',
    ];
}
