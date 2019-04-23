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
        $sql .= "WHERE topic_id='" . db_escape($db, $id) . "'";
        //echo $sql;
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
      function update_topic($topic) {
        global $db;
    
       // $errors = validate_topic($topic);
       // if(!empty($errors)) {
       //   return $errors;
       // }
    
        $sql = "UPDATE topics SET ";
        $sql .= "title='" . db_escape($db, $topic['title']) . "', ";
        $sql .= "post_body='" . db_escape($db, $topic['post_body']) . "', ";
        $sql .= "updated_at='" . db_escape($db, $topic['updated_at']) . "' ";
        $sql .= "WHERE topic_id='" . db_escape($db, $topic['topic_id']) . "' ";
        $sql .= "LIMIT 1";
        $result = mysqli_query($db, $sql);
        // For UPDATE statements, $result is true/false
        if($result) {
          return true;
        } else {
          // UPDATE failed
          echo mysqli_error($db);
          db_disconnect($db);
          exit;
        }
      }// end of update
      function delete_topic($id) {
        global $db;
    
        $sql = "DELETE FROM topics ";
        $sql .= "WHERE topic_id='" . db_escape($db, $id) . "' ";
        $sql .= "LIMIT 1";
        $result = mysqli_query($db, $sql);
    
        // For DELETE statements, $result is true/false
        if($result) {
          return true;
        } else {
          // DELETE failed
          echo mysqli_error($db);
          db_disconnect($db);
          exit;
        }
      }
?>