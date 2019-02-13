<?php
// src/OC/UserBundle/DataFixtures/ORM/LoadUser.php

namespace GP\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\AdminUser as User;

class LoadAdminUser implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // Les noms d'utilisateurs à créer
        $listNames = array('admin', 'toto', 'toto2');

        foreach ($listNames as $name) {
            // On crée l'utilisateur
            $user = new User;

            // Le nom d'utilisateur et le mot de passe sont identiques pour l'instant
            $user->setUsername($name);
            $user->setPassword($name);

            // On définit uniquement le role ROLE_USER qui est le role de base
            $user->setRoles(array('ROLE_ADMIN'));

            $user->setSurname($name);
            $user->setFirstName($name);
            $user->setEmail($name."@admin.fr");
            $user->setTelephone("678787878");
            // On le persiste
            $manager->persist($user);
        }

        // On déclenche l'enregistrement
        $manager->flush();
    }
}