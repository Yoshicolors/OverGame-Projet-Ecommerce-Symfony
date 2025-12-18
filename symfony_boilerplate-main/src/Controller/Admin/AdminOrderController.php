<?php

namespace App\Controller\Admin;

use App\Entity\Order;
use App\Enum\OrderStatus;
use App\Repository\OrderRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/orders')]
class AdminOrderController extends AbstractController
{
    #[Route('/', name: 'app_admin_order_index')]
    public function index(OrderRepository $orderRepository): Response
    {
        $orders = $orderRepository->findBy([], ['createdAt' => 'DESC']);

        return $this->render('admin/order/index.html.twig', [
            'orders' => $orders,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_order_show', requirements: ['id' => '\d+'])]
    public function show(Order $order): Response
    {
        return $this->render('admin/order/show.html.twig', [
            'order' => $order,
        ]);
    }

    #[Route('/{id}/status', name: 'app_admin_order_update_status', requirements: ['id' => '\d+'], methods: ['POST'])]
    public function updateStatus(
        Request $request,
        Order $order,
        EntityManagerInterface $entityManager
    ): Response {
        $newStatus = $request->request->get('status');
        
        if ($newStatus && OrderStatus::tryFrom($newStatus)) {
            $order->setStatus(OrderStatus::from($newStatus));
            $entityManager->flush();

            $this->addFlash('success', 'flash.success.updated');
        }

        return $this->redirectToRoute('app_admin_order_show', ['id' => $order->getId()]);
    }
}
