<?php

class DefaultController
{

    public function index()
    {
        $view = new View('default_index');
        $view->title = 'Startseite';
        $view->heading = 'Startseite';
        $view->tablogin = true;
       	if (isset($_SESSION['benutzername'])){
        $view->username = $_SESSION['benutzername'];
       	} 
       	$view->active = 'home';
        $view->display();
    }
} 
