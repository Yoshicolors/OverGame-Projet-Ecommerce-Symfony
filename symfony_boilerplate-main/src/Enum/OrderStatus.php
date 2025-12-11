<?php

namespace App\Enum;

/**
 * Enum pour définir les différents statuts d'une commande
 */
enum OrderStatus: string
{
    case PREPARING = 'en_preparation';
    case SHIPPED = 'expediee';
    case DELIVERED = 'livree';
    case CANCELLED = 'annulee';

    /**
     * Retourne le label traduit du statut
     */
    public function getLabel(): string
    {
        return match($this) {
            self::PREPARING => 'En préparation',
            self::SHIPPED => 'Expédiée',
            self::DELIVERED => 'Livrée',
            self::CANCELLED => 'Annulée',
        };
    }

    /**
     * Retourne la classe CSS pour le badge
     */
    public function getBadgeClass(): string
    {
        return match($this) {
            self::PREPARING => 'badge-info',
            self::SHIPPED => 'badge-primary',
            self::DELIVERED => 'badge-success',
            self::CANCELLED => 'badge-danger',
        };
    }
}
