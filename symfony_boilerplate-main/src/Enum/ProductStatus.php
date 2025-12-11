<?php

namespace App\Enum;

/**
 * Enum pour définir les différents statuts d'un produit
 */
enum ProductStatus: string
{
    case AVAILABLE = 'disponible';
    case OUT_OF_STOCK = 'en_rupture';
    case PREORDER = 'en_precommande';

    /**
     * Retourne le label traduit du statut
     */
    public function getLabel(): string
    {
        return match($this) {
            self::AVAILABLE => 'Disponible',
            self::OUT_OF_STOCK => 'En rupture de stock',
            self::PREORDER => 'En précommande',
        };
    }

    /**
     * Retourne la classe CSS pour le badge
     */
    public function getBadgeClass(): string
    {
        return match($this) {
            self::AVAILABLE => 'badge-success',
            self::OUT_OF_STOCK => 'badge-danger',
            self::PREORDER => 'badge-warning',
        };
    }
}
