<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $order_status = null;

    #[ORM\OneToOne(targetEntity: self::class, cascade: ['persist', 'remove'])]
    private ?self $client = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderStatus(): ?string
    {
        return $this->order_status;
    }

    public function setOrderStatus(string $order_status): self
    {
        $this->order_status = $order_status;

        return $this;
    }

    public function getClient(): ?self
    {
        return $this->client;
    }

    public function setClient(?self $client): self
    {
        $this->client = $client;

        return $this;
    }
}
