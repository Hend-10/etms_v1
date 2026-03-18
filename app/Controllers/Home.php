<?php

class Home extends Controller {
    public function index() {
        $db = new Database();

        // ── Total sensors ──────────────────────────────────────────
        $db->query("SELECT COUNT(*) as total FROM capteur");
        $totalCapteurs = $db->single()->total;

        // ── Active sensors (have at least one record in last 24h) ──
        $db->query("SELECT COUNT(DISTINCT id_cap) as active FROM records
                    WHERE date_rec >= NOW() - INTERVAL 1 DAY");
        $activeCapteurs = $db->single()->active;

        // ── Total records ──────────────────────────────────────────
        $db->query("SELECT COUNT(*) as total FROM records");
        $totalRecords = $db->single()->total;

        // ── Records today ──────────────────────────────────────────
        $db->query("SELECT COUNT(*) as total FROM records
                    WHERE DATE(date_rec) = CURDATE()");
        $recordsToday = $db->single()->total;

        // ── Latest avg temperature & humidity ─────────────────────
        $db->query("SELECT ROUND(AVG(tmp),2) as avg_tmp, ROUND(AVG(hum),2) as avg_hum
                    FROM records
                    WHERE date_rec >= NOW() - INTERVAL 1 HOUR");
        $avgStats = $db->single();

        // ── Total alerts ───────────────────────────────────────────
        $db->query("SELECT COUNT(*) as total FROM alert");
        $totalAlerts = $db->single()->total;

        // ── Unresolved alerts (statut != 'résolu') ─────────────────
        $db->query("SELECT COUNT(*) as total FROM alert
                    WHERE statut != 'résolu'");
        $openAlerts = $db->single()->total;

        // ── Sensors exceeding thresholds ───────────────────────────
        $db->query("SELECT COUNT(*) as total
                    FROM records r
                    JOIN seuil s ON r.id_cap = s.id_cap
                    WHERE r.date_rec = (
                        SELECT MAX(r2.date_rec) FROM records r2 WHERE r2.id_cap = r.id_cap
                    )
                    AND (r.tmp > s.tmp_max OR r.tmp < s.tmp_min
                      OR r.hum > s.th_max  OR r.hum < s.th_min)");
        $sensorsInAlert = $db->single()->total;

        // ── Records per day – last 7 days (for chart) ──────────────
        $db->query("SELECT DATE(date_rec) as jour, COUNT(*) as total
                    FROM records
                    WHERE date_rec >= NOW() - INTERVAL 7 DAY
                    GROUP BY DATE(date_rec)
                    ORDER BY jour ASC");
        $recordsPerDay = $db->resultSet();

        // ── Avg tmp per sensor – last 24 h (for chart) ─────────────
        $db->query("SELECT c.Nom_cap, ROUND(AVG(r.tmp),1) as avg_tmp, ROUND(AVG(r.hum),1) as avg_hum
                    FROM records r
                    JOIN capteur c ON r.id_cap = c.id_cap
                    WHERE r.date_rec >= NOW() - INTERVAL 24 HOUR
                    GROUP BY r.id_cap, c.Nom_cap
                    ORDER BY avg_tmp DESC
                    LIMIT 8");
        $sensorStats = $db->resultSet();

        // ── Recent alerts ──────────────────────────────────────────
        $db->query("SELECT a.*, c.Nom_cap, e.nom_emp
                    FROM alert a
                    JOIN capteur c ON a.id_cap = c.id_cap
                    JOIN emplacement e ON a.id_emp = e.id_emp
                    ORDER BY a.date_rec DESC
                    LIMIT 5");
        $recentAlerts = $db->resultSet();

        // ── Top emplacements by record count ───────────────────────
        $db->query("SELECT e.nom_emp, COUNT(r.id_rec) as total
                    FROM emplacement e
                    JOIN capteur c ON c.id_cap IN (
                        SELECT id_cap FROM affectation_cap WHERE id_emp = e.id_emp
                    )
                    JOIN records r ON r.id_cap = c.id_cap
                    GROUP BY e.id_emp, e.nom_emp
                    ORDER BY total DESC
                    LIMIT 5");
        $topEmplacements = $db->resultSet();

        $data = [
            'title'           => 'Tableau de bord',
            'totalCapteurs'   => $totalCapteurs,
            'activeCapteurs'  => $activeCapteurs,
            'totalRecords'    => $totalRecords,
            'recordsToday'    => $recordsToday,
            'avgTmp'          => $avgStats->avg_tmp ?? '--',
            'avgHum'          => $avgStats->avg_hum ?? '--',
            'totalAlerts'     => $totalAlerts,
            'openAlerts'      => $openAlerts,
            'sensorsInAlert'  => $sensorsInAlert,
            'recordsPerDay'   => $recordsPerDay,
            'sensorStats'     => $sensorStats,
            'recentAlerts'    => $recentAlerts,
            'topEmplacements' => $topEmplacements,
            'userPrenom'      => $_SESSION['user_prenom'] ?? 'Admin',
            'userNom'         => $_SESSION['user_nom']    ?? 'User',
            'userProfilImg'   => $_SESSION['user_photo']  ?? 'default.png',
        ];

        $this->view('index', $data);
    }
}
