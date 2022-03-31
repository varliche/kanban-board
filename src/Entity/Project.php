<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProjectRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
#[ApiResource(
    collectionOperations: [
        'get' => [
            'normalization_context' => ['groups' => 'projectList']
        ],
        'post' => [
            'normalization_context' => ['groups' => 'projectListAdd']
        ]
    ],

)]
class Project
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['projectList', 'projectListAdd'])]
    private $id;

    #[ORM\Column(type: 'string', length: 128, nullable: false)]
    #[Groups(['projectList', 'projectListAdd'])]
    private $name;

    #[ORM\Column(type: 'datetime', nullable: false)]
    #[Groups(['projectList', 'projectListAdd'])]
    private $createdOn;

    #[ORM\Column(type: 'date')]
    #[Groups(['projectList', 'projectListAdd'])]
    private $startDate;

    #[ORM\Column(type: 'date', nullable: true)]
    #[Groups(['projectList', 'projectListAdd'])]
    private $estimatedEndDate;

    #[ORM\OneToOne(targetEntity: User::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['projectList', 'projectListAdd'])]
    private $userId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCreatedOn(): ?\DateTimeInterface
    {
        return $this->createdOn;
    }

    public function setCreatedOn(\DateTimeInterface $createdOn): self
    {
        $this->createdOn = $createdOn;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEstimatedEndDate(): ?\DateTimeInterface
    {
        return $this->estimatedEndDate;
    }

    public function setEstimatedEndDate(?\DateTimeInterface $estimatedEndDate): self
    {
        $this->estimatedEndDate = $estimatedEndDate;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(User $userId): self
    {
        $this->userId = $userId;

        return $this;
    }
}
