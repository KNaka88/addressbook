<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Contact.php";

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__."/../views"
    ));
    $app['debug'] = true;

    session_start();
    if(empty($_SESSION['list_of_contacts'])) {
        $_SESSION['list_of_contacts'] = array();
    }


    $app->get('/', function() use ($app) {


        return "/";
        // return $app['twig']-render('index.html.twig', array('contacts' => Contact::getAll()));
    });


    $app->post('/create_contact', function() use ($app) {
        //After submitting the form, the new Contacts should be saved into the session under the key $_SESSION['list_of_contacts']

        //CALL SAVE()
        return "/create_contact";
        // return $app['twig']->render('/show_contact.html.twig', array('list_of_contacts' => $_SESSION['list_of_contacts']));
    });



    $app->post("/delete_contacts", function() use ($app) {
        //Contact::deleteAll();

        return "/delete_contacts";
        // return $app['twig']->render('delete_contacts.html.twig');
    });



    return $app;
