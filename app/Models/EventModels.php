<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModels extends Model
{
    protected $table = 'Evenement';
    protected $primaryKey = 'idEvenement';

    public function getEventsWithAttendees()
    {
        // Création de la requête pour récupérer les événements et les utilisateurs présents
        $builder = $this->db->table('Evenement e');
        $builder->select('e.nomEvenement, e.dateEvenement, e.Lieu, e.heureDebut, e.heureFin, u.Nom as utilisateurNom, u.Prenom as utilisateurPrenom, i.animateur');
        $builder->join('Inscription i', 'e.idEvenement = i.idEvenement');
        $builder->join('Utilisateur u', 'i.idUtilisateur = u.idUtilisateur');
        $builder->where('i.present', 1);  // Filtrer les personnes présentes
    
        // Exécution de la requête
        $query = $builder->get();
    
        return $query->getResultArray();
    }
}