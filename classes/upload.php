<?php
class Upload
{
    public $destination;
    public $maxSize;

    public function __construct($destination, $maxSize = 1000000)
    {
        $this->destination = $destination;
        $this->maxSize = $maxSize;
    }

    private function checkDestination()
    {
        if (!is_dir($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $this->destination)) {
            mkdir($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $this->destination, 0777, true);
        }
    }

    public function upload($file)
    {
        $this->checkDestination();
        if ($file['error'] === UPLOAD_ERR_OK) {
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $name = uniqid('', true) . '.' . $ext;
            $destination = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $this->destination . DIRECTORY_SEPARATOR . $name;
            if ($file['size'] > $this->maxSize) {
                return false;
            }
            if (move_uploaded_file($file['tmp_name'], $destination)) {
                return $this->destination . DIRECTORY_SEPARATOR . $name;
            }
        }
        return false;
    }
}
