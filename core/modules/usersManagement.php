<?php
    /*                                 */
    /* users management module - begin */
    /*                                 */

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;
    use Slim\Views\PhpRenderer;

    //common page
    $app -> get('/', function(Request $request, Response $response){
        //pass response data to template
        $responseData = [
            'activeTemplate' => 'common'
        ];

        //renderer declaration
        $viewRenderer = new PhpRenderer('templates/usersManagement', $responseData);

        //render
        return $viewRenderer -> render($response, 'main.php');
    }) -> setName('common');

    //users listing
    $app -> get('/usersManagement/listing', function(Request $request, Response $response){
        //sql query
        $sqlQuery = "SELECT * FROM `users` ORDER BY `userID` DESC";

        try{
            //init database and connect
            $database = new Database();
            $connection = $database -> connect();

            //proceed query and fetch data
            $proceedQuery = $connection -> query($sqlQuery);
            $usersList = $proceedQuery -> fetchAll(PDO::FETCH_OBJ);

            //disconnect from db and remove object
            $database = null;

            //pass response data to template
            $responseData = [
                'usersList' => $usersList,
                'activeTemplate' => 'listing',
                'notificationData' => getNotificationDescription($this -> flash -> getMessages())
            ];

            //renderer declaration
            $viewRenderer = new PhpRenderer('templates/usersManagement', $responseData);

            //render
            return $viewRenderer -> render($response, 'main.php');
        }
        catch(PDOException $exception){
            //errors recognition - catch exception
            $errorData = [
                'expectionData' => $exception -> getMessage()
            ];

            $response -> getBody() -> write(json_encode($errorData));

            return $response -> withHeader('Content-type', 'application/json') -> withStatus(500);
        }

    }) -> setName('listing');

    //remove user
    $app -> get('/usersManagement/remove/{userID}', function(Request $request, Response $response, Array $arguments){
        //filter variables
        $userID = filter_var($arguments['userID'], FILTER_SANITIZE_STRING);
        //sql query
        $sqlQuery = "DELETE FROM `users` WHERE `userID` = '$userID'";

        try{
            //init database and connect
            $database = new Database();
            $connection = $database -> connect();

            //proceed query
            $proceedQuery = $connection -> query($sqlQuery);

            //disconnect from db and remove object
            $database = null;

            //set notification
            $this -> flash -> addMessage('notificationType', 'userRemoved');

            //redirect to user listing
            return $response -> withRedirect($this -> router -> pathFor('listing', [], []));
        }
        catch(PDOException $exception){
            //errors recognition - catch exception
            $errorData = [
                'expectionData' => $exception -> getMessage()
            ];

            $response -> getBody() -> write(json_encode($errorData));

            return $response -> withHeader('Content-type', 'application/json') -> withStatus(500);
        }
    });

    //edit page
    $app -> get('/usersManagement/edit/{userID}', function(Request $request, Response $response, Array $arguments){
        //filter variables
        $userID = filter_var($arguments['userID'], FILTER_SANITIZE_STRING);
        //sql query
        $sqlQuery = "SELECT * FROM `users` WHERE `userID` = '$userID' LIMIT 1";

        try{
            //init database and connect
            $database = new Database();
            $connection = $database -> connect();

            //proceed query
            $proceedQuery = $connection -> query($sqlQuery);
            $userData = $proceedQuery -> fetchAll(PDO::FETCH_OBJ);

            //disconnect from db and remove object
            $database = null;

            //pass response data to template
            $responseData = [
                'userData' => reset($userData),
                'activeTemplate' => 'edit'
            ];

            //renderer declaration
            $renderer = new PhpRenderer('templates/usersManagement', $responseData);

            //render
            return $renderer -> render($response, 'main.php');
        }
        catch(PDOException $exception){
            //errors recognition - catch exception
            $errorData = [
                'expectionData' => $exception -> getMessage()
            ];

            $response -> getBody() -> write(json_encode($errorData));
            
            return $response -> withHeader('Content-type', 'application/json') -> withStatus(500);
        }

    }) -> setName('editPage');

    //edit user
    $app -> post('/usersManagement/edit/{userID}', function(Request $request, Response $response){
        //filter variables
        $userID = filter_var($request -> getParam('userData-id'), FILTER_SANITIZE_STRING);
        $userName = filter_var($request -> getParam('userData-name'), FILTER_SANITIZE_STRING);
        $userSurname = filter_var($request -> getParam('userData-surname'), FILTER_SANITIZE_STRING);
        $userEmail = filter_var($request -> getParam('userData-email'), FILTER_SANITIZE_STRING);
        $userPhone = filter_var($request -> getParam('userData-phone'), FILTER_SANITIZE_STRING);
        $userAge = filter_var($request -> getParam('userData-age'), FILTER_SANITIZE_STRING);

        //sql query
        $sqlQuery = "UPDATE `users` SET 
            `userName` = '$userName', 
            `userSurname` = '$userSurname',
            `userEmail` = '$userEmail',
            `userPhone` = '$userPhone',
            `userAge` = '$userAge'
        WHERE `userID` = '$userID' LIMIT 1";

        try{
            //init database and connect
            $database = new Database();
            $connection = $database -> connect();

            //proceed query
            $proceedQuery = $connection -> query($sqlQuery);
            $userData = $proceedQuery -> fetchAll(PDO::FETCH_OBJ);

            //disconnect from db and remove object
            $database = null;

            //set notification
            $this -> flash -> addMessage('notificationType', 'userModified');

            //redirect to user listing
            return $response -> withRedirect($this -> router -> pathFor('listing', [], []));
        }
        catch(PDOException $exception){
            //errors recognition - catch exception
            $errorData = [
                'expectionData' => $exception -> getMessage()
            ];

            $response -> getBody() -> write(json_encode($errorData));

            return $response -> withHeader('Content-type', 'application/json') -> withStatus(500);
        }

    }) -> setName('editAction');

    //add page
    $app -> get('/usersManagement/add', function(Request $request, Response $response){
        //pass response data to template
        $responseData = [
            'activeTemplate' => 'add'
        ];

        //renderer declaration
        $renderer = new PhpRenderer('templates/usersManagement', $responseData);

        //render
        return $renderer -> render($response, 'main.php');

    }) -> setName('addPage');

    //add user
    $app->post('/usersManagement/add', function(Request $request, Response $response){
        //filter variables
        $userName = filter_var($request -> getParam('userData-name'), FILTER_SANITIZE_STRING);
        $userSurname = filter_var($request -> getParam('userData-surname'), FILTER_SANITIZE_STRING);
        $userEmail = filter_var($request -> getParam('userData-email'), FILTER_SANITIZE_STRING);
        $userPhone = filter_var($request -> getParam('userData-phone'), FILTER_SANITIZE_STRING);
        $userAge = filter_var($request -> getParam('userData-age'), FILTER_SANITIZE_STRING);

        //sql query
        $sqlQuery = "INSERT INTO `users`(
            `userName`,
            `userSurname`,
            `userEmail`,
            `userPhone`,
            `userAge`
        )VALUES(
            '$userName', 
            '$userSurname',
            '$userEmail',
            '$userPhone',
            '$userAge'
        )";

        try{
            //init database and connect
            $database = new Database();
            $connection = $database -> connect();

            //proceed query
            $proceedQuery = $connection -> query($sqlQuery);

            //disconnect from db and remove object
            $database = null;

            //set notification
            $this -> flash -> addMessage('notificationType', 'userCreated');

            //redirect to user listing
            return $response -> withRedirect($this -> router -> pathFor('listing', [], []));
        }
        catch(PDOException $exception){
            //errors recognition - catch exception
            $errorData = [
                'expectionData' => $exception -> getMessage()
            ];

            $response -> getBody() -> write(json_encode($errorData));

            return $response -> withHeader('Content-type', 'application/json') -> withStatus(500);
        }

    }) -> setName('addAction');

    /*                                 */
    /* users management module - begin */
    /*                                 */
?>