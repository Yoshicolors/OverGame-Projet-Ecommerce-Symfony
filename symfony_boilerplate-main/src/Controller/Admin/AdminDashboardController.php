<?php

namespace App\Controller\Admin;

use App\Repository\CategoryRepository;
use App\Repository\OrderRepository;
use App\Repository\ProductRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class AdminDashboardController extends AbstractController
{
    #[Route('/', name: 'app_admin_dashboard')]
    public function index(
        UserRepository $userRepository,
        ProductRepository $productRepository,
        OrderRepository $orderRepository,
        CategoryRepository $categoryRepository
    ): Response {
        $totalUsers = count($userRepository->findAll());
        $totalProducts = count($productRepository->findAll());
        $totalOrders = count($orderRepository->findAll());
        
        $productsByCategory = $categoryRepository->countProductsByCategory();
        $latestOrders = $orderRepository->findLatestOrders(5);
        $productAvailability = $productRepository->countByStatus();
        $salesStats = $orderRepository->getSalesStatistics();

        return $this->render('admin/dashboard/index.html.twig', [
            'totalUsers' => $totalUsers,
            'totalProducts' => $totalProducts,
            'totalOrders' => $totalOrders,
            'productsByCategory' => $productsByCategory,
            'latestOrders' => $latestOrders,
            'productAvailability' => $productAvailability,
            'salesStats' => $salesStats,
        ]);
    }
}
