<?php
namespace App\Models;

use App\Database;
use PDO;
use PDOException;

class Article {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getById($id) {
        $update = $this->db->prepare("UPDATE articles SET views = views + 1 WHERE id = ?");
        $update->execute([$id]);

        $stmt = $this->db->prepare("SELECT * FROM articles WHERE id = ?");
        $stmt->execute([$id]);
        $article = $stmt->fetch();

        if ($article) {
            $catStmt = $this->db->prepare("
                SELECT c.id, c.name FROM categories c
                INNER JOIN article_category ac ON c.id = ac.category_id
                WHERE ac.article_id = ?
            ");
            $catStmt->execute([$id]);
            $article['categories'] = $catStmt->fetchAll();
        }
        return $article;
    }

    public function getSimilar($articleId, $limit = 3) {
        $sql = "SELECT DISTINCT a.*, COUNT(ac.category_id) as common_cats
                FROM articles a
                INNER JOIN article_category ac ON a.id = ac.article_id
                WHERE ac.category_id IN (
                    SELECT category_id FROM article_category WHERE article_id = :articleId
                )
                AND a.id != :articleId
                GROUP BY a.id
                ORDER BY common_cats DESC, a.created_at DESC
                LIMIT :limit";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':articleId', $articleId, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}