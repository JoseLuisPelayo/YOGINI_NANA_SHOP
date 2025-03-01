<?php
namespace Services;

use Utils\DataCleaner;
use Utils\ImageUploader;
use Lib\AuthJWT;
use Repositories\UsersRepository;
use Models\User;
use Exception;

class UsersService
{

    private UsersRepository $repositories;
    private AuthJWT $authJWT;

    public function __construct()
    {
        $this->repositories = new UsersRepository();
        $this->authJWT = new AuthJWT();
    }

    private function verifyMandatoryData(array $data, bool $isUpdate = false): void
    {
        $requiredFields = ['name', 'last_name1', 'last_name2', 'email', 'birth_date'];

        if (!$isUpdate) {
            array_merge($requiredFields, ['pass1'], ['pass2']);
        }

        foreach ($requiredFields as $value) {
            if (empty($data[$value])) {
                throw new Exception("No has rellenado todos los campos obligatorios.", 400);
            }
        }
    }

    private function DataVerify(array $data, bool $isUpdate = false)
    {
        if (
            DataCleaner::dataVerify("^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{4,25}$", $data['name']) ||
            DataCleaner::dataVerify("^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{4,25}$", $data['last_name1']) ||
            ($data['last_name2'] != '' && DataCleaner::dataVerify("^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{4,25}$", $data['last_name2']))
        ) {
            throw new Exception('El nombre o los apellidos no coinciden con el formato.');
        }

        if (!DataCleaner::validateEmail($data['email'])) {
            throw new Exception('El email no es válido.');
        }

        if (!$isUpdate) {
            if (
                DataCleaner::dataVerify("^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{6,16}$", $data['pass1']) ||
                DataCleaner::dataVerify("^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{6,16}$", $data['pass2'])
            ) {
                throw new Exception('La contraseña no coincide con el formato.');
            }

            if ($data['pass1'] !== $data['pass2']) {
                throw new Exception('Las contraseñas no coinciden.');
            }

            $usuarioExistente = $this->repositories->findUserByEmail($data['email']);
            if ($usuarioExistente) {
                throw new Exception('El email ya existe en la base de datos.');
            }
        }
    }

    public function cleanUserData(array $data): array
    {
        return [
            'name' => DataCleaner::cleanString($data['name']),
            'last_name1' => DataCleaner::cleanString($data['last_name1']),
            'last_name2' => DataCleaner::cleanString($data['last_name2']),
            'email' => DataCleaner::cleanString($data['email']),
            'birth_date' => DataCleaner::cleanString($data['birth_date']),
            'pass1' => DataCleaner::cleanString($data['pass1'] ?? ''),
            'pass2' => DataCleaner::cleanString($data['pass2'] ?? ''),
            'password' => DataCleaner::cleanString($data['password'] ?? ''),
            'phone' => DataCleaner::cleanString($data['phone'] ?? '')
        ];
    }

    public function createUser($data, $files): void
    {
        $cleanData = $this->cleanUserData($data); 

        $this->verifyMandatoryData($cleanData);
        $this->dataVerify($cleanData);

        $password = password_hash($data['pass1'], PASSWORD_BCRYPT, ["cost" => 10]);

        $photoUrl = '';
        if (isset($files['photo']) && $files['photo']['error'] == 0) {
            $photoUrl = ImageUploader::uploadUserImage($files['photo'], "./repo/user/", DataCleaner::cleanPhotoName($cleanData['name'] . "_" . $cleanData['last_name1']));
        }

        $user = [
            'name' => $cleanData['name'],
            'last_name1' => $cleanData['last_name1'],
            'last_name2' => $cleanData['last_name2'],
            'email' => $cleanData['email'],
            'birth_date' => $cleanData['birth_date'],
            'date_registered' => date('Y-m-d_H-i-s'),
            'photo_url' => $photoUrl,
            'password' => $password,
            'role_id' => 2
        ];

        $this->save($user);
    }

    public function updateUser(array $data, array $files, User $user)
    {
        $cleanData = $this->cleanUserData($data);
        $this->verifyMandatoryData($cleanData, true);
        $this->dataVerify($cleanData, true);

        if ($cleanData['email'] != $user->getEmail()) {
            $this->checkEmailOwnership($user->getId(), $cleanData['email']);
    }

        if ($cleanData['pass1'] != '' && $cleanData['pass2'] != '') {
            if ($cleanData['password'] = !'' && password_verify($cleanData['password'], $user->getPass())) {
                if (
                    DataCleaner::dataVerify("^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{6,16}$", $cleanData['pass1']) ||
                    DataCleaner::dataVerify("^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{6,16}$", $cleanData['pass2'])
                ) {
                    throw new Exception('La contraseña no coincide con el formato.');
                }

                if ($cleanData['pass1'] !== $cleanData['pass2']) {
                    throw new Exception('Las nuevas contraseñas no coinciden.');
                }

                $password = $cleanData['pass1'];
            } else {
                throw new Exception("La contraseña no es correcta");
            }
        }

        $photoUrl = $user->getPhoto();
        if (isset($files['photo']) && $files['photo']['error'] == 0) {
            $photoToUpdate = ImageUploader::uploadUserImage($files['photo'], "./repo/user/", DataCleaner::cleanPhotoName($cleanData['name'] . "_" . $cleanData['last_name1']));

            if ($photoUrl != '') {
                ImageUploader::photoDelete("./repo/user/", $photoUrl);
            }
        }

        $user = [
            'id' => $user->getId(),
            'name' => $cleanData['name'],
            'last_name1' => $cleanData['last_name1'],
            'last_name2' => $cleanData['last_name2'],
            'birth_date' => $cleanData['birth_date'],
            'email' => $cleanData['email'],
            'updated_at' => date('Y-m-d_H-i-s'),
            'photo_url' => (isset($photoToUpdate)) ? $photoToUpdate : $photoUrl
        ];

        if ($cleanData['phone'] != '')
            $user['phone'] = $cleanData['phone'];

        if (isset($password)) {
            $user['password'] = $password;
        }

        $this->save($user);
    }

    public function findUserByEmail(string $email): ?User
    {
        $email = DataCleaner::cleanString($email);
        $user = $this->repositories->findUserByEmail($email);

        if (!is_null($user)) {
            return $user;
        }
        throw new Exception("El usuario no existe.");
    }

    public function checkEmailOwnership(int $id, string $email): ?bool
    {
        $mail = $this->repositories->checkEmailOwnership($id, $email);
        if (is_null($mail)) {
            return true;
        } else {
            throw new Exception("El email pertenece a otro usuario.");
        }
    }


    public function save(array $user): void
    {
        $this->repositories->save($user);
    }

    public function findAll(): ?array
    {
        return $this->repositories->findAllUsers();
    }


    public function findUserById(int $Id): ?User
    {
        return $this->repositories->findUserById($Id);
    }

    public function login($email, $pass)
    {
        $user = $this->findUserByEmail($email);
        if (password_verify($pass, $user->getPass())) {

            $_SESSION['name'] = $user->getName();
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['rol'] = $user->getRol();

            $jwt = $this->authJWT->createSessionToken($user, './');
            setcookie('JWT', $jwt['jwt'], $jwt['exp'], '/', '', true);
        } else {
            throw new Exception("Las credenciales son incorrectas");
        }
    }
}