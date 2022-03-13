<?php

require_once 'vendor/autoload.php';

use App\config\SqLiteConfig;
use App\Connections\SqLiteConnector;
use App\Entities\Article\Article;
use App\Entities\Article\ArticleInterface;
use App\Exceptions\UserNotFoundException;
use App\Factories\EntityFactory;
use App\Factories\RepositoryFactory;

//try {
//    echo EntityFactory::getInstance()->create($argv[1]) . PHP_EOL;
//}catch (Exception $e){
//    var_dump($e->getMessage());
//}

$repositoryFactory = new RepositoryFactory(new SqLiteConnector());

//$user = EntityFactory::getInstance()->create('user');
//
//$userRepository = $repositoryFactory->create('user');
//
//$userRepository->save($user);

//$article = EntityFactory::getInstance()->create('article');
//
//$articleRepository = $repositoryFactory->create('article');
//
//$articleRepository->save($article);

$comment = EntityFactory::getInstance()->create('comment');

$commentRepository = $repositoryFactory->create('comment');

$commentRepository->save($comment);







//$entityRepository = $factory->create($user);
//
//$entityRepository->save($user);
//
//try{
//    $entityRepository->get(34);
//}catch (UserNotFoundException $e){
//    echo $e->getMessage();
//}


