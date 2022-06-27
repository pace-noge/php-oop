<?php

interface Logger
{
    public function log($message);
}

class FileLogger implements Logger
{
    private $handle;
    private $logFile;

    public function __construct($fileName, $mode="a")
    {
        $this->logFile = $fileName;

        $this->handle = fopen($fileName, $mode) or die('Could not open the log file');
    }

    public function log($message)
    {
        $message = date('F j, Y, g:i a') . ":" . $message . "\n";
        fwrite($this->handle, $message);
    }

    public function __destruct()
    {
        if ($this->handle) {
            fclose($this->handle);
        }
    }
}

class DatabaseLogger implements Logger
{
    public function log($message)
    {
        echo sprintf("Log %s to the database\n", $message);
    }
}

$logger = new FileLogger('./log.txt', 'w');
$logger->log('PHP interface is awesome');

$loggers = [
    new FileLogger('./log.txt'),
    new DatabaseLogger()
];

foreach ($loggers as $logger) {
    $logger->log('Log message');
}

?>