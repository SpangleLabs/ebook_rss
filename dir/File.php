<?php

namespace dir;

class File {
    private $fileName;
    private $fullName;
    private $modTime;
    
    function __construct($fullName) {
        $this->fullName = $fullName;
        $this->modTime = filemtime($fullName);
        $this->fileName = substr($fullName, strrpos($fullName, '/') + 1);
    }
}
