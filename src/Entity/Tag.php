<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TagRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: TagRepository::class)]
#[ApiResource]
class Tag
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 64)]
    private $tag_name;

    #[ORM\ManyToMany(targetEntity: Task::class, inversedBy: 'tag_id')]
    private $task_id;

    public function __construct()
    {
        $this->task_id = new ArrayCollection();
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
        return $this->task_id;
    }

    public function addTaskId(Task $taskId): self
    {
        if (!$this->task_id->contains($taskId)) {
            $this->task_id[] = $taskId;
        }

        return $this;
    }

    public function removeTaskId(Task $taskId): self
    {
        $this->task_id->removeElement($taskId);

        return $this;
    }
}
