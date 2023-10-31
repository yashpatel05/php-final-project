<?php
namespace Humber\Models;

class Shoe
{
    // Method to get all categories from the database
    public function getAllCategories($dbcon){
        $sql = "SELECT * FROM categories";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();
        
        $categories = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $categories;
    }

    // Method to get subcategories based on a specific category from the database
    public function getSubCategoriesByCategoryId($dbcon, $categoryId){
        $sql = "SELECT * FROM sub_categories 
                WHERE category_id = :categoryId";

        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':categoryId', $categoryId);
        $pdostm->execute();

        $subCategories = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $subCategories;
    }

    // Method to get products from the database with sub-categories
    public function getProducts($dbcon) {
        $sql = "SELECT * FROM products p JOIN sub_categories s WHERE p.sub_category_id=s.id";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();

        $products = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $products;
    }

    // Method to get feedback with user details from the database
    public function getFeedbackWithUserDetails($dbcon) {
        $sql = "SELECT * FROM feedbacks f 
                JOIN users u 
                WHERE f.user_id = u.id";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();

        $feedbacks = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $feedbacks;
    }


}