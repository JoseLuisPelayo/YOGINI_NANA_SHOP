<?php
namespace Services;

use Repositories\ShippingAddressRepository;
use Utils\DataCleaner;
use Utils\ImageUploader;
use Lib\AuthJWT;
use Models\ShippingAddress;
use Exception;

class ShippingAddressService
{
    private ShippingAddressRepository $repo;

    public function __construct()
    {
        $this->repo = new ShippingAddressRepository();
    }

    public function getMainAddressByUserId(int $id): ?array
    {
        return $this->repo->getMainAddressByUserId($id);
    }

    public function updateMainShippingAddress(int $id, array $data): void
    {
        $mainAddress = $this->getMainAddressByUserId($id);
        if ($mainAddress) {
            if (
                $mainAddress['street'] != $data['street'] ||
                $mainAddress['number'] != $data['number'] ||
                $mainAddress['floor'] != $data['floor'] ||
                $mainAddress['apartment'] != $data['apartment'] ||
                $mainAddress['postal_code'] != $data['postal_code'] ||
                $mainAddress['city'] != $data['city'] ||
                $mainAddress['region'] != $data['region']
                ) {
                $this->repo->setNonMainAddress($mainAddress['id']);
                $this->saveNewAddress($data, $id, TRUE);
            }
        } else {
            $this->saveNewAddress($data, $id, TRUE);
        }
    }

    public function saveNewAddress(array $data, int $id, bool $isMain = FALSE): void
    {
        $this->verifyMandatoryData($data);
        $address = $this->cleanAddressData($data);
        $address['is_main'] = $isMain;
        $address['user_id'] = $id;

        $this->repo->saveNewAddress($address);
    }

    public function cleanAddressData(array $data): array
    {
        return [
            'street' => DataCleaner::cleanString($data['street']),
            'number' => DataCleaner::cleanString($data['number']),
            'floor' => DataCleaner::cleanString($data['floor']),
            'apartment' => DataCleaner::cleanString($data['apartment']),
            'postal_code' => DataCleaner::cleanString($data['postal_code']),
            'city' => DataCleaner::cleanString($data['city']),
            'region' => DataCleaner::cleanString($data['region']),
        ];
    }

    public function verifyMandatoryData(array $data): void
    {
        if (
            $data['street'] = '' ||
            $data['number'] = '' ||
            $data['floor'] = '' ||
            $data['apartment'] = '' ||
            $data['postal_code'] = '' ||
            $data['city'] = '' ||
            $data['region'] = ''
        ) {
            throw new Exception("Debes rellenar todos los campos.");
        }
    }

}