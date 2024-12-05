<?php
// Exercice 1: Créer un tableau associatif contenant des informations sur 5 employés
$employes = [
    ["nom" => "Salma", "poste" => "Développeur", "salaire" => 3500],
    ["nom" => "Mohamed", "poste" => "Designer", "salaire" => 3200],
    ["nom" => "Salwa", "poste" => "Chef de projet", "salaire" => 4000],
    ["nom" => "Hafsa", "poste" => "Analyste", "salaire" => 3700],
    ["nom" => "Zakaria", "poste" => "Testeur", "salaire" => 3000],
];

// Calculer le salaire moyen
function calculerSalaireMoyen($employes) {
    $somme = 0;
    foreach ($employes as $employe) {
        $somme += $employe['salaire'];
    }
    return $somme / count($employes);
}

$salaireMoyen = calculerSalaireMoyen($employes);

// Exercice 2: Recherche dynamique d'un employé
$resultat = null;
if (isset($_POST['nom'])) {
    $nomRecherche = $_POST['nom'];
    foreach ($employes as $employe) {
        if (strtolower($employe['nom']) === strtolower($nomRecherche)) {
            $resultat = $employe;
            break;
        }
    }
}

// Exercice 3: Formulaire de connexion
$utilisateurs = [
    ["email" => "user1@example.com", "mot_de_passe" => "password1"],
    ["email" => "user2@example.com", "mot_de_passe" => "password2"],
    ["email" => "user3@example.com", "mot_de_passe" => "password3"],
];

$message = "";
if (isset($_POST['email'], $_POST['mot_de_passe'])) {
    $email = $_POST['email'];
    $motDePasse = $_POST['mot_de_passe'];
    $utilisateurTrouve = false;

    foreach ($utilisateurs as $utilisateur) {
        if ($utilisateur['email'] === $email && $utilisateur['mot_de_passe'] === $motDePasse) {
            $utilisateurTrouve = true;
            break;
        }
    }

    $message = $utilisateurTrouve ? "Connexion réussie !" : "Email ou mot de passe incorrect.";
}

// Exercice 4: Système de panier
$panier = [
    ["nom" => "Produit 1", "quantite" => 2, "prix" => 15],
    ["nom" => "Produit 2", "quantite" => 1, "prix" => 25],
    ["nom" => "Produit 3", "quantite" => 3, "prix" => 10],
];

$total = 0;
foreach ($panier as $produit) {
    $total += $produit['quantite'] * $produit['prix'];
}

// Exercice 5: Formulaire pour ajouter un commentaire
$commentaires = [];
if (isset($_POST['commentaire'])) {
    $commentaires[] = $_POST['commentaire'];
}

// Exercice 6: Importation de fichier CSV
$donnees = [];
if (isset($_FILES['fichier_csv'])) {
    $fichier = $_FILES['fichier_csv']['tmp_name'];
    $handle = fopen($fichier, 'r');
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $donnees[] = $data;
    }
    fclose($handle);
}

// Exercice 7: Formulaire acceptant un fichier CSV de produits
$produits = [];
if (isset($_FILES['fichier_csv'])) {
    $fichier = $_FILES['fichier_csv']['tmp_name'];
    $handle = fopen($fichier, 'r');
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $produits[] = $data;
    }
    fclose($handle);
}

// Exercice 8: Tableau associatif imbriqué pour stocker des informations de produits
$produitsInfo = [
    "Produit1" => ["nom" => "Laptop", "prix" => 1200, "quantite" => 10],
    "Produit2" => ["nom" => "Smartphone", "prix" => 800, "quantite" => 20],
    "Produit3" => ["nom" => "Casque", "prix" => 100, "quantite" => 50],
];

// Exercice 9: Formulaire de sélection des produits
$produitsSelectionnes = [];
if (isset($_POST['produits'])) {
    foreach ($_POST['produits'] as $produit) {
        $produitsSelectionnes[] = $produitsInfo[$produit];
}

// Exercice 10: Calculatrice
$resultatCalcul = null;
if (isset($_POST['nombre1'], $_POST['nombre2'], $_POST['operation'])) {
    $nombre1 = $_POST['nombre1'];
    $nombre2 = $_POST['nombre2'];
    $operation = $_POST['operation'];

    switch ($operation) {
        case 'addition':
            $resultatCalcul = $nombre1 + $nombre2;
            break;
        case 'soustraction':
            $resultatCalcul = $nombre1 - $nombre2;
            break;
        case 'multiplication':
            $resultatCalcul = $nombre1 * $nombre2;
            break;
        case 'division':
            if ($nombre2 != 0) {
                $resultatCalcul = $nombre1 / $nombre2;
            } else {
                $resultatCalcul = "Erreur: Division par zéro.";
            }
            break;
    }
}
?>
