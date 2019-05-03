<?php declare(strict_types=1);

use \Xervice\DataProvider\DataProviderConfig;

$config[DataProviderConfig::DATA_PROVIDER_GENERATED_PATH] =  dirname(__DIR__) . '/src/Domain/DataTransferObject';

$config[DataProviderConfig::DATA_PROVIDER_PATHS] = [
    __DIR__ . '/xervice/schema'
];

$config[DataProviderConfig::DATA_PROVIDER_NAMESPACE] = 'SpotifyApiConnect\\Domain\\DataTransferObject';