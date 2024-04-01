<?php

namespace App\Controller;

use App\Entity\Groupes;
use App\Entity\Pays;
use App\Entity\Utilisateurs;
use App\Entity\Villes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'idex')]
    public function index(): Response
    {
        $pays = new Pays();
        $pays   ->setNom("France");

        $villes = new Villes();
        $villes ->setNom("Brest")
                ->setPays($pays);

        $groupes = new Groupes();
        $groupes->setNom("Groupe A");

        $utilisateurs = new Utilisateurs();
        $utilisateurs   ->setNom("Gauvain")
                        ->setPrenom("Pierrick")
                        ->setDateNaissance(new \DateTimeImmutable)
                        ->setEmail("pierrickgauvain@gmail.com")
                        ->setVille($villes)
                        ->setProfession("Web Developer")
                        ->addGroupe($groupes)
                        ->setIntro("Bonjour je m'appelle Pierrick Gauvain, 
                                    j'ai 24ans et je suis en formation Web Developper.")
                        ->setDecrit("J'aime le sport, les jeux vidéos, la musique et le cinéma.");
                        dd($utilisateurs);
    }
}
