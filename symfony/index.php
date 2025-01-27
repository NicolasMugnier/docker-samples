<?php

require_once __DIR__.'/bootstrap.php';

$albumRepository = $entityManager->getRepository(Docker\App\BusinessRules\Entities\Album::class);
$albums = $albumRepository->findAll();

$str = '<h1>Albums</h1>';
$str .= '<ul>';
foreach ($albums as $album) {
    $str .= '<li>'.$album->title.' ('.$album->artist.')</li>';
}
$str .= '</ul>';

echo $str;
