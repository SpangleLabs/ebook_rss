<?php

namespace dir;

class File {
    private $fileName;
    private $fullName;
    private $modTime;
    private $dirName;
    
    function __construct($fullName) {
        $this->fullName = $fullName;
        $this->modTime = filemtime($fullName);
        $this->fileName = substr($fullName, strrpos($fullName, '/') + 1);
        $this->dirName = str_replace($this->fileName,"",$this->fullName);
    }
    
    function getFileName() {
        return $this->fileName;
    }
    
    function getFullName() {
        return $this->fullName;
    }
    
    function getModTime() {
        return $this->modTime;
    }
    
    function getDirName() {
        return $this->dirName;
    }
}
