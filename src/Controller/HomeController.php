<?php

/**
 * Created by PhpStorm.
 * User: anisbensaad
 * Date: 01/02/2019
 * Time: 10:36
 */
namespace App\Controller;

use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController {

  /**
   * @param PropertyRepository $repository
   * @return Response
   */
  public function index(PropertyRepository $repository): Response
  {

    $properties = $repository->findLatest();
    return $this->render('pages/home.html.twig',[
      'properties' => $properties
    ]);

  }

}