<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ApiResource(
    collectionOperations: [
        'get' => [
            'normalization_context' => ['groups' => 'userList']
        ],
        'post' => [
            'denormalization_context' => ['groups' => 'userListAdd']
        ]
    ],
    itemOperations: [
        'get' => [
            'normalization_context' => ['groups' => 'userList']
        ],
        'patch' => [
            'normalization_context' => ['groups' => 'userListUpdate']
        ],
        'delete' => [
            'denormalization_context' => ['groups' => 'userDelete']
        ]
    ]
)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups([
        'projectList',
        'userList',
        'userListAdd',
        'userListUpdate',
        'userDelete'
    ])]
    private $id;

    #[ORM\Column(type: 'string', length: 64)]
    #[Groups([
        'projectList',
        'userList',
        'userListAdd',
        'userListUpdate'
    ])]
    private $firstName;

    #[ORM\Column(type: 'string', length: 64)]
    #[Groups([
        'projectList',
        'userList',
        'userListAdd',
        'userListUpdate'
    ])]
    private $lastName;

    #[ORM\Column(type: 'string', length: 128)]
    #[Groups([
        'userList',
        'userListAdd',
        'userListUpdate'
    ])]
    private $email;

    #[ORM\Column(type: 'text')]
    #[Groups([
        'userList',
        'userListAdd',
        'userListUpdate'
    ])]
    private $password;

    #[ORM\Column(type: 'datetime')]
    #[Groups([
        'userList',
        'userListAdd'
    ])]
    private $createdOn;

    #[ORM\Column(type: 'datetime', nullable: true)]
    #[Groups([
        'userList',
        'userListAdd',
        'userListUpdate'
    ])]
    private $modifiedOn;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

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

    public function getModifiedOn(): ?\DateTimeInterface
    {
        return $this->modifiedOn;
    }

    public function setModifiedOn(?\DateTimeInterface $modifiedOn): self
    {
        $this->modifiedOn = $modifiedOn;

        return $this;
    }
}
