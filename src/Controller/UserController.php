<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Controller\ProjectController;
use App\Entity\Project;

class UserController extends Controller
{
    /**
     * @Route("/", name="user")
     */
    public function index()
    {
        $repository = $this->getDoctrine()
        ->getRepository(Project::class)->findAll();

        // $project = $repository;

        return $this->render('user/index.html.twig', ['projects' => $repository]);
    }
}
