<?php

namespace dir;

class File {
    private $fileName;
    private $fullName;
    private $modTime;
    
    function __construct($fullName, $modTime) {
        $this->fullName = $fullName;
        $this->modTime = $modTime;
        $this->fileName = substr($fullName, strrpos($fullName, '/') + 1);
    }
}
