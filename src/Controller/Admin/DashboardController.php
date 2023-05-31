<?php

namespace App\Controller\Admin;

use App\Entity\Education;
use App\Entity\Experience;
use App\Entity\Projects;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/patate92', name: 'admin', methods: ['GET', 'POST'])]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    #[Route('/admin')]
    public function redirectToHome() {
        return $this->redirectToRoute('app_home');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Espace d\'administration')
            ->setFaviconPath('/assets/favicon.ico');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Projects', 'fas fa-cubes', Projects::class);
        yield MenuItem::linkToCrud('Experiences', 'fas fa-cubes', Experience::class);
        yield MenuItem::linkToCrud('Education', 'fas fa-cubes', Education::class);
    }
}
