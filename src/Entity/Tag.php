<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TagRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TagRepository::class)]
#[ApiResource(
    collectionOperations: [
        'get' => [
            'normalization_context' => ['groups' => 'tagList']
        ],
        'post' => [
            'denormalization_context' => ['groups' => 'tagListAdd']
        ]
    ],
    itemOperations: [
        'get' => [
            'normalization_context' => ['groups' => 'tagList']
        ],
        'patch' => [
            'normalization_context' => ['groups' => 'tagListUpdate']
        ],
        'delete' => [
            'denormalization_context' => ['groups' => 'tagDelete']
        ]
    ]
)]
class Tag
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups([
        'tagList',
        'tagListAdd',
        'tagListUpdate',
        'tagDelete'
    ])]
    private $id;

    #[ORM\Column(type: 'string', length: 64, nullable: false)]
    #[Groups([
        'tagList',
        'tagListAdd',
        'tagListUpdate'
    ])]
    private $tag_name;

    #[ORM\ManyToMany(targetEntity: Task::class, inversedBy: 'tag_id')]
    #[Groups([
        'tagList'
    ])]
    private $taskId;

    public function __construct()
    {
        $this->taskId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTagName(): ?string
    {
        return $this->tag_name;
    }

    public function setTagName(string $tag_name): self
    {
        $this->tag_name = $tag_name;

        return $this;
    }

    /**
     * @return Collection|Task[]
     */
    public function getTaskId(): Collection
    {
        return $this->taskId;
    }

    public function addTaskId(Task $taskId): self
    {
        if (!$this->taskId->contains($taskId)) {
            $this->taskId[] = $taskId;
        }

        return $this;
    }

    public function removeTaskId(Task $taskId): self
    {
        $this->taskId->removeElement($taskId);

        return $this;
    }
}
