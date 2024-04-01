<?php

namespace App\DataFixtures;

use App\Entity\Groupes;
use App\Entity\Pays;
use App\Entity\Utilisateurs;
use App\Entity\Villes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        // //20 pays aléatoires
        // $pays = [];
        // for ($i = 0; $i < 20; $i++) {
        //     $pays[$i] = new Pays();
        //     $pays[$i]->setNom($faker->country);

        //     $manager->persist($pays[$i]);
        // }
        // $manager->flush();

        // //40 villes aléatoires
        // $villes = [];
        // for ($i = 0; $i < 40; $i++) {
        //     $ville[$i] = new Villes();
        //     $ville[$i]->setNom($faker->city);
            
        //     $pays_nom = array_rand($pays);
        //     $ville[$i]->setPays($pays[$pays_nom]);

        //     $manager->persist($ville[$i]);
        // }
        // $manager->flush();

        // $groupes = [];
        // for ($i = 0; $i < 10; $i++) {
        //     $groupes[$i] = new Groupes();
        //     $groupes[$i]->setNom($faker->colorName);

        //     $manager->persist($groupes[$i]);
        // }
        // $manager->flush();

        //    //20 utilisateurs aléatoires
        // $utilisateurs =[];
        // for ($i = 0; $i < 20; $i++) {
        //     $utilisateurs[$i] = new Utilisateurs();
        //     $utilisateurs[$i]->setNom($faker->lastName);
        //     $utilisateurs[$i]->setPrenom($faker->firstName);
        //     $utilisateurs[$i]->setDateNaissance($faker->dateTimeThisCentury);
            
        //     $ville_nom = array_rand($villes);
        //     $utilisateurs[$i]->setVille($villes[$ville_nom]);

        //     $utilisateurs[$i]->setEmail($faker->freeEmail);
        //     $utilisateurs[$i]->setProfession($faker->jobTitle);

        //     $utilisateurs[$i]->setIntro($faker->text(random_int(4, 25)));
        //     $utilisateurs[$i]->setDecrit($faker->text(random_int(15, 150)));
                
        //     $groupes_nom = array_rand($groupes);
        //     $utilisateurs[$i]->addGroupe($groupes[$groupes_nom]);

        //     $manager->persist($utilisateurs[$i]);
        // }
        // $manager->flush();

        // Génération des pays
        $pays = [];
        for ($i = 0; $i < 20; $i++) {
            $pays[$i] = new Pays();
            $pays[$i]->setNom($faker->country);

            $manager->persist($pays[$i]);
        }
        $manager->flush();

        // Génération des villes après les pays
        
        $villes = [];
        for ($i = 0; $i < 40; $i++) {
            $nomVille = $faker->unique()->city; // Utilisation de unique() pour générer des noms de ville uniques
            $ville[$i] = new Villes();
            $ville[$i]->setNom($nomVille);
            
            $pays_nom = array_rand($pays);
            $ville[$i]->setPays($pays[$pays_nom]);

            $manager->persist($ville[$i]);
        }
        $manager->flush();

        // Génération des groupes
        $groupes = [];
        for ($i = 0; $i < 10; $i++) {
            $groupes[$i] = new Groupes();
            $groupes[$i]->setNom($faker->colorName);

            $manager->persist($groupes[$i]);
        }
        $manager->flush();

        // Génération des utilisateurs
        $utilisateurs =[];
        for ($i = 0; $i < 20; $i++) {
            $utilisateurs[$i] = new Utilisateurs();
            $utilisateurs[$i]->setNom($faker->lastName);
            $utilisateurs[$i]->setPrenom($faker->firstName);
            $utilisateurs[$i]->setDateNaissance($faker->dateTimeThisCentury);
            
            $ville_nom = array_rand($villes);
            $utilisateurs[$i]->setVille($villes[$ville_nom]);

            $utilisateurs[$i]->setEmail($faker->freeEmail);
            $utilisateurs[$i]->setProfession($faker->jobTitle);

            $utilisateurs[$i]->setIntro($faker->text(random_int(15, 30)));
            $utilisateurs[$i]->setDecrit($faker->text(random_int(30, 200)));
                
            $groupes_nom = array_rand($groupes);
            $utilisateurs[$i]->addGroupe($groupes[$groupes_nom]);

            $manager->persist($utilisateurs[$i]);
        }
        $manager->flush();
    }
}
