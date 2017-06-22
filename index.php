<?php
        require __DIR__.'/vendor/autoload.php';

        use PHPRouter\RouteCollection;
        use PHPRouter\Router;
        use PHPRouter\Route;  
    
        $collection = new RouteCollection();

        $collection->attachRoute(new Route('/', array(
            '_controller' => 'pagesCtrl::login',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/', array(
            '_controller' => 'pagesCtrl::login',
            'methods' => 'POST'
        )));
        $collection->attachRoute(new Route('/login', array(
            '_controller' => 'pagesCtrl::login',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/login', array(
            '_controller' => 'pagesCtrl::login',
            'methods' => 'POST'
        )));
        $collection->attachRoute(new Route('/logout', array(
            '_controller' => 'pagesCtrl::logout',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/signup', array(
            '_controller' => 'pagesCtrl::signup',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/signup', array(
            '_controller' => 'pagesCtrl::signup',
            'methods' => 'POST'
        )));
        $collection->attachRoute(new Route('/admin/home', array(
            '_controller' => 'pagesCtrl::admin',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/admin/edit-photo', array(
            '_controller' => 'pagesCtrl::edit_photo',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/admin/edit-photo', array(
            '_controller' => 'pagesCtrl::edit_photo',
            'methods' => 'POST'
        )));
        $collection->attachRoute(new Route('/admin/view-photo', array(
            '_controller' => 'pagesCtrl::view_photo',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/admin/photos', array(
            '_controller' => 'pagesCtrl::admin_photos',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/admin/photos', array(
            '_controller' => 'pagesCtrl::admin_photos',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/admin/upload', array(
            '_controller' => 'pagesCtrl::upload',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/admin/upload', array(
            '_controller' => 'pagesCtrl::upload',
            'methods' => 'POST'
        )));
        $collection->attachRoute(new Route('/admin/comments', array(
            '_controller' => 'pagesCtrl::comments',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/admin/profile', array(
            '_controller' => 'pagesCtrl::profile',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/admin/edit_profile', array(
            '_controller' => 'pagesCtrl::edit_profile',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/admin/edit_profile', array(
            '_controller' => 'pagesCtrl::edit_profile',
            'methods' => 'POST'
        )));
        $collection->attachRoute(new Route('/admin/delete-profile', array(
            '_controller' => 'pagesCtrl::delete_profile',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/all-photos', array(
            '_controller' => 'pagesCtrl::front_photos',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/all-photos', array(
            '_controller' => 'pagesCtrl::front_photos',
            'methods' => 'POST'
        )));
        $collection->attachRoute(new Route('/photo', array(
            '_controller' => 'pagesCtrl::front_photo',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/photo', array(
            '_controller' => 'pagesCtrl::front_photo',
            'methods' => 'POST'
        )));
        $collection->attachRoute(new Route('/search', array(
            '_controller' => 'pagesCtrl::front_search',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/search', array(
            '_controller' => 'pagesCtrl::front_search',
            'methods' => 'POST'
        )));
        
        $router = new Router($collection);
        $router->setBasePath('/');
        $route = $router->matchCurrentRequest();
