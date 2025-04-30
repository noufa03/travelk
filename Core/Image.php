<?php

namespace Core;

class Image
{
    protected string $uploadDir;
    protected array $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

    public function __construct(string $uploadDir)
    {
        $this->uploadDir = rtrim($uploadDir, '/') . '/';

        if (!is_dir($this->uploadDir)) {
            mkdir($this->uploadDir, 0777, true);
        }
    }

    public function upload(array $file, string $prefix = 'img_'): ?string
    {
        if (empty($file['name']) || $file['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($extension, $this->allowedExtensions)) {
            throw new \Exception('Invalid file type.');
        }

        $newFileName = uniqid($prefix, true) . '.' . $extension;
        $destinationPath = $this->uploadDir . $newFileName;

        if (!move_uploaded_file($file['tmp_name'], $destinationPath)) {
            throw new \Exception('Failed to upload image.');
        }

       
        return $destinationPath;
    }
}
