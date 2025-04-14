<?php

function getAllShoes($db, $sort = 'nom', $order = 'asc') {
    try {
        $validFields = ['nom', 'prix', 'marque', 'taille', 'genre', 'id'];
        if (!in_array($sort, $validFields)) {
            $sort = 'id';
        }

        if ($order !== 'asc' && $order !== 'desc') {
            $order = 'asc';
        }

        $query = $db->prepare("SELECT * FROM shoes ORDER BY $sort $order");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}

function getLastShoes($db) {
    try {
        $query = $db->prepare('SELECT * FROM shoes ORDER BY id DESC LIMIT 1');
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}

function getBrands($db) {
    try {
        $query = $db->prepare('SELECT DISTINCT marque FROM shoes ORDER BY marque ASC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}

function getSizes($db) {
    try {
        $query = $db->prepare('SELECT DISTINCT taille FROM shoes ORDER BY taille ASC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}

function getGenres($db) {
    try {
        $query = $db->prepare('SELECT DISTINCT genre FROM shoes ORDER BY genre DESC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}
