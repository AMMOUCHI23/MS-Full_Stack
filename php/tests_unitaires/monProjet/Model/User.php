<?php

namespace App\Model;
use App\Model\InvalidArgumentException;
class User
{
    public int $age;
    public array $films_favoris = [];
    public string $nom;

    /**
     * @param int $age
     * @param string $nom
     */
    public function __construct(int $age, string $nom)
    {
        $this->age = $age;
        $this->nom = $nom;
    }

    public function afficherNom(): string
    {
        return "Je m'appelle " . $this->nom . ".";
    }

    public function afficherAge(): string
    {
        return "J'ai " . $this->age . " ans.";
    }

    public function ajouterFilmsFavoris(string $film): bool
    {
        $this->films_favoris[] = $film;

        return true;
    }

    public function supprimerFilmsFavoris(string $films): bool
    {
        if (!in_array($films, $this->films_favoris)) throw new InvalidArgumentException("Film inconnu: " . $films);

        unset($this->films_favoris[array_search($films, $this->films_favoris)]);

        return true;
    }
}