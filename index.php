<?php
        require __DIR__.'/vendor/autoload.php';
        use PHPRouter\RouteCollection;
        use PHPRouter\Router;
        use PHPRouter\Route;

        $collection = new RouteCollection();

        $collection->attachRoute(new Route('/', array(
            '_controller' => 'Router::route_login',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/', array(
            '_controller' => 'Router::route_login',
            'methods' => 'POST'
        )));
        $collection->attachRoute(new Route('/login', array(
            '_controller' => 'Router::route_login',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/login', array(
            '_controller' => 'Router::route_login',
            'methods' => 'POST'
        )));
        $collection->attachRoute(new Route('/logout', array(
            '_controller' => 'Router::route_logout',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/signup', array(
            '_controller' => 'Router::route_signup',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/signup', array(
            '_controller' => 'Router::route_signup',
            'methods' => 'POST'
        )));
        $collection->attachRoute(new Route('/admin/home', array(
            '_controller' => 'Router::route_admin',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/admin/edit-photo', array(
            '_controller' => 'Router::route_edit_photo',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/admin/edit-photo', array(
            '_controller' => 'Router::route_edit_photo',
            'methods' => 'POST'
        )));
        $collection->attachRoute(new Route('/admin/view-photo', array(
            '_controller' => 'Router::route_view_photo',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/admin/photos', array(
            '_controller' => 'Router::route_admin_photos',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/admin/photos', array(
            '_controller' => 'Router::route_admin_photos',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/admin/upload', array(
            '_controller' => 'Router::route_upload',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/admin/upload', array(
            '_controller' => 'Router::route_upload',
            'methods' => 'POST'
        )));
        $collection->attachRoute(new Route('/admin/comments', array(
            '_controller' => 'Router::route_comments',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/admin/profile', array(
            '_controller' => 'Router::route_profile',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/admin/edit_profile', array(
            '_controller' => 'Router::route_edit_profile',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/admin/edit_profile', array(
            '_controller' => 'Router::route_edit_profile',
            'methods' => 'POST'
        )));
        $collection->attachRoute(new Route('/admin/delete-profile', array(
            '_controller' => 'Router::route_delete_profile',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/all-photos', array(
            '_controller' => 'Router::route_front_photos',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/all-photos', array(
            '_controller' => 'Router::route_front_photos',
            'methods' => 'POST'
        )));
        $collection->attachRoute(new Route('/photo', array(
            '_controller' => 'Router::route_front_photo',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/photo', array(
            '_controller' => 'Router::route_front_photo',
            'methods' => 'POST'
        )));
        $collection->attachRoute(new Route('/search', array(
            '_controller' => 'Router::route_front_search',
            'methods' => 'GET'
        )));
        $collection->attachRoute(new Route('/search', array(
            '_controller' => 'Router::route_front_search',
            'methods' => 'POST'
        )));
        $router = new Router($collection);
        $router->setBasePath('/');
        $route = $router->matchCurrentRequest();

