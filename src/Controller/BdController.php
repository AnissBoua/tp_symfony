<?php

namespace App\Controller;

use App\Entity\Auteur;
use App\Entity\Produit;
use App\Repository\AuteurRepository;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BdController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('bd/home.html.twig');
    }

    /**
     * @Route("/auteurs", name="bd")
     */
    public function auteurs(): Response
    {
        $auteursRepo = $this->getDoctrine()->getRepository(Auteur::class);
        $auteurs = $auteursRepo->findAll();

        return $this->render('bd/index.html.twig', [
            'auteurs' => $auteurs,
        ]);
    }

    /**
     * @Route("/livre/auteur/{id}", name="bd_show")
     */
    public function show($id, ProduitRepository $produitRepo)
    {
        $produits = $produitRepo->findBy(array("auteur" => $id));
        //$couvertures = ['BD000001', 'BD000007', 'BD000013'];

        $couvertures = array();
        $dir = "images/";
        if ($dossier = opendir($dir)) {
            while (($item = readdir($dossier)) !== false) {
                if ($item[0] == '.') {
                    continue;
                }
                $pos_point = strpos($item, '.');
                $item = substr($item, 0, $pos_point);
                $couvertures[] = strtoupper($item);
            }
            closedir($dossier);
        }

        return $this->render('bd/show.html.twig', [
            'produits' => $produits,
            'couvertures' => $couvertures
        ]);
    }
}
