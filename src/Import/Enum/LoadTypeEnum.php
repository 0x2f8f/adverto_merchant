<?php

namespace App\Import\Enum;

/**
 * Как нужно загрузить прайс
 */
final class LoadTypeEnum
{
    public const FULL      = 1007; //Полностью заменить ассортимент (Товары, которых нет в файле, будут скрыты c Адверто)
    public const PARTIALLY = 1008; //Обновить каталог частично (Товары, которых нет в файле, останутся на Адверто без изменений)

    public const LT_NAMES = [
        self::FULL      => 'Full',
        self::PARTIALLY => 'Partially',
    ];
}
