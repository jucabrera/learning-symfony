<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky/number/{max}")
     * @return Response
     * @throws \Exception
     */
    public function number($max, LoggerInterface $logger)
    {
        $number = random_int(0, $max);
//        $logger->info('We are logging');
        return $this->render("lucky/number.html.twig", ['number' => $number]);
    }
}