<?php

// trait Logger
// {
//     public function log($msg)
//     {
//         echo '<pre>';
//         echo date('Y-m-d h:i:s') . ':' . '(' . __CLASS__ . ') ' . $msg . '<br/>';
//         echo '</pre>';
//     }
// }


// class BankAccount
// {
//     use Logger;
//     private $accountNumber;

//     public function __construct($accountNumber)
//     {
//         $this->accountNumber = $accountNumber;
//         $this->log("A new $accountNumber bank account created");
//     }
// }

// class User
// {
//     use Logger;
//     public function __construct()
//     {
//         $this->log('A new user created');
//     }
// }


// $bankAccount = new BankAccount(1234);
// $user = new User();


trait Preprocessor
{
    public function preprocess()
    {
        echo "Preprocess...done" . "<br />";
    }
}

trait Compiler
{
    public function compile()
    {
        echo "Compile code...done" . "<br/>";
    }
}

trait Assembler
{
    public function createObjCode()
    {
        echo 'Create the object code files...done' . '<br/>';
    }
}

trait Linker
{
    public function createExec()
    {
        echo 'Create the executable file..done' . '<br/>';
    }
}


class IDE
{
    use Preprocessor, Compiler, Assembler, Linker;

    public function run()
    {
        $this->preprocess();
        $this->compile();
        $this->createObjCode();
        $this->createExec();

        echo 'Execute the file...done' . '<br/>';
    }
}

$ide = new IDE();
$ide->run();

trait Reader
{
    public function read($source)
    {
        echo sprintf('Read from %s <br>', $source);
    }
}

trait Writer
{
    public function write($destination)
    {
        echo sprintf("Write to %s <br>", $destination);
    }
}

trait Copier
{
    use Reader, Writer;

    public function copy($source, $destination)
    {
        $this->read($source);
        $this->write($destination);
    }
}

class FileUtil
{
    use Copier;
    public function copyFile($source, $destination)
    {
        $this->copy($source, $destination);
    }
}


trait FileLogger
{
    public function log($msg)
    {
        echo 'File logger '. date("Y-m-d h:i:s") . ": " . $msg . "<br />";
    }
}

trait DatabaseLogger
{
    public function log($msg)
    {
        echo "Database logger " . date("Y-m-d h:i:s") . ": " . $msg . "<br />";
    }
}

class Logger
{
    use FileLogger, DatabaseLogger{
        DatabaseLogger::log as logToDatabase;
        FileLogger::log insteadof DatabaseLogger;
        // FileLogger::log insteadof DatabaseLogger;
    }
}

$logger = new Logger();
$logger->log('this is a test message');
$logger->log("this is a test message #2");
$logger->logToDatabase("This is test message #3");

?>