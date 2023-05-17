<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Photo;
use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class dashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    )
    {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(ProductCrudController::class)
            ->generateUrl();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($url);

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Quai Antique');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Menus');

        yield MenuItem::subMenu('Produits')->setSubItems([
            MenuItem::linkToCrud('Create Product', 'fa fa-plus', Product::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Products', 'fa fa-eye', Product::class)
        ]);

        yield MenuItem::subMenu('Categories')->setSubItems([
            MenuItem::linkToCrud('Create Category', 'fa fa-plus', Category::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Categories', 'fa fa-eye', Category::class)
        ]);

        yield MenuItem::subMenu('Images') ->setSubItems([
                MenuItem::linkToCrud('Create Image', 'fa-regular fa-images', Photo::class)->setAction(Crud::PAGE_NEW),
                MenuItem::LinkToCrud('Show Images', 'fa fa-eye', Photo::class)
            ]);
    }
}
