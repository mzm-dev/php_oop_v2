<?php

/**
 * Class Errors
 */
class Errors
{

    protected $level;
    protected $display;

    /**
     * Errors constructor.
     * @param array $params
     */
    public function __construct($params = array())
    {
        $this->level = $params['level'];
        $this->display = $params['display_errors'];

    }

    function init()
    {
        ini_set("display_errors", $this->display);

        switch ($this->level):
            case 0:
                error_reporting(0);
                break;
            case 1:
                error_reporting(E_ERROR | E_WARNING | E_PARSE);
                break;
            case 2:
                error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
                break;
            case 3:
                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                break;
            case 4:
                error_reporting(E_ALL ^ E_NOTICE);
                break;
            case 5:
                error_reporting(E_ALL);
                break;
            default:
                error_reporting(E_ALL);
        endswitch;
    }

}

function validation_msg($msg = '',$class = 'success')
{

    return '<div class="alert alert-'.$class.'">' . $msg . '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
}

function redirect($url)
{
    header("Location: $url");
}

function dd($data)
{
    echo '<pre style="color : #aed581; background: black">';
    print_r($data);
    exit;
}