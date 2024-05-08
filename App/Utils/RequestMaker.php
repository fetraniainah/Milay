<?php
namespace App\Milay\Utils;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class RequestMaker
{
    protected $request;

    public function __construct()
    {
        $this->request = Request::createFromGlobals();
    }

    public function post()
    {
        return $this->request->request->all();
    }

    public function files()
    {
        return $this->request->files->all();
    }
    
    public function uploadImages($files, $uploadDir, $allowedExtensions = [])
{
    $uploadedFiles = array();
    $images = array();

    // Vérifier si des fichiers ont été envoyés
    if (isset($files['name']) && is_array($files['name'])) {
        // Traiter chaque fichier individuellement
        foreach ($files['name'] as $index => $fileName) {
            $file = [
                'name' => $fileName,
                'type' => $files['type'][$index],
                'tmp_name' => $files['tmp_name'][$index],
                'error' => $files['error'][$index],
                'size' => $files['size'][$index]
            ];

            // Vérifier si le fichier est valide et a une extension autorisée
            if ($this->isValidFile($file, $allowedExtensions)) {
                $filename = 'milay_' . uniqid() . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
                $destination = $uploadDir . '/' . $filename;

                // Déplacer le fichier vers le répertoire de destination
                if (move_uploaded_file($file['tmp_name'], $destination)) {
                    $uploadedFiles["success"] = true;
                    $images[] = $filename;
                    $uploadedFiles["images"] = $images;
                } else {
                    $uploadedFiles[] = 'Erreur lors du télèchargement ' . $file['name'];
                    $uploadedFiles["success"] = false;
                }
            } else {
                $uploadedFiles[] = 'Erreur de validation du fichier ' . $file['name'];
                $uploadedFiles["success"] = false;
            }
        }
    }

    return $uploadedFiles;
}
    

    private function isValidFile($file, $allowedExtensions)
    {
        return isset($file['error']) && $file['error'] === UPLOAD_ERR_OK
            && in_array(pathinfo($file['name'], PATHINFO_EXTENSION), $allowedExtensions, true);
    }
}