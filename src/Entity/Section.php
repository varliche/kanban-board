<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\SectionRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: SectionRepository::class)]
#[ApiResource(
    collectionOperations: [
        'get' => [
            'normalization_context' => ['groups' => 'sectionList']
        ],
        'post' => [
            'denormalization_context' => ['groups' => 'sectionListAdd']
        ]
    ],
    itemOperations: [
        'get' => [
            'normalization_context' => ['groups' => 'sectionList']
        ],
        'patch' => [
            'normalization_context' => ['groups' => 'sectionListUpdate']
        ],
        'delete' => [
            'denormalization_context' => ['groups' => 'sectionDelete']
        ]
    ]
)]
class Section
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups([
        'sectionList',
        'sectionListAdd',
        'sectionListUpdate',
        'sectionDelete',
        'taskList'
    ])]
    private $id;

    #[ORM\Column(type: 'integer')]
    #[Groups([
        'sectionList',
        'sectionListAdd',
        'sectionListUpdate'
    ])]
    private $position;

    #[ORM\Column(type: 'string', length: 128)]
    #[Groups([
        'sectionList',
        'sectionListAdd',
        'sectionListUpdate'
    ])]
    private $name;

    #[ORM\Column(type: 'datetime')]
    #[Groups([
        'sectionList',
        'sectionListAdd',
        'sectionListUpdate'
    ])]
    private $addedOn;

    #[ORM\OneToOne(targetEntity: Project::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups([
        'sectionList',
        'sectionListAdd',
        'sectionListUpdate'
    ])]
    private $projectId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
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

    public function getAddedOn(): ?\DateTimeInterface
    {
        return $this->addedOn;
    }

    public function setAddedOn(\DateTimeInterface $addedOn): self
    {
        $this->addedOn = $addedOn;

        return $this;
    }

    public function getProjectId(): ?Project
    {
        return $this->projectId;
    }

    public function setProjectId(Project $projectId): self
    {
        $this->projectId = $projectId;

        return $this;
    }
}
