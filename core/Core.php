<?php 

class Core {

    public function start(){
        $url = '/'; // creating the url
        $params = []; //params from url

        if(!isset($_GET['url']) || empty($_GET['url'])){
            $currentController  = 'SiteController';
            $currentAction = 'index';
        }

        if(isset($_GET['url']) && !empty($_GET['url'])){
            $url .= addslashes($_GET['url']); //getting the content of url

            $url = explode('/',$url);
            array_shift($url);

            //getting the current controller
            $currentController = ucfirst($url[0]).'Controller';
            array_shift($url);

            // Setting by default the current action
            if(!isset($url[0]) || empty($url[0]))
                 $currentAction = 'index';
            

             //Getting the action from url
            if(isset($url[0]) && !empty($url[0])){
               
                $currentAction = $url[0];
                array_shift($url);
            }
                        
            //if exist some params on $url they will go to $params
            if(count($url) > 0)
                $params = $url;
        }

       
        if(!file_exists('controllers/'.$currentController.'.php')){
           $currentController = 'FallbackController';
           $currentAction = 'index'; 
        }

        if(!method_exists($currentController,$currentAction)){
            $currentController = 'FallbackController';
           $currentAction = 'index'; 
        }

        $c = new $currentController;

        call_user_func_array([$c,$currentAction],$params);
        
    }

   


}