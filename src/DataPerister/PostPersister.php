<?php
namespace App\DataPerister;
use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;

final class PostPersister implements DataPersisterInterface{


    protected $em;



    public function __construct(EntityManagerInterface $ems)
    {

       $this->em=$ems;

    }

    public function supports($data, array $context = []): bool
    {
        return $data instanceof Post;
    }

    public function persist($data, array $context = [])
    {
        // call your persistence layer to save $data
        $data->setCreatedAt(new \DateTime());
        $this->em->persist($data);
        $this->em->flush();
    }

    public function remove($data, array $context = [])
    {
        // call your persistence layer to delete $data
        $this->em->remove($data);
        $this->em->flush();
    }




}





