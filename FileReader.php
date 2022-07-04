<?php

class FileReader
{
    private $fileHandle;
    private $fileName;


    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
        $this->open();
    }

    public function open()
    {
        $this->fileHandle = fopen($this->fileName, "r");
        return $this;
    }

    public function read()
    {
        $contents = fread($this->fileHandle, fileSize($this->fileName));
        return nl2br($contents);
    }

    public function close()
    {
        if ($this->fileHandle) {
            fclose($this->fileHandle);
        }
    }

    public function __sleep()
    {
        $this->close();
        return array('fileName');
    }

    public function __unserialize(): void
    {
        $this->open();
    }

}