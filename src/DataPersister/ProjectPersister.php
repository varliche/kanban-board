<?php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use App\Entity\Project;
use Doctrine\ORM\EntityManagerInterface;

class ProjectPersister implements DataPersisterInterface
{
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function supports($data): bool
    {
        //Return true if the data is an instance of the Project class
        return $data instanceof Project;
    }

    public function persist($data)
    {
        //We set automatically the created date with the system date
        $data->setCreatedOn(new \DateTime());
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
