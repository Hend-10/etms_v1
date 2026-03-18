<?php
class Alerte {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

public function getAlerts() {
    $this->db->query("SELECT alert.*, capteur.Nom_cap, emplacement.nom_emp 
                      FROM alert 
                      LEFT JOIN capteur ON alert.id_cap = capteur.id_cap
                      LEFT JOIN emplacement ON alert.id_emp = emplacement.id_emp
                      ORDER BY date_rec DESC");
    return $this->db->resultSet();
}

    // Delete an alert history record
    public function deleteAlerte($id) {
        $this->db->query("DELETE FROM alert WHERE id_alert = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
    public function syncOldAlerts() {
    $this->db->query("INSERT INTO alert (id_cap, id_emp, tmp, th, statut, date_rec)
                      SELECT r.id_cap, a.id_emp, r.tmp, r.hum, 
                      CASE 
                        WHEN r.tmp > s.tmp_max THEN 'Température Haute'
                        WHEN r.tmp < s.tmp_min THEN 'Température Basse'
                        WHEN r.hum > s.th_max THEN 'Humidité Haute'
                        WHEN r.hum < s.th_min THEN 'Humidité Basse'
                        ELSE 'Hors Limite'
                      END as statut, 
                      r.date_rec
                      FROM records r
                      JOIN seuil s ON r.id_cap = s.id_cap
                      JOIN affectation_cap a ON r.id_cap = a.id_cap
                      WHERE (r.tmp > s.tmp_max OR r.tmp < s.tmp_min OR r.hum > s.th_max OR r.hum < s.th_min)
                      AND NOT EXISTS (
                          SELECT 1 FROM alert al 
                          WHERE al.id_cap = r.id_cap AND al.date_rec = r.date_rec
                      )");
    return $this->db->execute();
}
}