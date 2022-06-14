<?php

namespace App\Controller;

use App\Entity\Klienci;
use App\Form\KlienciType;
use App\Repository\KlienciRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/')]
class KlienciController extends AbstractController
{
    #[Route('/', name: 'app_klienci_index', methods: ['GET'])]
    public function index(KlienciRepository $klienciRepository): Response
    {
        return $this->render('klienci/index.html.twig', [
            'kliencis' => $klienciRepository->findAll(),g
        ]);
    }

    #[Route('/new', name: 'app_klienci_new', methods: ['GET', 'POST'])]
    public function new(Request $request, KlienciRepository $klienciRepository): Response
    {
        $klienci = new Klienci();
        $form = $this->createForm(KlienciType::class, $klienci);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $klienciRepository->add($klienci, true);

            return $this->redirectToRoute('app_klienci_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('klienci/new.html.twig', [
            'klienci' => $klienci,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_klienci_show', methods: ['GET'])]
    public function show(Klienci $klienci): Response
    {
        return $this->render('klienci/show.html.twig', [
            'klienci' => $klienci,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_klienci_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Klienci $klienci, KlienciRepository $klienciRepository): Response
    {
        $form = $this->createForm(KlienciType::class, $klienci);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $klienciRepository->add($klienci, true);

            return $this->redirectToRoute('app_klienci_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('klienci/edit.html.twig', [
            'klienci' => $klienci,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_klienci_delete', methods: ['POST'])]
    public function delete(Request $request, Klienci $klienci, KlienciRepository $klienciRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$klienci->getId(), $request->request->get('_token'))) {
            $klienciRepository->remove($klienci, true);
        }

        return $this->redirectToRoute('app_klienci_index', [], Response::HTTP_SEE_OTHER);
    }
}
