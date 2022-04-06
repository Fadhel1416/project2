<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
class PostController extends AbstractController
{
    /**
     * @Route("/post", name="app_post")
     */
    public function index(): Response
    {
        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }

    /**
     * @Route("/posts/lists", name="list_posts")
     */
    public function List(PostRepository $postrep): Response 
    {
        $posts=$postrep->findBy(array("user"=>$this->getUser()));
        return $this->render('post/index.html.twig', [
            'posts' =>$posts,
        ]);
    }



    }
