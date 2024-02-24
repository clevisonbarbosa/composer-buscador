<?php

namespace clevison\BuscadorDeCursos;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    public function __construct(ClientInterface $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    public function buscar(string $url): array
    {
        $response = $this->httpClient->request('GET', '$url');
        $html = $response->getBody();

        $this->crawler->addHtmlContent($html);

        $elementCourses =  $this->crawler->filter('span.course-card__name');
        $courses = [];

        foreach ($elementCourses as $elementCourse) {
            $courses = $elementCourse->textContent;
        }
        return $courses;
    }
}
