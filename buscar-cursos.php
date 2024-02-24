<?php
require 'vendor/autoload.php';
require './src/Buscador.php';

use clevison\BuscadorDeCursos\Buscador;
use \GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['base_uri' => 'https://cursos.alura.com.br/']);
$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);
$courses = $buscador->buscar('/category/programacao/php');

foreach ($courses as $course) {
    echo $course . PHP_EOL;
}
