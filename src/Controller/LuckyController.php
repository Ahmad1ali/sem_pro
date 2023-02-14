<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
 use Symfony\Component\Routing\Annotation\Route;
class LuckyController extends AbstractController
{

    public function number(): Response
    {
        $number = random_int(0, 100);
        return $this->render('bezoker/number.html.twig', ['number'=>$number]);
        return new Response(
//            '<html><body>Lucky number: ' . $number . '</body></html>'
        );
    }


//    #[Route('/lucky/morgen')]
//     public function morgenMeneerjong(){
//        return new Response(
//            '<html><body><h1 class = text-danger >Goedemorgen</h1></body></html>'
//        );
//    }
   #[Route('/goedemorgen')]
    public function morgenMeneerjong(){
        $morgen = "Goedemorgen";
        return $this->render('bezoker/voorbeeld.html.twig',['morgenMeneerjong'=>$morgen]);

//       return new Response(
//           '<html><body><h1 class = text-danger >Goedemorgen</h1></body></html>'
//    );
}


}