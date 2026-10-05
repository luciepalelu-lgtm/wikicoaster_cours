<?php 

namespace App\Controller;

use App\Entity\Coaster;
use App\Form\CoasterType;
use App\Repository\CoasterRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;



class CoasterController extends AbstractController
{
    #[Route('/coaster/add')]
    public function add(Request $request, EntityManagerInterface $em): Response
    {
        $entity = new Coaster();
        $form = $this->createForm(CoasterType::class, $entity);


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $em->persist($entity);
            $em->flush();

            return $this->redirectToRoute('app_app_index');
        }

        return $this->render('coaster/add.html.twig',[
            'coasterForm' => $form,
        ]);
    }


    #[Route('/coaster', name:'app_app_index')]
    public function index(CoasterRepository $coasterRepository):Response{
        $coaster = $coasterRepository->findAll();
        return $this->render('coaster/index.html.twig',[
            'coasters' => $coaster,
        ]);

    }


}