<?php
/**
 * Items Class
 * Handles CRUD operations for user items
 */

require_once __DIR__ . '/../database/Database.php';

class Items {
    private $db;
    
    public function __construct() {
        $this->db = Database::getInstance();
    }
    
    /**
     * Get all items for a user
     * @param int $userId
     * @return array
     */
    public function getUserItems($userId) {
        $query = "SELECT * FROM items WHERE user_id = :user_id ORDER BY created_at DESC";
        return $this->db->fetchAll($query, ['user_id' => $userId]);
    }
    
    /**
     * Get a single item by ID
     * @param int $itemId
     * @param int $userId (to ensure user owns the item)
     * @return array|null
     */
    public function getItem($itemId, $userId) {
        $query = "SELECT * FROM items WHERE id = :id AND user_id = :user_id";
        return $this->db->fetchOne($query, [
            'id' => $itemId,
            'user_id' => $userId
        ]);
    }
    
    /**
     * Create a new item
     * @param int $userId
     * @param string $title
     * @param string $description
     * @return int (new item ID)
     */
    public function createItem($userId, $title, $description = '') {
        return $this->db->insert('items', [
            'user_id' => $userId,
            'title' => $title,
            'description' => $description
        ]);
    }
    
    /**
     * Update an item
     * @param int $itemId
     * @param int $userId (to ensure user owns the item)
     * @param string $title
     * @param string $description
     * @return bool
     */
    public function updateItem($itemId, $userId, $title, $description = '') {
        // First verify the item belongs to the user
        $item = $this->getItem($itemId, $userId);
        if (!$item) {
            return false;
        }
        
        return $this->db->update('items', 
            [
                'title' => $title,
                'description' => $description,
                'updated_at' => date('Y-m-d H:i:s')
            ],
            'id = :id AND user_id = :user_id',
            [
                'id' => $itemId,
                'user_id' => $userId
            ]
        );
    }
    
    /**
     * Delete an item
     * @param int $itemId
     * @param int $userId (to ensure user owns the item)
     * @return bool
     */
    public function deleteItem($itemId, $userId) {
        // First verify the item belongs to the user
        $item = $this->getItem($itemId, $userId);
        if (!$item) {
            return false;
        }
        
        return $this->db->delete('items', 
            'id = :id AND user_id = :user_id',
            [
                'id' => $itemId,
                'user_id' => $userId
            ]
        );
    }
    
    /**
     * Duplicate an item
     * @param int $itemId
     * @param int $userId (to ensure user owns the item)
     * @return int|false (new item ID or false)
     */
    public function duplicateItem($itemId, $userId) {
        // Get the original item
        $item = $this->getItem($itemId, $userId);
        if (!$item) {
            return false;
        }
        
        // Create a copy with "Copy of" prefix
        return $this->createItem(
            $userId,
            'Copy of ' . $item['title'],
            $item['description']
        );
    }
    
    /**
     * Get item count for a user
     * @param int $userId
     * @return int
     */
    public function getItemCount($userId) {
        $query = "SELECT COUNT(*) as count FROM items WHERE user_id = :user_id";
        $result = $this->db->fetchOne($query, ['user_id' => $userId]);
        return $result ? (int)$result['count'] : 0;
    }
}

