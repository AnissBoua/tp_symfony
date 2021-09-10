<?php

namespace App\Controller\Admin;

use App\Entity\Auteur;
use App\Entity\Editeur;
use App\Entity\Fournisseur;
use App\Entity\Genre;
use App\Entity\Produit;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Tp Symfony');
    }

    public function configureMenuItems(): iterable
    {
        return [
            yield MenuItem::linkToUrl('Accueil', 'fa fa-home', '/'),
            yield MenuItem::linkToCrud('Users', 'fas fa-tags', User::class),
            yield MenuItem::section('Mes BD'),
            yield MenuItem::linkToCrud('Auteurs', 'fas fa-tags', Auteur::class),
            yield MenuItem::linkToCrud('Produits', 'fas fa-tags', Produit::class),
            yield MenuItem::linkToCrud('Genres', 'fas fa-tags', Genre::class),
            yield MenuItem::linkToCrud('Editeurs', 'fas fa-tags', Editeur::class),
            yield MenuItem::linkToCrud('Fournisseur', 'fas fa-tags', Fournisseur::class)
            
        ];
        // yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');

        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }

    public function configureAssets(): Assets
    {
        return Assets::new()->addCssFile('css/admin.css');
    }
}
