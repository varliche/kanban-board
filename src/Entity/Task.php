<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TaskRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TaskRepository::class)]
#[ApiResource(
    collectionOperations: [
        'get' => [
            'normalization_context' => ['groups' => 'taskList']
        ],
        'post' => [
            'denormalization_context' => ['groups' => 'taskListUpdate']
        ]
    ],
    itemOperations: [
        'get' => [
            'normalization_context' => ['groups' => 'taskList']
        ],
        'patch' => [
            'normalization_context' => ['groups' => 'taskListUpdate']
        ],
        'delete' => [
            'denormalization_context' => ['groups' => 'taskDelete']
        ]
    ]
)]
class Task
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups([
        'tagList',
        'taskList',
        'taskListUpdate',
        'taskDelete'
    ])]
    private $id;

    #[ORM\Column(type: 'string', length: 128)]
    #[Groups([
        'taskList',
        'taskListUpdate'
    ])]
    private ?string $libelle;

    #[ORM\Column(type: 'date')]
    #[Groups([
        'taskList',
        'taskListUpdate'
    ])]
    private $dateButoir;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Groups([
        'taskList',
        'taskListUpdate'
    ])]
    private $url;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Groups([
        'taskList',
        'taskListUpdate'
    ])]
    private $note;

    #[ORM\OneToOne(targetEntity: Section::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups([
        'taskList'
    ])]
    private $sectionId;

    #[ORM\ManyToMany(targetEntity: Tag::class, mappedBy: 'taskId')]
    #[Groups([
        'taskList'
    ])]
    private $tagId;

    public function __construct()
    {
        $this->tagId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDateButoir(): ?\DateTimeInterface
    {
        return $this->dateButoir;
    }

    public function setDateButoir(\DateTimeInterface $dateButoir): self
    {
        $this->dateButoir = $dateButoir;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getSectionId(): ?Section
    {
        return $this->sectionId;
    }

    public function setSectionId(Section $sectionId): self
    {
        $this->sectionId = $sectionId;

        return $this;
    }

    /**
     * @return Collection|Tag[]
     */
    public function getTagId(): Collection
    {
        return $this->tagId;
    }

    public function addTagId(Tag $tagId): self
    {
        if (!$this->tagId->contains($tagId)) {
            $this->tagId[] = $tagId;
            $tagId->addTaskId($this);
        }

        return $this;
    }

    public function removeTagId(Tag $tagId): self
    {
        if ($this->tagId->removeElement($tagId)) {
            $tagId->removeTaskId($this);
        }

        return $this;
    }
}
