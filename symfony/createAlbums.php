<?php

require_once "bootstrap.php";

use Docker\App\BusinessRules\Entities\Album;

$fixtures = [
  [
    'title' => 'Burn My Eyes',
    'artist' => 'Machine Head'
  ],
  [
    'title' => 'Aggression Continuum',
    'artist' => 'Fear Factory'
  ],
  [
    'title' => 'Black Album',
    'artist' => 'Metallica' 
  ]
];

foreach ($fixtures as $fixture) {
    $album = new Album(
        title: $fixture['title'], 
        artist: $fixture['artist']
    );

    $entityManager->persist($album);
    $entityManager->flush();

    echo "Created album with ID " . $album->getId() . "\n";
}
