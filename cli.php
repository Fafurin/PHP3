<?php

use App\Commands\Create\CreateArticleCommand;
use App\Commands\Create\CreateArticleCommandHandler;
use App\Commands\Create\CreateCommentCommand;
use App\Commands\Create\CreateCommentCommandHandler;
use App\Commands\Delete\DeleteArticleCommandHandler;
use App\Commands\Delete\DeleteCommand;
use App\Commands\Delete\DeleteCommentCommandHandler;
use App\Commands\Delete\DeleteUserCommandHandler;
use App\Connections\SqLiteConnector;
use App\Commands\Create\CreateUserCommand;
use App\Commands\Create\CreateUserCommandHandler;
use App\Entities\Article\Article;
use App\Entities\Comment\Comment;
use App\Entities\User\User;
use App\Factories\RepositoryFactory;

require_once 'vendor/autoload.php';


//try {
//    echo EntityFactory::getInstance()->create($argv[1]) . PHP_EOL;
//}catch (Exception $e){
//    var_dump($e->getMessage());
//}

$repositoryFactory = new RepositoryFactory(new SqLiteConnector());





//$repositoryFactory = new RepositoryFactory(new SqLiteConnector());
//
//$userRepository = $repositoryFactory->create('user');
//
//var_dump($userRepository->get(3));

//$commandHandler = new DeleteArticleCommandHandler();
//$commandHandler->handle(
//    new DeleteCommand(3));

//$commandHandler = new CreateArticleCommandHandler();
//$commandHandler->handle(
//    new CreateArticleCommand(
//        new Article('234', new User('2','Ivan','Ivanov','ii@ii.com'), 'Title2', 'Text...')
//    ));

//$commandHandler = new CreateCommentCommandHandler();
//$commandHandler->handle(
//    new CreateCommentCommand(
//        new Comment('234', new User('2','Pavel','Ivanov','pi@ii.com'),
//                    new Article('234', new User('2','Ivan','Ivanov','ii@ii.com'), 'Title', 'Text...'), 'Text'
//    )));

$commandHandler = new DeleteCommentCommandHandler();
$commandHandler->handle(
    new DeleteCommand(5));