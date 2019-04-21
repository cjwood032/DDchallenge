<?php
    //topics
    function find_all_topics() {
        global $db;
        $sql= "SELECT * FROM topics ";
        //$sql .= "ORDER BY update_date DESC";
        $result = mysqli_query($db, $sql);
        return $result;
    }
    function find_topic_by_id($id) {
        global $db;
    
        $sql = "SELECT * FROM topics ";
        $sql .= "WHERE id='" . db_escape($db, $id) . "'";
        // echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $topic = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $topic; // returns an assoc. array
    }
    
    function insert_topic($topic) {
        global $db;
    
       // $errors = validate_topic($topic);
       // if(!empty($errors)) {
       //   return $errors;
       // }
    
        $sql = "INSERT INTO topics ";
        $sql .= "(title, post_body, created_at, updated_at) ";
        $sql .= "VALUES (";
        $sql .= "'" . db_escape($db, $topic['title']) . "',";
        $sql .= "'" . db_escape($db, $topic['post_body']) . "',";
        $sql .= "'" . db_escape($db, $topic['created_at']) . "',";
        $sql .= "'" . db_escape($db, $topic['updated_at']) . "'";
        $sql .= ")";
        $result = mysqli_query($db, $sql);
        // For INSERT statements, $result is true/false
        if($result) {
            return true;
        } else {
          // INSERT failed
          echo mysqli_error($db);
          db_disconnect($db);
          exit;
        }
      }

?>