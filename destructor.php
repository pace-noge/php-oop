<?php


class File
{
    private $handle;
    private $fileName;

    public function __construct($fileName, $mode="r")
    {
        $this->fileName = $fileName;
        $this->handle = fopen($fileName, $mode);
    }

    public function __destruct()
    {
        if ($this->handle) {
            fclose($this->handle);
        }
    }

    public function read()
    {
        return fread($this->handle, filesize($this->fileName));
    }

}


$f = new File("./this.php");
echo $f->read();


?>