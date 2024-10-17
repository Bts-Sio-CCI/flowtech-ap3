<?php

namespace App\Controllers;

use ScssPhp\ScssPhp\Compiler;  // Assurez-vous d'importer le compilateur SCSS
use CodeIgniter\Controller;     // Assurez-vous d'importer la classe Controller

class CompilerV2 extends BaseController
{
    public function scss_to_css()
    {
        // Chemin vers le dossier SCSS
        $scssFile = FCPATH . 'assets/scss/main.scss';  // Le fichier SCSS principal
        $cssFile = FCPATH . 'assets/css/main.css';    // Le fichier CSS généré

        // Initialiser le compilateur SCSS
        $compiler = new Compiler();

        // Définir les chemins d'importation SCSS
        $compiler->setImportPaths([
            FCPATH . 'assets/scss/',                  // Chemin vers votre dossier SCSS
            FCPATH . 'vendor/twbs/bootstrap/scss/'    // Chemin vers le SCSS de Bootstrap
        ]);

        try {
            // Vérifier que le fichier SCSS existe
            if (!file_exists($scssFile)) {
                throw new \Exception("Le fichier SCSS '$scssFile' est introuvable.");
            }

            // Lire le contenu du fichier SCSS
            $scss = file_get_contents($scssFile);

            // Compiler le SCSS en CSS
            $compiledCss = $compiler->compile($scss);

            // Sauvegarder le CSS compilé dans le fichier
            if (file_put_contents($cssFile, $compiledCss)) {
                echo "Le fichier CSS a été généré avec succès à : $cssFile";
            } else {
                throw new \Exception("Erreur lors de l'écriture du fichier CSS.");
            }
        } catch (\Exception $e) {
            // En cas d'erreur, afficher le message d'erreur
            echo "Erreur lors de la compilation : " . $e->getMessage();
        }
    }
}
