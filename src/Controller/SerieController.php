<?php

namespace App\Controller;

use App\Entity\Serie;
use App\Form\SerieType;
use App\Repository\SerieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/series', name: 'serie')]
class SerieController extends AbstractController
{
    #[Route('/', name: '_series')]
    public function series(
        SerieRepository $serieRepository // Injection de dépendances
    ): Response
    {
        $tabDeSeries = $serieRepository->findAll();
        return $this->render(
            'serie/series.html.twig',
            compact('tabDeSeries')
        );
    }

    #[Route(
        '/{serie}',
        name: '_serie',
        requirements: ["serie" => '\d+']
    )]
    public function serie(
        Serie $serie,
//        SerieRepository $serieRepository
    ): Response
    {
//        $serie = $serieRepository->findOneBy(
//            ["id" => $id]   // WHERE
//        ); // En récupérer un seul
        return $this->render(
            'serie/serie.html.twig',
            compact('serie')
        );
    }

    #[Route('/ajouter', name: '_ajouter')]
    public function ajouter(): Response
    {
        $serie = new Serie();
        $serie->setNom("Game Of Throne");
        $serieForm = $this->createForm(SerieType::class, $serie);
        return $this->render(
            'serie/ajouter.html.twig',
            compact('serieForm')
        );
    }
}
