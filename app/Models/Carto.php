<?php
class Carto {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Fetch PDFs joined with Emplacement names
    public function getPdfs() {
        $this->db->query("SELECT cartographie.*, emplacement.nom_emp 
                          FROM cartographie 
                          INNER JOIN emplacement ON cartographie.emplacement_id = emplacement.id_emp 
                          ORDER BY upload_date DESC");
        return $this->db->resultSet();
    }

    public function addPdf($data) {
        $this->db->query("INSERT INTO cartographie (emplacement_id, file_name, uploaded_by, upload_date) 
                          VALUES (:emp_id, :file, :user, NOW())");
        $this->db->bind(':emp_id', $data['emp_id']);
        $this->db->bind(':file', $data['file_name']);
        $this->db->bind(':user', $data['user']);
        return $this->db->execute();
    }

    public function deletePdf($id) {
        $this->db->query("DELETE FROM cartographie WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}