<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use App\Form\EleveType;
use App\Entity\Eleve;
use App\Form\ClasseType;
use App\Entity\Classe;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{
    public function index(Request $request)
    {   
        $eleve = neW Eleve();
        $form = $this->createForm(EleveType::class, $eleve);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $eleve = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($eleve);
            $entityManager->flush();
            return $this->redirectToRoute('page');
    }

        return $this->render('home.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function page(Request $request)
    {   
        $classe = neW Classe();
        $form = $this->createForm(ClasseType::class, $classe);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $classe = $form->getData();
            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($classe);
            $entityManager->flush();
            return $this->redirectToRoute('index');
    }
        



        return $this->render('class.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}