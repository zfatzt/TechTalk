<?php

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{
    public function index()
    {
        // Anfrage an die URI /user/crate weiterleiten (HTTP 302)
        header('Location: /user/create');
    }

    public function create()
    {
        $view = new View('user_form');
        $view->title = 'Benutzer erstellen';
        $view->heading = 'Benutzer erstellen';
        $view->display();
    }
}
