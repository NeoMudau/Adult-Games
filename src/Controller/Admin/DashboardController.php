<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\GameModuleRepository;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // return $this->redirectToRoute('admin_user_index');

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirectToRoute('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin\dashboard.html.twig');
    }

    public function __construct(
    private readonly GameModuleRepository $gameModuleRepository,
    ) {
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Adult Games');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard(
            'Dashboard',
            'fa fa-home'
        );

        yield MenuItem::linkTo(
            UserCrudController::class,
            'Manage Users',
            'fas fa-user'
        );

        yield MenuItem::section('Games');

        $gameModules = $this->gameModuleRepository->findBy([
            'enabled' => true,
        ]);

        foreach ($gameModules as $gameModule) {
            $bundleClass = $gameModule->getBundleClass();

            if (!class_exists($bundleClass)) {
                continue;
            }

            if (!is_subclass_of($bundleClass, \App\Game\GameBundleInterface::class)) {
                continue;
            }

            $adminItems = [];

            foreach ($bundleClass::getAdminMenuItems() as $adminItem) {
                $adminItems[] = MenuItem::linkTo(
                    $adminItem['controller'],
                    $adminItem['label'],
                    $adminItem['icon'] ?? 'fas fa-circle'
                );
            }

            if ($adminItems === []) {
                continue;
            }

            yield MenuItem::subMenu(
                $gameModule->getName(),
                'fas fa-gamepad'
            )->setSubItems($adminItems);
        }
    }
}
