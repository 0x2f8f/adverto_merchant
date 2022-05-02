<?php

namespace App\Import\Enum;

/**
 * Статус загрузки данных из внешних систем для конкретного товара
 */
final class ProductUploadItemStatusEnum
{
    public const NEW                 = 3001;
    public const DOWNLOAD_QUEUE      = 3012; //В очереди на загрузку
    public const DOWNLOADING         = 3015; //Загружается
    public const DOWNLOADING_ERROR   = 3017; //Загружен с ошибками
    public const DOWNLOADING_SUCCESS = 3021; //Загружен полностью

    public const PI_NAMES = [
        self::NEW                 => 'New',
        self::DOWNLOAD_QUEUE      => 'Download queue',
        self::DOWNLOADING         => 'Downloading',
        self::DOWNLOADING_ERROR   => 'Downloading error',
        self::DOWNLOADING_SUCCESS => 'Downloading success',
    ];

    public const PI_STATUSES = [
        self::NEW                 => self::NEW,
        self::DOWNLOAD_QUEUE      => self::DOWNLOAD_QUEUE,
        self::DOWNLOADING         => self::DOWNLOADING,
        self::DOWNLOADING_ERROR   => self::DOWNLOADING_ERROR,
        self::DOWNLOADING_SUCCESS => self::DOWNLOADING_SUCCESS,
    ];
}
