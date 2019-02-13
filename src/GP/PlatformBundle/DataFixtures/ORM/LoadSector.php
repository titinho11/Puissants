<?php
// src/OC/UserBundle/DataFixtures/ORM/LoadUser.php

namespace GP\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use GP\PlatformBundle\Entity\Sector as User;

class LoadSector implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // Les noms d'utilisateurs à créer
        $listNames = array('Math&Info', 'Physique', 'Chimie');

        foreach ($listNames as $name) {
            // On crée l'utilisateur
            $user = new User;

            // Le nom d'utilisateur et le mot de passe sont identiques pour l'instant
            $user->setSectorName($name);
            
            if($name=="Math&Info") $user->setCode("MI");
            if($name=="Chimie") $user->setCode("CHI");
            if($name=="Physique") $user->setCode("PHY");

            $manager->persist($user);
        }

        // On déclenche l'enregistrement
        $manager->flush();
    }
}