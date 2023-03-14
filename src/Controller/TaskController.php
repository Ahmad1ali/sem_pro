<?php

namespace App\Controller;
use App\Entity\Task;
use App\Form\TaskType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{

    #[Route('/taskform',name: 'app_task')]
    public function new(Request $request,EntityManagerInterface $entityManager): Response
    {
        $task = new Task();
        // ...
//       $managerRegistry = $doctrine->getRepository( Task::class)->findAll();

        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();

            // ... perform some action, such as saving the task to the database
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('app_task');
        }

        return $this->renderForm('task/taskform.html.twig', [
            'form' => $form,
//            'show'=>$ManagerRegistryr,
        ]);
    }
}