<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Project;

class ProjectController extends Controller
{
    /**
     * @Route("/project", name="project")
     */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $project = new Project();
        $project->setName('Bomberman');
        $project->setDescription('c\'etait cool !');
        $project->setLink('peu importe pour l\'instant');
        $project->setGit('pareil, pas la priorité tout de suite');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($project);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ProjectController.php',
        ]);
    }

    /**
    * @Route("/project/{id}", name="project_show", requirements={"id"="\d+"})
    */
    public function show($id)
    {
        $project = $this->getDoctrine()
            ->getRepository(Project::class)
            ->find($id);

        if (!$project) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return $this->json('Check out this great product: '.$project->getName());

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }

     /**
    * @Route("/project/all", name="project_showAll")
    */
    // public function indexAll()
    // {
    //     $repository = $this->getDoctrine()
    //     ->getRepository(Project::class)->findAll();

    //     // $project = $repository;

    //     return $this->render('admin/index.html.twig', ['projects' => $repository]);
    // }

}
