<?php

namespace App\Controller;

use App\Entity\Programme;
use App\Form\ProgrammeType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProgrammeController extends AbstractController
{
    #[Route('/animation', name: 'app_programme')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $programme = new Programme();
        $form = $this->createForm(ProgrammeType::class, $programme);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($programme);
            $entityManager->flush();

            return $this->redirectToRoute('app_home');
        }

        return $this->render('programme/index.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/animation/{id}/edit', name: 'app_programme_edit')]
    public function edit(Request $request, EntityManagerInterface $entityManager, $id): Response
    {
        $programme = $entityManager->getRepository(Programme::class)->find($id);

        $form = $this->createForm(ProgrammeType::class, $programme);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_home');
        }

        return $this->render('programme/edit.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/animation/{id}/delete', name: 'app_programme_delete')]
    public function delete(EntityManagerInterface $entityManager, Programme $programme): Response
    {
        $entityManager->remove($programme);
        $entityManager->flush();

        return $this->redirectToRoute('app_home');
    }
}
