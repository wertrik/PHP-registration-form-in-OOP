<?php
namespace App\Service\FileHandler;


class PlainTextFileHandler implements FileHandlerInterface {
    
    const DIR = './tmp';
    const SEPARATOR = ':';
    const NEWLINE = "\r\n";
    private $file = null;
    
    public function __construct() {
        $this->makeDirIfNotExists();
    }

    public function setFile($file): void {        
        $this->file = $file;
    }

    public function writeNewRecord(array $data): bool {
        
        $res = $this->getFileResourse();
        if ($this->write($res, implode(self::SEPARATOR, $data))) {
            $this->closeResource($res);
            return true;
        }
        
    }
    
    private function write($res, $data): bool {

        if (fwrite($res, $data.self::NEWLINE) !== false) {
            return true;
        }
        
        throw new \Exception('Unable to write data');
        
    }
    
    private function getFileResourse() {
        
        $res = fopen(self::DIR."/".$this->file, "a");
            
        if ($res !== false) {            
            if (flock($res, LOCK_EX)) {                
                return $res;                
            }            
        }
        
        throw new \Exception('Unable to access file');  
        
    }
    
    private function closeResource($res): void {
        flock($res, LOCK_UN);
        fclose($res);
    }
    
    private function makeDirIfNotExists(): void {

        if (!file_exists(self::DIR)) {
            if (mkdir(self::DIR)) {
                chmod(self::DIR, 0777);
            } else {
                throw new \Exception('Unable to make directory');
            }
        }
        
    }

}
