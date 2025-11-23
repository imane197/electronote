<?php
require_once __DIR__ . '/../config/database.php';

class BusinessController {
    private $conn;
    
    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
        
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    // ROUTE 1 : Liste des composants
    public function getAllComponents() {
        $categorie = $_GET['categorie'] ?? null;
        
        if ($categorie) {
            $query = "SELECT * FROM components WHERE categorie = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("s", $categorie);
            $stmt->execute();
            $result = $stmt->get_result();
        } else {
            $query = "SELECT * FROM components";
            $result = $this->conn->query($query);
        }
        
        $components = [];
        while ($row = $result->fetch_assoc()) {
            $components[] = $row;
        }
        
        header('Content-Type: application/json');
        echo json_encode($components);
    }
    
    // ROUTE 2 : Ajouter au projet
    public function addToProject() {
        if (!isset($_SESSION['user_id'])) {
            http_response_code(401);
            echo json_encode(["error" => "Non authentifié"]);
            return;
        }
        
        $data = json_decode(file_get_contents("php://input"), true);
        $component_id = $data['component_id'] ?? null;
        $quantite = $data['quantite'] ?? 1;
        $user_id = $_SESSION['user_id'];
        
        if (!$component_id) {
            http_response_code(400);
            echo json_encode(["error" => "ID composant manquant"]);
            return;
        }
        
        $check = "SELECT id, quantite FROM user_project_components WHERE user_id = ? AND component_id = ?";
        $stmt = $this->conn->prepare($check);
        $stmt->bind_param("ii", $user_id, $component_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nouvelle_quantite = $row['quantite'] + $quantite;
            $update = "UPDATE user_project_components SET quantite = ? WHERE id = ?";
            $stmt2 = $this->conn->prepare($update);
            $stmt2->bind_param("ii", $nouvelle_quantite, $row['id']);
            $stmt2->execute();
        } else {
            $insert = "INSERT INTO user_project_components (user_id, component_id, quantite) VALUES (?, ?, ?)";
            $stmt2 = $this->conn->prepare($insert);
            $stmt2->bind_param("iii", $user_id, $component_id, $quantite);
            $stmt2->execute();
        }
        
        echo json_encode(["success" => true, "message" => "Composant ajouté au projet"]);
    }
    
    // ROUTE 3 : Voir mon projet
    public function getMyProject() {
        if (!isset($_SESSION['user_id'])) {
            http_response_code(401);
            echo json_encode(["error" => "Non authentifié"]);
            return;
        }
        
        $user_id = $_SESSION['user_id'];
        
        $query = "SELECT 
                    c.id,
                    c.nom,
                    c.categorie,
                    c.prix,
                    upc.quantite,
                    (c.prix * upc.quantite) AS sous_total
                  FROM user_project_components upc
                  JOIN components c ON upc.component_id = c.id
                  WHERE upc.user_id = ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $project = [];
        $total = 0;
        
        while ($row = $result->fetch_assoc()) {
            $project[] = $row;
            $total += $row['sous_total'];
        }
        
        header('Content-Type: application/json');
        echo json_encode([
            "components" => $project,
            "total" => $total
        ]);
    }
    
    // ROUTE 4 : Supprimer du projet
    public function removeFromProject() {
        if (!isset($_SESSION['user_id'])) {
            http_response_code(401);
            echo json_encode(["error" => "Non authentifié"]);
            return;
        }
        
        $data = json_decode(file_get_contents("php://input"), true);
        $component_id = $data['component_id'] ?? null;
        $user_id = $_SESSION['user_id'];
        
        if (!$component_id) {
            http_response_code(400);
            echo json_encode(["error" => "ID composant manquant"]);
            return;
        }
        
        $query = "DELETE FROM user_project_components WHERE user_id = ? AND component_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $user_id, $component_id);
        
        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Composant supprimé"]);
        } else {
            http_response_code(500);
            echo json_encode(["error" => "Erreur lors de la suppression"]);
        }
    }
}
