<?php
namespace Repositories;

use Lib\Db;
use Models\ShippingAddress;


class ShippingAddressRepository
{
    private Db $conexion;

    public function __construct()
    {
        $this->conexion = new Db();
    }

    public function getMainAddressByUserId(int $id): ?array
    {
        $this->conexion->query("SELECT * FROM shipping_addresses WHERE is_main = 1 AND user_id = $id");
        return $this->conexion->get();
    }

    public function setNonMainAddress(int $id): void
    {
        $this->conexion->query("UPDATE shipping_addresses SET is_main = FALSE WHERE id = $id");
    }

    public function saveNewAddress(array $data): void
    {
        $fields = implode(",", array_keys($data));
        $values = implode("', '", array_values($data));

        $this->conexion->query("INSERT INTO shipping_addresses ($fields) VALUES ('$values')");
    }

}
