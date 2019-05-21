<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(1999);
        $product->setDescription('Ergonomic and stylish');

        $entityManager->persist($product);
        $entityManager->flush();

        return new Response("Saved new product with id {$product->getId()}");
    }

    /**
     * @Route("/product/{id}", name="product_show")
     */
    public function show($id)
    {
        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);;

        if(!$product)
        {
            throw $this->createNotFoundException("No product found for id {$id}");
        }

        return $this->render("product/show.html.twig",['product'=> $product]);
    }

    /**
     * @Route("/product_list", name="product_list")
     */
    public function list()
    {
        $repository = $this->getDoctrine()->getRepository(Product::class);
        $products = $repository->findAll();

        if(!$products)
        {
            throw $this->createNotFoundException("No products found");
        }

        return $this->render("product/list.html.twig", ['products' => $products]);
    }
}
