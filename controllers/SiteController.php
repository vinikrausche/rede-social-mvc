<?php 

class SiteController extends Controller {
    
    public function index(){
        $this->render('home',['nome' => 'vinicius']);
    }
}