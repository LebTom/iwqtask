<?php
    /*                       */
    /* main app file - begin */
    /*                       */

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;
    use Slim\Views\PhpRenderer;

    //assign required components
    require __DIR__ . '/assets/vendor/autoload.php';
    require __DIR__ . '/core/setup/systemConfig.php';
    require __DIR__ . '/core/setup/dbConnection.php';
    include __DIR__ . '/core/modules/notificationsSystem.php';

    //start session
    session_start();

    //app declaration
    $app = new \Slim\App;

    //run flash messages service
    $container = $app -> getContainer();

    $container['flash'] = function(){
        return new \Slim\Flash\Messages();
    };

    //users management module
    require __DIR__ . '/core/modules/usersManagement.php';

    //run app
    $app -> run();

    /*                     */
    /* main app file - end */
    /*                     */
?>