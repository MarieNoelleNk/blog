<?php


class View
{
    private $newFile;
    private $title;

    public function __construct($action)
    {
        $this->newFile = 'view/'.$action.'View.php';
    }

    public function generateNewFile($newFile,$data)
    {
        if (file_exists($newFile))
        {
            extract($data);
            ob_start();
            require $newFile;
            return ob_get_clean();
        }
        else {
            throw new Exception('fichier introuvable');
        }
    }

    public function generate($data)
    {
        $content = $this->generateNewFile($this->newFile,$data);
        $view = $this->generateNewFile('view/template.php', array('title'=>$this->title, 'content'=>$content) );
        echo $view;
    }
}