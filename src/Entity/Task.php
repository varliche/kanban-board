<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TaskRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: TaskRepository::class)]
#[ApiResource]
class Task
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 128)]
    private $libelle;

    #[ORM\Column(type: 'date')]
    private $dateButoir;

    #[ORM\Column(type: 'text', nullable: true)]
    private $url;

    #[ORM\Column(type: 'text', nullable: true)]
    private $note;

    #[ORM\OneToOne(targetEntity: Section::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $section_id;

    #[ORM\ManyToMany(targetEntity: Tag::class, mappedBy: 'task_id')]
    private $tag_id;

    public function __construct()
    {
        $this->tag_id = new ArrayCollection();
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
        return $this->section_id;
    }

    public function setSectionId(Section $section_id): self
    {
        $this->section_id = $section_id;

        return $this;
    }

    /**
     * @return Collection|Tag[]
     */
    public function getTagId(): Collection
    {
        return $this->tag_id;
    }

    public function addTagId(Tag $tagId): self
    {
        if (!$this->tag_id->contains($tagId)) {
            $this->tag_id[] = $tagId;
            $tagId->addTaskId($this);
        }

        return $this;
    }

    public function removeTagId(Tag $tagId): self
    {
        if ($this->tag_id->removeElement($tagId)) {
            $tagId->removeTaskId($this);
        }

        return $this;
    }
}
