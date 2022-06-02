<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Review;
use App\Entity\User;
use App\Repository\ProductRepository;
use App\Repository\ReviewRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class MainController extends AbstractController
{

    #[Route('/', name: 'app_main')]
    public function index(ReviewRepository $reviewRepository): Response
    {
//        $hasAccess = $this->isGranted('ROLE_USER');
//        if (!$hasAccess)
//            return $this->redirect('/login');
//        if ($this->getUser()!=null){
//            var_dump($this->getUser());
//        }

        $user = new User();
        $review = $reviewRepository->findBy([], ['dateReview' => 'DESC']);

        if ($this->getUser() == null) {
            return $this->render('main/index.html.twig', [
                'review' => $review, 'userName' => null,
            ]);
        }

        return $this->render('main/index.html.twig', [
            'review' => $review, 'userName' => $user = $this->getUser()->getName(),
        ]);

    }


}