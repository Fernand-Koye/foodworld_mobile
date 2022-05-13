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

class MenuMobileController extends AbstractController
{
    /**
     * @Route("/menu/mobile", name="app_menu_mobile")
     */
    public function index(): Response
    {
        return $this->render('menu_mobile/index.html.twig', [
            'controller_name' => 'MenuMobileController',
        ]);
    }

    /**
    * @Route("/listeMenu", name="listeMenu")
    */
    public function AllMenus(NormalizerInterface $Normalizer){
        $repo = $this->getDoctrine()->getRepository(Menu::class);
        $menus = $repo->findAll();
        $jsonContent = $Normalizer->normalize($menus, 'json', ['groups'=>'post:read']);

        return new Response(json_encode($jsonContent));
    }

    /**
    * @Route("/showMenu/{idRestaurant}", name="showMenu")
    */
    public function ShowMenu(NormalizerInterface $Normalizer, $idRestaurant){
        $repo = $this->getDoctrine()->getRepository(Menu::class);
        $menu = $repo->findBy(array('idRestaurant' => $idRestaurant));
        $jsonContent = $Normalizer->normalize($menu, 'json', ['groups'=>'post:read']);

        return new Response(json_encode($jsonContent));
    }

    /**
    * @Route("/addMenuJSON",name="addMenuJSON")
    */
    public function ajouterMenuJSON(Request $request,NormalizerInterface $Normalizer)
    {
        $em = $this->getDoctrine()->getManager();
        $menu = new menu();

        $menu->setNom($request->get('nom'));
        $menu->setQuantite($request->get('quantite'));
        $menu->setDateMiseEnRayon(new \DateTime());
        $menu->setDatePeremption(new \DateTime());
        $menu->setPrix($request->get('prix'));
        $menu->setImgSrc($request->get('imgsrc'));
        $menu->setIdRestaurant($request->get('idRestaurant'));
        $em->persist($menu);
        $em->flush();
        $jsonContent = $Normalizer->normalize($menu, 'json',['groups'=>'post:read']);
        return new Response(json_encode($jsonContent));;
    }

    /**
    * @Route("/deleteMenuJSON", name="deleteMenuJSON")
    */
    public function deleteMenuJSON(Request $request)

        {$id=$request->get("id");
        $em=$this->getDoctrine()->getManager();
        $menu=$em->getRepository(Menu::class)->find($id);
        if($menu!=null)
        {$em->remove($menu);
            $em->flush();

            $serialize=new Serializer([new ObjectNormalizer()]);
            $formatted=$serialize->normalize("Restaurant supprimee avec succes");
            return new JsonResponse($formatted);
        }

        return new JsonResponse("id invalide");
    }

    /**
    *@Route("/updateMenuJSON", name="updateMenuJSON")
     */
    public function updateMenuJSON(Request $request)
    {  
        $idsoc=$request->get("id");
        $em=$this->getDoctrine()->getManager();
        $menu=$em->getRepository(Menu::class)->find($idsoc);
        $menu->setNom($request->get('nom'));
        $menu->setQuantite($request->get('quantite'));
        $menu->setDateMiseEnRayon(new \DateTime());
        $menu->setDatePeremption(new \DateTime());
        $menu->setPrix($request->get('prix'));
        $menu->setImgSrc($request->get('imgsrc'));
        $menu->setIdRestaurant($request->get('idRestaurant'));
        $em->persist($menu);
            $em->flush();
            $serialize=new Serializer([new ObjectNormalizer()]);
            $formatted=$serialize->normalize("Restaurant modifiee avec succes");
            return new JsonResponse($formatted);

    }
}
