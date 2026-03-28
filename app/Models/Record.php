<?php
class Record {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getRecords() {
        $this->db->query("SELECT records.*, capteur.Nom_cap 
                        FROM records 
                        INNER JOIN capteur ON records.id_cap = capteur.id_cap 
                        ORDER BY records.date_rec DESC");
        return $this->db->resultSet();
    }

    public function addRecord($data) {
        $this->db->query("INSERT INTO records (id_cap, id_emp, tmp, th, date_rec) 
                          VALUES(:id_cap, :id_emp, :tmp, :th, NOW())");
        
        $this->db->bind(':id_cap', $data['id_cap']);
        $this->db->bind(':id_emp', $data['id_emp']);
        $this->db->bind(':tmp', $data['tmp']);
        $this->db->bind(':th', $data['th']);

        if($this->db->execute()) {
            $this->db->query("SELECT * FROM seuil WHERE id_cap = :id_cap LIMIT 1");
            $this->db->bind(':id_cap', $data['id_cap']);
            $seuil = $this->db->single();

            if ($seuil) {
                if ($data['tmp'] > $seuil->tmp_max || $data['tmp'] < $seuil->tmp_min || 
                    $data['th'] > $seuil->th_max || $data['th'] < $seuil->th_min) {
                    
                    $this->db->query("INSERT INTO alert (id_cap, id_emp, tmp, th, date_rec) 
                                      VALUES (:id_cap, :id_emp, :tmp, :th, NOW())");
                    $this->db->bind(':id_cap', $data['id_cap']);
                    $this->db->bind(':id_emp', $data['id_emp']);
                    $this->db->bind(':tmp', $data['tmp']);
                    $this->db->bind(':th', $data['th']);
                    $this->db->execute();
                }
            }
            return true;
        }
        return false;
    }
    public function getRecordsByInterval() {
    $this->db->query("SELECT 
                        MIN(id_rec) as id_rec, 
                        capteur.Nom_cap, 
                        AVG(tmp) as tmp, 
                        AVG(th) as th, 
                        FROM_UNIXTIME(FLOOR(UNIX_TIMESTAMP(date_rec) / 1800) * 1800) as date_rec
                      FROM records 
                      INNER JOIN capteur ON records.id_cap = capteur.id_cap 
                      GROUP BY capteur.Nom_cap, FLOOR(UNIX_TIMESTAMP(date_rec) / 1800)
                      ORDER BY date_rec DESC");
    return $this->db->resultSet();
}
}