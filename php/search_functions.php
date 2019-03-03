<?php

	function getSearchChannel($dbh, $search_text){

        $stmt = $dbh->prepare('SELECT * FROM Channel WHERE description LIKE ?');
        $search_text1 = "%" . $search_text . "%";
        $stmt->execute(array($search_text1));
        $row = $stmt->fetchAll();

        return $row;
    }
    function getSearchPost($dbh, $search_text){
     
        $stmt = $dbh->prepare('SELECT * FROM Post WHERE title LIKE ?');
        $search_text1 = "%" . $search_text . "%";
        $stmt->execute(array($search_text1));
        $row = $stmt->fetchAll();

        return $row;
    }

?>