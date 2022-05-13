<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use\App\Entity\Restaurant;
use\App\Entity\Menu;
use\App\Entity\Commentaire;
use\App\Entity\Client;
use App\Repository\RestaurantRepository;
use App\Repository\CommentaireRepository;
use App\Repository\ClientRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
class RestaurantMobileController extends AbstractController
{
    /**
    * @Route("/restaurant/mobile", name="app_restaurant_mobile")
    */
    public function index(): Response
    {
        return $this->render('restaurant_mobile/index.html.twig', [
            'controller_name' => 'RestaurantMobileController',
        ]);
    }

    /**
    * @Route("/listeRestaurant", name="listeRestaurant")
    */
    public function AllRestaurants(NormalizerInterface $Normalizer){
        $repo = $this->getDoctrine()->getRepository(Restaurant::class);
        $restaurants = $repo->findAll();
        $jsonContent = $Normalizer->normalize($restaurants, 'json', ['groups'=>'post:read']);

        return new Response(json_encode($jsonContent));
    }

    /**
    * @Route("/showRestaurant/{id}", name="showRestaurant")
    */
    public function ShowRestaurant(NormalizerInterface $Normalizer, $id){
        $repo = $this->getDoctrine()->getRepository(Restaurant::class);
        $restaurant = $repo->find($id);
        $jsonContent = $Normalizer->normalize($restaurant, 'json', ['groups'=>'post:read']);

        return new Response(json_encode($jsonContent));
    }

    /**
    * @Route("/addRestaurantJSON",name="addRestaurantJSON")
    */
    public function ajouterRestaurantJSON(Request $request,NormalizerInterface $Normalizer)
    {
        $em = $this->getDoctrine()->getManager();
        $resto = new Restaurant();

        $resto->setNom($request->get('nom'));
        $resto->setPosition($request->get('position'));
        $resto->setDateEntrer(new \DateTime());
        $resto->setImage($request->get('image'));
        $resto->setGerantRestaurant($request->get('gerantRestaurant'));
        $resto->setLikeRestaurant($request->get('likeRestaurant'));
        $resto->setDislikeRestaurant($request->get('dislikeRestaurant'));
        $em->persist($resto);
        $em->flush();
        $jsonContent = $Normalizer->normalize($resto, 'json',['groups'=>'post:read']);
        return new Response(json_encode($jsonContent));;
    }

    /**
    * @Route("/deleteRestaurantJSON", name="deleteRestaurantJSON")
    */
    public function deleteRestaurantJSON(Request $request)

        {$id=$request->get("id");
        $em=$this->getDoctrine()->getManager();
        $restaurant=$em->getRepository(Restaurant::class)->find($id);
        if($restaurant!=null)
        {$em->remove($restaurant);
            $em->flush();

            $serialize=new Serializer([new ObjectNormalizer()]);
            $formatted=$serialize->normalize("Restaurant supprimee avec succes");
            return new JsonResponse($formatted);
        }

        return new JsonResponse("id invalide");
    }

    /**
    *@Route("/updateRestaurantJSON", name="updateRestaurantJSON")
     */
    public function updateRestaurantJSON(Request $request)
    {  
        $idsoc=$request->get("id");
        $em=$this->getDoctrine()->getManager();
        $resto=$em->getRepository(restaurant::class)->find($idsoc);
        $resto->setNom($request->get('nom'));
        $resto->setPosition($request->get('position'));
        $resto->setDateEntrer(new \DateTime());
        $resto->setImage($request->get('image'));
        $resto->setGerantRestaurant($request->get('gerantRestaurant'));
        //$resto->setLikeRestaurant($request->get('likeRestaurant'));
        //$resto->setDislikeRestaurant($request->get('dislikeRestaurant'));
        $em->persist($resto);
            $em->flush();
            $serialize=new Serializer([new ObjectNormalizer()]);
            $formatted=$serialize->normalize("Restaurant modifiee avec succes");
            return new JsonResponse($formatted);

    }

    /**
    * @Route("/addLikeJSON",name="addLikeJSON")
    */
    public function ajouterLikeJSON(Request $request,NormalizerInterface $Normalizer)
    {
        $em = $this->getDoctrine()->getManager();
        $idsoc=$request->get("id");

        $resto=$em->getRepository(restaurant::class)->find($idsoc);

        $resto->setLikeRestaurant($resto->getLikeRestaurant() + 1);
        $em->persist($resto);
        $em->flush();
        $jsonContent = $Normalizer->normalize($resto, 'json',['groups'=>'post:read']);
        return new Response(json_encode($jsonContent));;
    }

    /**
    * @Route("/addDisLikeJSON",name="addDisLikeJSON")
    */
    public function ajouterDisLikeJSON(Request $request,NormalizerInterface $Normalizer)
    {
        $em = $this->getDoctrine()->getManager();
        $idsoc=$request->get("id");

        $resto=$em->getRepository(restaurant::class)->find($idsoc);

        $resto->setDislikeRestaurant($resto->getDislikeRestaurant() + 1);
        $em->persist($resto);
        $em->flush();
        $jsonContent = $Normalizer->normalize($resto, 'json',['groups'=>'post:read']);
        return new Response(json_encode($jsonContent));;
    }

}
