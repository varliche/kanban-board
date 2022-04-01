<?php

namespace App\DataPersister;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use ApiPlatform\Core\DataPersister\DataPersisterInterface;

class UserPerister implements DataPersisterInterface
{
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function supports($data): bool
    {
        //Return true if the data is an instance of the Project class
        return $data instanceof User;
    }

    public function persist($data)
    {
        //We set automatically the created date with the system date
        $data->setCreatedOn(new \DateTime());
        //We set automatically the modified date with the system date
        $data->setModifiedOn(new \DateTime());
        //We Ask Doctrine to save it on DataBase with persist() and flush() methods
        $this->em->persist($data);
        $this->em->flush();
    }

    public function remove($data)
    {
        $this->em->remove($data);
        $this->em->flush();
    }
}
