<?php


class Core
{
    protected $currentController = 'Users'; // by default
    protected $currentMethod = 'login';
    protected $params = [];

    public function __construct()
    {

        $url = $this->getUrl();
        // print_r($url);
        if(isset($url[0]) && file_exists('../app/controllers/' . ucwords($url[0]) . '.php'))
        {
            $this->currentController = ucwords($url[0]);
            unset($url[0]); // getting rid of the controller
        }
        // require the controller and instantiate it
        require_once '../app/controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;

        if(isset($url[1]))
        {
            if(method_exists($this->currentController, $url[1]))
            {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        /*
         * getting the params
         * since we got rid of the controller and the method
         * using unset the rest it has to be either the params
         * or null so we retrieve whatever its left in the url
         * */
        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl()
    {
        if(isset($_GET['url']))
        {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url  =explode('/', $url);
            return $url; // ready to use url
        }
    }

}