<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SimpleApiController extends AbstractController
{
    /**
     * @Route("/api")
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function index(){

        return $this->json(['message' => "Hi! It's a simple API"]);
    }

}