<?php

namespace App\Controller;
use App\Entity\Car;

use App\Form\CarsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarsController extends AbstractController
{
    #[Route('/cars', name: 'app_cars')]
    public function ShowCars(Request $request,EntityManagerInterface $entityManager): Response
    {
        $Car = new Car();
        // ...
//       $managerRegistry = $doctrine->getRepository( Task::class)->findAll();

        $form = $this->createForm(CarsType::class, $Car);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $Car = $form->getData();
            //dd($order);

            // ... perform some action, such as saving the task to the database
            $entityManager->persist($Car);
            $entityManager->flush();

            return $this->redirectToRoute('app_cars');
        }


        return $this->renderForm('cars/car.html.twig', [
            'form' => $form,
        ]);
    }
}
