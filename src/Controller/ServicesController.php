<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class ServicesController extends AbstractController
{
    #[Route('/services', name: 'app_services.index')]//Cette partie affiche la page des services du zoo
    public function index(Request $request): Response
    {
      return $this-> render('services/index.html.twig');
    }

    //Cette méthode redirige vers un service séléctionné par l"utilisateur
    #[Route('/services/{slug}-{id}', name: 'app_services.show', requirements: ['id' => '\d+', 'slug' => '[a-z0-9-]+'])] //requirements : spécifie le format attendu dans les paramètres de l'url avec des expressions régulières ici avec "slug" et "l'id".
    public function show(Request $request, string $slug, int $id): Response
    {
      return $this->render('services/showTarif.html.twig', [
        'slug' => $slug,
        'id' => $id,
      ]);
      
    }
    
}
