<?php
namespace Models;

class User
{

    function __construct(
        private string $id,
        private string $name,
        private string $lastName1,
        private string $lastName2,
        private string $email,
        private string $birthDate,
        private string $dateRegistered,
        private string $rol = '3',
        private ?string $updatedAt = null,
        private ?string $pass = null,
        private ?string $photo = null,
        private ?string $phoneNumber = null,
    ) {
    }

    public function getId(): int
    {
        return (int) $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getLastName1(): string
    {
        return $this->lastName1;
    }

    public function setLastName1(string $lastName1): void
    {
        $this->lastName1 = $lastName1;
    }

    public function getLastName2(): string
    {
        return $this->lastName2;
    }

    public function setLastName2(string $lastName2): void
    {
        $this->lastName2 = $lastName2;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getBirthDate(): string
    {
        return $this->birthDate;
    }

    public function setBirthDate(string $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    public function getPhone(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhone(string $phone): void
    {
        $this->phoneNumber = $phone;
    }

    public function getDateRegistered(): string
    {
        return $this->dateRegistered;
    }

    public function setDateRegistered(string $dateRegistered): ?string
    {
        $this->dateRegistered = $dateRegistered;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): void
    {
        $this->photo = $photo;
    }

    public function getPass(): string
    {
        return $this->pass;
    }

    public function setPass(string $pass): void
    {
        $this->pass = $pass;
    }

    public function getRol(): int
    {
        return (int) $this->rol;
    }

    public function setRol(int $rol): void
    {
        $this->rol = $rol;
    }

    public function getFullName(): string
    {
        return $this->getName(). ' ' .$this->getLastName1(). ' ' .$this->getLastName2();
    }

    public function takeInitials(): string
    {
        $string = explode(' ', $this->getName());
        
        $initials = '';
        
        foreach ($string as $word) {
            $initials .= strtoupper(substr($word, 0, 1));
            $initials .= '. ';
        }
        
        return $initials;
    }

    public static function fromArray(array $data) :User
    {
        return new User(
            $data["id"],
            $data["name"],
            $data['last_name1'],
            $data['last_name2'],
            $data['email'],
            $data['birth_date'],
            $data['date_registered'],
            $data['role_id'],
            $data['updated_at'],
            $data['password'],
            $data['photo_url'],
            $data['phone'],
        );
    }
}
