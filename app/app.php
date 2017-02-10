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


        return $app['twig']->render('index.html.twig');
    });


    $app->post('/create_contact', function() use ($app) {
        $new_contact = new Contact($_POST['first_name'], $_POST['middle_name'], $_POST['last_name'], $_POST['phone'], $_POST['address']);
        $new_contact->save();

        return $app['twig']->render('/show_contact.html.twig', array('list_of_contacts' => Contact::getAll()));
    });



    $app->post("/delete_contacts", function() use ($app) {
        //Contact::deleteAll();
        Contact::deleteAll();
        return $app['twig']->render('delete_contacts.html.twig');
    });



    return $app;
