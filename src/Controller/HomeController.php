<?php

namespace App\Controller;

use App\Repository\TopicRepository;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        TopicRepository $topicRepository,
        CategorieRepository $categorieRepository
    ): Response {
        return $this->render('home/index.html.twig', [
            'latestTopics' => $topicRepository->findBy([], ['datePublication' => 'DESC'], 5),
            'categories' => $categorieRepository->findAll(),
        ]);
    }
}
