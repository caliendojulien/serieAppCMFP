<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Home2Controller extends AbstractController
{
    #[Route('/index', name: 'home2_index')]
    public function index(): Response
    {
        return $this->render('home2/index.html.twig', [
            'controller_name' => 'Home2Controller',
        ]);
    }

    #[Route('/index2', name: 'home2_index2')]
    public function index2(): Response
    {
        $prenom = '<script>alert("salut");</script>Julien';
        $consoles = [
            "playStation",
            "xbox",
            "pc"
        ];
        return $this->render(
            'home2/index.html.twig',
            compact('prenom', 'consoles')
        );

        return $this->render(
            'home2/index.html.twig',
            [
                "prenom" => $prenom
            ]
        );
    }
}
