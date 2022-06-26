<?php 


class Controller {

    protected function render(string $viewName,$params = []){
     
        if(file_exists('views/pages/'.$viewName.'.phtml')){
            count($params) > 0 ? extract($params) : '';
            require_once 'views/pages/'.$viewName.'.phtml';
        }
    }
}