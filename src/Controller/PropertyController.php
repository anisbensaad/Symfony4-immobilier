<?php
/**
 * Created by PhpStorm.
 * User: anisbensaad
 * Date: 01/02/2019
 * Time: 11:53
 */

namespace App\Controller;


use App\Entity\Property;
use App\Repository\PropertyRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController {

  /**
   * @var PropertyRepository
   */
  private $repository;

  public function __construct(PropertyRepository $repository, ObjectManager $em){
    $this->repository = $repository;
    $this->em = $em;
  }

  /**
   * @Route("/biens", name="property.index")
   * @return Response
   */

  public function index():Response{

    /*
    $property = new Property();

    $property->setTitle('Mon premier bien')
      ->setPrice(200000)
      ->setRooms(4)
      ->setBedrooms(3)
      ->setDescription('Une petite description')
      ->setSurface(90)
      ->setFloor(4)
      ->setHead(1)
      ->setCity('Montpellier')
      ->setAddress('15 boulvard omek')
      ->setPostalCode('34000');
    $em = $this->getDoctrine()->getManager();
    $em->persist($property);
    $em->flush(); */
   //  $repository = $this->getDoctrine()->getRepository(Property::class);

    //$property = $this->repository->findAllVisible();

    //$property[0]->setSold(false);
    //$this->em->flush();
    //dump($property);
    return $this->render('property/index.html.twig',[
        'current_menu' => 'properties'
    ]);

  }

  /**
   * @Route("/bien/{slug}-{id}", name="property.show", requirements={"slug": "[a-z0-9\-]*"})
   * $param Property $property
   * @return Response
   */
  public function show(Property $property, string $slug): Response
  {
    if($property->getSlug() !== $slug){
      return $this->redirectToRoute('property.show',[
        'id'=> $property->getId(),
        'slug'=>$property->getSlug()
      ], 301);
    }
    return $this->render('property/show.html.twig',[
      'property' => $property,
      'current_menu' => 'properties'
    ]);
  }

}