<?php
namespace Utils;
use Exception;

class ImageUploader
{
    public static function uploadUserImage($file, $imgDir, $name)
    {
        if (!file_exists($imgDir)) {
            mkdir($imgDir, 0777, true);
        }

        // Verificar formato de la imagen
        $allowedMimeTypes = ["image/jpeg", "image/png", "image/webp"];
        $mimeType = mime_content_type($file['tmp_name']);
        if (!in_array($mimeType, $allowedMimeTypes)) {
            throw new Exception("La imagen tiene un formato erróneo.");
        }

        // Verificar tamaño de la imagen
        if ($file['size'] / 1024 > 3072) {
            throw new Exception("La imagen supera el peso permitido.");
        }

        // Generar nombre único para la imagen
        $imgExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $imgName = $name . date('Y-m-d-H-i-s') . '.' . $imgExtension;
        $imgPath = $imgDir . $imgName;

        if (!move_uploaded_file($file['tmp_name'], $imgPath)) {
            throw new Exception("La imagen no se pudo cargar correctamente.");
        }

        return $imgName;
    }

    public static function photoDelete($imgDir, $name)
    {
        unlink($imgDir . $name);
    }
}