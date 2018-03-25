<?php

namespace System\Http;

use System\Application;

class UploadedFile
{

    /*
    * Application object
    *
    * @var \System\Application
    */
    
    private $app;
    
    /*
    * The Uploaded File
    *
    * @var array
    */
    
    private $file = [];
    
    /*
    * The Uploaded File name
    *
    * @var string
    */
    
    private $fileName;
    
    /*
    * The Uploaded File name only without extension
    *
    * @var string
    */
    
    private $nameOnly;
    
    /*
    * The Uploaded File extension
    *
    * @var string
    */
    
    private $extension;
    
    /*
    * Mime Type
    *
    * @var string
    */
    
    private $mimeType;
    
    /*
    * Temp file type
    *
    * @var string
    */
    
    private $tempFile;
    
    /*
    * file size
    *
    * @var int
    */
    
    private $size;
    
    /*
    * file error
    *
    * @var array
    */
    
    private $error;
    
    /*
    * alloed img type
    *
    * @var array
    */
    
    private $allowedImgType = ['png', 'jpg', 'webp', 'gif', 'jpeg'];
    
    /*
    * Constructor
    *
    * @param \System\Application $app
    * @param string $input
    */
    
    public function __construct($input)
    {
        $this->getFileInfo($input);
        
    }
    
    /*
    * Start Collecting uploaded file data
    *
    * @param string $input
    * @return void
    */
    
    public function getFileInfo($input) 
    {
        if (empty ($_FILES[$input]))
        {
            return;
        }
        
        $file = $_FILES[$input];
        
        $this->error = $file['error'];

        if ($this->error != UPLOAD_ERR_OK)
        {
            return;
        }
        
        $this->file = $file;
        
        $fileNameInfo = pathinfo($this->file['name']);
        
        $this->nameOnly = $fileNameInfo['basename'];
        
        $this->extension = strtolower($fileNameInfo['extension']);
                
        $this->mimeType = $this->file['type'];
        
        $this->tempFile = $this->file['tmp_name'];
        
        $this->size = $this->file['size'];
    }
    
    
    /*
    * Determine if the file is uploaded
    *
    * @return bool
    */
    
    public function exists()
    {
        return ! empty($this->file);
    }
    
    
    /*
    * Get File name
    *
    * @return string
    */
   
    public function getFileName()
    {
        return $this->fileName;
    }
    
    
    /*
    * Get File extension
    *
    * @return string
    */
   
    public function getExtension()
    {
        return $this->extension;
    } 
    
    /*
    * Get File name
    *
    * @return string
    */
   
    public function getMimeType()
    {
        return $this->mimeType;
    }
    
    
    /*
    * Determine if the Uploaded file is Img
    *
    * @return bool
    */
   
    public function isImg()
    {
       return strpos($this->mimeType, 'image/') === 0 AND in_array($this->extension, $this->allowedImgType);
        
    }
    
   
    /*
    * Move the uploaded file to the given destination "target"
    *
    * @param string $target
    * @param string $newFileName
    * @return string 
    */
   
    public function moveTo($target, $newFileName = null)
    {
        $fileName = $newFileName ?: sha1(mt_rand()) . '_' . sha1(mt_rand());
        
        $fileName .= '.' . $this->extension;
        
        if (! is_dir($target)) 
        {
            mkdir($target, 0777, true);
        }
        
        $uploadedFilePath = rtrim($target ,'/') . '/' . $fileName;
        
        move_uploaded_file($this->tempFile, $uploadedFilePath);
        
        return $fileName;
    }
}