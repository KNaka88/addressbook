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
        asort($_SESSION['list_of_contacts']);

        return $app['twig']->render('/create_contact.html.twig', array('contacts' => Contact::getAll()));
    });

    $app->get('/show_contact', function() use ($app) {

        return $app['twig']->render('/show_contact.html.twig', array('contacts' => Contact::getAll()));
    });




    $app->post("/delete_contacts", function() use ($app) {
        //Contact::deleteAll();
        Contact::deleteAll();
        return $app['twig']->render('delete_contacts.html.twig');
    });


    $app->post("/search", function() use ($app) {
        $search_type =  $_POST['search'];
        $search_value = '/.*' . $_POST['text_search'] . '.*/i';
        $tempArray = Contact::search($search_type, $search_value);

        return $app['twig']->render('search_result.html.twig', array('results' => $tempArray));
    });






    return $app;
