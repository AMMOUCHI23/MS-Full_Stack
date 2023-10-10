<?php
use PHPUnit\Framework\TestCase;
require 'Model/User.php';
use App\Model\User;

class UserTest extends TestCase
{

    // Les fonctions de test seront définies ici
    public function testAfficherNom()
    {
        $user = new User(18, 'John');

        $this->assertIsString($user->afficherNom());

        //Vérifier que le retour de la fonction contient le nom de l'utilisateur ("John")

        $this->assertStringContainsStringIgnoringCase('John', $user->afficherNom());

        //Vérifier que le message retourné par la fonction est correct

        $this->assertEquals("Je m'appelle John.", $user->afficherNom(), "Le nom de l'utilisateur n'est pas correct");
    }
}