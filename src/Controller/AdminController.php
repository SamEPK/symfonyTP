<?php

namespace App\Controller;

use App\Entity\Topic;
use App\Entity\Reponse;
use App\Entity\Langue;
use App\Entity\Categorie;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class AdminController extends AbstractController
{
    #[Route('/', name: 'admin_dashboard')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $users = $entityManager->getRepository(User::class)->findAll();
        $topics = $entityManager->getRepository(Topic::class)->findAll();
        $reponses = $entityManager->getRepository(Reponse::class)->findAll();
        $langues = $entityManager->getRepository(Langue::class)->findAll();
        $categories = $entityManager->getRepository(Categorie::class)->findAll();

        return $this->render('admin/index.html.twig', [
            'users' => $users,
            'topics' => $topics,
            'reponses' => $reponses,
            'langues' => $langues,
            'categories' => $categories,
        ]);
    }

    #[Route('/users', name: 'admin_users')]
    public function manageUsers(EntityManagerInterface $entityManager): Response
    {
        $users = $entityManager->getRepository(User::class)->findAll();
        return $this->render('admin/users.html.twig', [
            'users' => $users,
        ]);
    }

    #[Route('/topics', name: 'admin_topics')]
    public function manageTopics(EntityManagerInterface $entityManager): Response
    {
        $topics = $entityManager->getRepository(Topic::class)->findAll();
        return $this->render('admin/topics.html.twig', [
            'topics' => $topics,
        ]);
    }

    #[Route('/reponses', name: 'admin_reponses')]
    public function manageReponses(EntityManagerInterface $entityManager): Response
    {
        $reponses = $entityManager->getRepository(Reponse::class)->findAll();
        return $this->render('admin/reponses.html.twig', [
            'reponses' => $reponses,
        ]);
    }

    #[Route('/langues', name: 'admin_langues')]
    public function manageLangues(EntityManagerInterface $entityManager): Response
    {
        $langues = $entityManager->getRepository(Langue::class)->findAll();
        return $this->render('admin/langues.html.twig', [
            'langues' => $langues,
        ]);
    }

    #[Route('/categories', name: 'admin_categories')]
    public function manageCategories(EntityManagerInterface $entityManager): Response
    {
        $categories = $entityManager->getRepository(Categorie::class)->findAll();
        return $this->render('admin/categories.html.twig', [
            'categories' => $categories,
        ]);
    }
}