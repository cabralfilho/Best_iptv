<?php


namespace System\View;

use System\File;

class View implements ViewInterface
{
    /**
    * File object
    *
    * @var \System\File
    */
    
    private $file;
    
    /**
    * View path
    *
    *
    * @var string
    */
    
    private $viewPath;
    
    /**
    * Passed Data "variables" th the view path
    *
    * @var array
    */
    
    private $data = [];
    
    
    /**
    * The output from the view file
    *
    * @var string
    */
    
    private $output;
    
    
    /**
    * Constructor
    *
    * @param \System\File $app
    * @param string $viewPath
    * @param array $data
    */
    
    public function __construct(File $file, $viewPath, array $data)
    {
        $this->file = $file;
        
        $this->preparePath($viewPath);
        
        $this->data = $data;
    }
    
    
    
    /**
    * prepare View Path
    *
    * @param string $viewPath
    * @return void
    */
    
    private function preparePath($viewPath)
    {
        $relativeViewPath = 'App/Views/' . $viewPath . '.php';
            
        $this->viewPath = $this->file->to($relativeViewPath);
        
        
        if (! $this->viewFileExists($relativeViewPath))
        {
            die( "<b>". $viewPath . "</b> doesn't exists in View folder");
        }
    }
    
    
    /**
    * Detemine if the view file exists
    *
    * @return bool
    */
    
    private function viewFileExists($relativeViewPath)
    {
        return $this->file->exists($relativeViewPath);
    }
    
    
    /**
    * {@inheritDoc}
    */
    
    public function getOutput()
    {
        
        if(is_null($this->output))
        {
            ob_start();
            
            extract($this->data);

            require $this->viewPath;

            $this->output = ob_get_clean();
            
        }
        
        return $this->output;
    }
    
    /**
    * {@inheritDoc}
    */
    
    public function __toString()
    {
        return $this->getOutput();
    }
}