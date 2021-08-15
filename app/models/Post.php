<?php


class Post
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    // finding all the posts
    public function findAllPosts()
    {
        $this->db->query('SELECT * FROM posts ORDER BY created_at ASC');
        $results = $this->db->resultSet();
        return $results;
    }

    // retrieving a specific article
    public function findPostById($id)
    {
        $this->db->query('SELECT * FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
    // adding post
    public function addPost($data)
    {
        $this->db->query('INSERT INTO posts(user_id, title, text, created_at) 
                VALUES(:user_id, :title, :text, now())');

        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':text', $data['body']);
        // echo date('Y-m-d h:i:s', time());
        if($this->db->execute())
            return true;
        else
            return false;
    }
    // updating a specific article
    public function updatePost($data)
    {
        $this->db->query('UPDATE posts SET title = :title, text = :body
        WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        if ($this->db->execute())
            return true;
        else
            return false;
    }

    // delete a post

    public function deletePost($id)
    {
        $this->db->query('DELETE FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);
        if($this->db->execute())
            return true;
        else
            return false;
    }
}