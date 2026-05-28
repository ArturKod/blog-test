<?php
namespace App\Models;

use App\Database;
use PDO;
use PDOException;

class Category {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAllWithRecentArticles($limit = 3) {
        $sql = "SELECT t.* FROM (
                    SELECT c.id, c.name, c.description as cat_desc, 
                           a.id as article_id, a.title, a.image, a.description, a.views, a.created_at,
                           ROW_NUMBER() OVER (PARTITION BY c.id ORDER BY a.created_at DESC) as rn
                    FROM categories c
                    INNER JOIN article_category ac ON c.id = ac.category_id
                    INNER JOIN articles a ON ac.article_id = a.id
                ) t
                WHERE t.rn <= :limit
                ORDER BY t.name, t.created_at DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limit', (int)$limit, \PDO::PARAM_INT);
        $stmt->execute();
        $rows = $stmt->fetchAll();

        $result = [];
        foreach ($rows as $row) {
            $id = $row['id'];
            if (!isset($result[$id])) {
                $result[$id] = [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'description' => $row['cat_desc'],
                    'articles' => []
                ];
            }
            if ($row['article_id']) {
                $result[$id]['articles'][] = $row;
            }
        }
        return array_values($result);
    }

    public function getCategoryWithArticles($categoryId, $sort = 'date', $page = 1, $perPage = 5) {
        $stmt = $this->db->prepare("SELECT * FROM categories WHERE id = :id");
        $stmt->execute([':id' => $categoryId]);
        $category = $stmt->fetch();
        if (!$category) return null;

        $orderBy = ($sort === 'views') ? 'views DESC' : 'created_at DESC';
        $offset = ($page - 1) * $perPage;

        $sql = "SELECT a.* FROM articles a
                INNER JOIN article_category ac ON a.id = ac.article_id
                WHERE ac.category_id = :cat_id
                ORDER BY $orderBy
                LIMIT :perPage OFFSET :offset";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':cat_id', $categoryId, PDO::PARAM_INT);
        $stmt->bindValue(':perPage', $perPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $articles = $stmt->fetchAll();

        $totalStmt = $this->db->prepare("SELECT COUNT(*) FROM article_category WHERE category_id = :cat_id");
        $totalStmt->execute([':cat_id' => $categoryId]);
        $total = $totalStmt->fetchColumn();

        return [
            'category' => $category,
            'articles' => $articles,
            'total' => $total,
            'per_page' => $perPage,
            'current_page' => $page,
            'last_page' => ceil($total / $perPage)
        ];
    }
}