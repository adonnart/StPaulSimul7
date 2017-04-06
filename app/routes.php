<?php


use Symfony\Component\HttpFoundation\Request;
use stpaul\Domain\Famille;

use stpaul\Domain\Sejour;
use stpaul\IHM\Simul;
use stpaul\Form\Type\SimulType;


$app->get('/ping', function() use ($app) {
    return 'ping';
});

$app->get('/hello', function() use ($app) {
    return 'Hello world';
});

$app->get('/hello/{name}', function ($name) use ($app) {
    return 'Hello ' . $app->escape($name);
});

//Retourne tous les séjours
$app->get('/', function() use ($app)  {
    $sejours = $app['dao.sejour']->getAllSejours();

    return $app['twig']->render('index.html.twig', array('sejours' => $sejours));
});


// Formulaire de simulation
$app->match('/simul', function ( Request $request) use ($app) {
        $simulFormView = null;

        $simul = new Simul();
        $simulForm = $app['form.factory']->create(new SimulType(), $simul);
        $simulForm->handleRequest($request);
        if ($simulForm->isSubmitted() && $simulForm->isValid()) {
            /** TODO les calculs */
            $sejour = $app['dao.sejour']->getSejour($simul->getSejNo());
            $simul->getSejMBI($sejour->getSejMontantMBI());
            $simul->calcul();
            return $app['twig']->render('simulR.html.twig', array('simul' => $simul, 'sejour' => $sejour));
         }
        $simulFormView = $simulForm->createView();

    return $app['twig']->render('simul.html.twig', array(
        'simul' => $simul,
        'simulForm' => $simulFormView));
})->bind('simul');
