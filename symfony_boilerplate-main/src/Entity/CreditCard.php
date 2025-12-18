<?php

namespace App\Entity;

use App\Repository\CreditCardRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CreditCardRepository::class)]
class CreditCard
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 16)]
    #[Assert\NotBlank(message: 'Le numéro de carte est obligatoire')]
    #[Assert\Length(
        min: 13,
        max: 16,
        minMessage: 'Le numéro de carte doit contenir au moins {{ limit }} chiffres',
        maxMessage: 'Le numéro de carte ne peut pas dépasser {{ limit }} chiffres'
    )]
    #[Assert\Regex(
        pattern: '/^[0-9]+$/',
        message: 'Le numéro de carte ne doit contenir que des chiffres'
    )]
    private ?string $number = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotBlank(message: 'La date d\'expiration est obligatoire')]
    #[Assert\GreaterThan(
        value: 'today',
        message: 'La carte bancaire est expirée'
    )]
    private ?\DateTimeInterface $expirationDate = null;

    #[ORM\Column(length: 3)]
    #[Assert\NotBlank(message: 'Le CVV est obligatoire')]
    #[Assert\Length(
        min: 3,
        max: 3,
        exactMessage: 'Le CVV doit contenir exactement {{ limit }} chiffres'
    )]
    #[Assert\Regex(
        pattern: '/^[0-9]{3}$/',
        message: 'Le CVV doit contenir 3 chiffres'
    )]
    private ?string $cvv = null;

    #[ORM\ManyToOne(inversedBy: 'creditCards')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): static
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Retourne le numéro de carte masqué pour l'affichage
     */
    public function getMaskedNumber(): string
    {
        if (!$this->number) {
            return '';
        }
        return '**** **** **** ' . substr($this->number, -4);
    }

    public function getExpirationDate(): ?\DateTimeInterface
    {
        return $this->expirationDate;
    }

    public function setExpirationDate(\DateTimeInterface $expirationDate): static
    {
        $this->expirationDate = $expirationDate;

        return $this;
    }

    public function getCvv(): ?string
    {
        return $this->cvv;
    }

    public function setCvv(string $cvv): static
    {
        $this->cvv = $cvv;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getMaskedNumber();
    }
}
