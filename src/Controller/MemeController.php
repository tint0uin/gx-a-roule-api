<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\MemeRepository;
use App\Repository\TagRepository;
use App\Entity\Meme;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Form\MemeType;
use Symfony\Component\HttpFoundation\Request;
use App\Service\TagService;


class MemeController extends AbstractController
{
    #[Route('/meme', name: 'app_meme')]
    public function index(MemeRepository $memeRepository): Response
    {
        return $this->render('meme/index.html.twig', [
            'memes' => $memeRepository->findAll(),
        ]);
    }

    #[Route('/meme/add', name: 'app_add_meme')]
    public function add(Request $request, MemeRepository $memeRepository, TagService $TagService, TagRepository $tagRepo): Response
    {
        $meme = new Meme();

        $form = $this->createForm(MemeType::class, $meme);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $tags = $form->get('tag')->getData();

            $TagService->AddTagAtMemeStr($meme, $tags, $tagRepo);
            

            $memeRepository->save($meme, true);

            return $this->redirectToRoute('app_meme', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('meme/new.html.twig', [
            'meme' => $meme,
            'form' => $form,
        ]);


       
    }
}
