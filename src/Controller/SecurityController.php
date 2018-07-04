<?php

namespace App\Controller;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Controller\ProjectController;
use App\Entity\Project;

class SecurityController extends AbstractController
{
    /**
     * @Route("/connexion", name="connexion")
     */
    public function connexion(Request $request, AuthenticationUtils $authenticationUtils)
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
 
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
 
        return $this->render('security/connexion.html.twig', array(
        'last_username' => $lastUsername,
        'error'         => $error,
        ));
    }
    /**
     * La route pour se deconnecter.
     * 
     * Mais celle ci ne doit jamais être executé car symfony l'interceptera avant.
     *
     *
     * @Route("/logout", name="security_logout")
     */
    public function logout(): void
    {
        throw new \Exception('This should never be reached!');
    }
 
    //
     /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        $repository = $this->getDoctrine()
        ->getRepository(Project::class)->findAll();

        // $project = $repository;

        return $this->render('admin/index.html.twig', ['projects' => $repository]);
    }

    //
    /**
     * @Route("/admin/new", name="admin_new")
     */
    public function add()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $project = new Project();
        $project->setName($_POST['name']);
        $project->setDescription($_POST['description']);
        $project->setLink($_POST['link']);
        $project->setGit($_POST['git']);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($project);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->render('admin/new.html.twig', ['project' => $project, 'message' => 'You add a new project : ']);
    }

    //
    /**
     * @Route("/admin/remove/{id}", name="admin_remove", requirements={"id"="\d+"})
     */
    public function remove($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $project = $entityManager->getRepository(Project::class)->find($id);
        $name = $project->getName();
        $entityManager->remove($project);
        $entityManager->flush();

        return $this->render('admin/delete.html.twig', ['name' => $name]);
    }

    //
    /**
     * @Route("/admin/update/{id}", name="admin_update", requirements={"id"="\d+"})
     */
    public function update($id)
    {
        $project = $this->getDoctrine()->getManager()->getRepository(Project::class)->find($id);

        return $this->render('admin/update.html.twig', ['project' => $project]);
    }

    //
    /**
     * @Route("/admin/update/validation/{id}", name="admin_update-validation", requirements={"id"="\d+"})
     */
    public function updateValidation($id)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $project = $this->getDoctrine()->getManager()->getRepository(Project::class)->find($id);
        $project->setName($_POST['name']);
        $project->setDescription($_POST['description']);
        $project->setLink($_POST['link']);
        $project->setGit($_POST['git']);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($project);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->render('admin/new.html.twig', ['project' => $project, 'message' => 'Your modification has been accept : ']);
    }
}
