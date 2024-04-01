<?php

namespace App\Controller;

use App\Entity\Groupes;
use App\Entity\Pays;
use App\Entity\Utilisateurs;
use App\Entity\Villes;
use App\Repository\UtilisateursRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'idex')]
    // public function index(EntityManagerInterface $em): Response
    // {
    //     $pays = new Pays();
    //     $pays   ->setNom("France");

    //             $em->persist($pays);

    //     $villes = new Villes();
    //     $villes ->setNom("Brest")
    //             ->setPays($pays);

    //             $em->persist($villes);

    //     $groupes = new Groupes();
    //     $groupes->setNom("Groupe A");

    //             $em->persist($groupes);

    //     $utilisateurs = new Utilisateurs();
    //     $utilisateurs   ->setNom("Gauvain")
    //                     ->setPrenom("Pierrick")
    //                     ->setDateNaissance(new \DateTimeImmutable)
    //                     ->setEmail("pierrickgauvain@gmail.com")
    //                     ->setVille($villes)
    //                     ->setProfession("Web Developer")
    //                     ->addGroupe($groupes)
    //                     ->setIntro("Bonjour je m'appelle Pierrick Gauvain, j'ai 24ans et je suis en formation Web Developper.")
    //                     ->setDecrit("J'aime le sport, les jeux vidéos, la musique et le cinéma.");

    //                     $em->persist($utilisateurs);
    //                     $em ->flush();

    // }

    public function index(UtilisateursRepository $repository): Response
    {
        $utilisateurs = $repository->findAll();

        // $utilisateurs = $repository->findByNom("Gauvain");
        dd($utilisateurs);
    }
}
