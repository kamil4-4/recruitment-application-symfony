<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use Symfony\Component\HttpFoundation\Response;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        return $this->redirect($this->generateUrl('admin_application_index'));
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()->setTitle('Recruitment Admin');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkTo(ApplicationCrudController::class, 'Applications', 'fa fa-users');
        yield MenuItem::linkToRoute('API docs', 'fa fa-book', 'api_doc');
        yield MenuItem::linkToLogout('Logout', 'fa fa-sign-out-alt');
    }
}
