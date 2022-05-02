<?php

namespace App\Import\Enum;

/**
 * Статус загрузки
 */
final class ProductsUploadStatusEnum
{
    public const NEW                    = 2001; //Новый
    public const ON_MODERATION          = 2005; //На модерации
    public const DECLINED               = 2009; //Не прошел модерацию
    public const DOWNLOAD_QUEUE         = 2012; //В очереди на загрузку
    public const DOWNLOADING            = 2015; //Загружается
    public const DOWNLOADING_ERROR      = 2017; //Загружен с ошибками
    public const DOWNLOADING_SUCCESS    = 2021; //Загружен полностью

    public const PU_NAMES               = [
        self::NEW                       => 'New',
        self::ON_MODERATION             => 'On moderation',
        self::DECLINED                  => 'Declined',
        self::DOWNLOAD_QUEUE            => 'Download queue',
        self::DOWNLOADING               => 'Downloading',
        self::DOWNLOADING_ERROR         => 'Downloading error',
        self::DOWNLOADING_SUCCESS       => 'Downloading success',
    ];

    public const PU_STATUSES            = [
        self::NEW                       => self::NEW,
        self::ON_MODERATION             => self::ON_MODERATION,
        self::DECLINED                  => self::DECLINED,
        self::DOWNLOAD_QUEUE            => self::DOWNLOAD_QUEUE,
        self::DOWNLOADING               => self::DOWNLOADING,
        self::DOWNLOADING_ERROR         => self::DOWNLOADING_ERROR,
        self::DOWNLOADING_SUCCESS       => self::DOWNLOADING_SUCCESS,
    ];
}
