<?php
    //*******users******
    function insert_user($user) {
        global $db;
    
        $sql = "INSERT INTO users ";
        $sql .= "(username, email, password) ";
        $sql .= "VALUES (";
        $sql .= "'" . db_escape($db, $user['username']) . "',";
        $sql .= "'" . db_escape($db, $user['email']) . "',";
        $sql .= "'" . db_escape($db, $user['password']) . "'";
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
    function user_logon($username) {
        global $db;
        $sql = "SELECT * FROM users ";
        $sql .= "WHERE username= '" . db_escape($db, $username) . "'";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $user = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $user['user_id'];
    } 
    function find_all_users() {
        global $db;
        $sql= "SELECT * FROM users ";
        $result = mysqli_query($db, $sql);
        return $result;
    }
    function find_user_by_id($id) {
        global $db;
    
        $sql = "SELECT * FROM users ";
        $sql .= "WHERE user_id='" . db_escape($db, $id) . "'";
        //echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $user = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $user; // returns an assoc. array
    }
    function update_user($user) {
        global $db;
        $sql = "UPDATE users SET ";
        $sql .= "username='" . db_escape($db, $user['username']) . "', ";
        $sql .= "email='" . db_escape($db, $user['email']) . "' ";
        $sql .= "WHERE user_id='" . db_escape($db, $user['user_id']) . "' ";
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
    function add_watcher($id) {
        global $db;
        
        $sql = "INSERT INTO watchers ";
        $sql .= "(user_id, topic_id) ";
        $sql .= "VALUES (";
        $sql .= "'" . db_escape($db, $_SESSION['user_id']) . "',";
        $sql .= "'" . db_escape($db, $id) . "'";
        $sql .= ")";
        echo $sql;
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
    
    function get_watchers($id){
        global $db;
        $sql= "SELECT * FROM watchers ";
        $sql .= "WHERE topic_id='" . db_escape($db, $id) . "' ";
        $result = mysqli_query($db, $sql);
        return $result;
    }
    
    
    function remove_watcher($id) {
        global $db;
    
        $sql = "DELETE FROM watchers ";
        $sql .= "WHERE topic_id='" . db_escape($db, $id) . "' ";
        $sql .= "AND user_id='" . db_escape($db, $_SESSION['user_id']) . "' ";
        $sql .= "LIMIT 1";
        $result = mysqli_query($db, $sql);
        if($result) {
          return true;
        } else {
          // DELETE failed
          echo mysqli_error($db);
          db_disconnect($db);
          exit;
        }
      }
    

    //******topics*****
    function find_all_topics() {
        global $db;
        $sql= "SELECT * FROM topics ";
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
   
        $sql = "INSERT INTO topics ";
        $sql .= "(user_id, title, post_body, created_at, updated_at) ";
        $sql .= "VALUES (";
        $sql .= "'" . db_escape($db, $topic['user_id']) . "',";
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
            delete_related($id);
          return true;
        } else {
          // DELETE failed
          echo mysqli_error($db);
          db_disconnect($db);
          exit;
        }
      }
      //******replies****** 
      function get_replies($id){
        global $db;
        $sql= "SELECT * FROM replies ";
        $sql .= "WHERE topic_id='" . db_escape($db, $id) . "'";
        $result = mysqli_query($db, $sql);
        return $result;
    }
      function insert_reply($reply) {
        global $db;
   
        $sql = "INSERT INTO replies ";
        $sql .= "(reply_body, user_id, topic_id, created_at, updated_at) ";
        $sql .= "VALUES (";
        $sql .= "'" . db_escape($db, $reply['reply_body']) . "',";
        $sql .= "'" . db_escape($db, $reply['user_id']) . "',";
        $sql .= "'" . db_escape($db, $reply['topic_id']) . "',";
        $sql .= "'" . db_escape($db, $reply['created_at']) . "',";
        $sql .= "'" . db_escape($db, $reply['updated_at']) . "'";
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
      function update_reply($reply) {
        global $db;
        $sql = "UPDATE replies SET ";
        $sql .= "reply_body='" . db_escape($db, $reply['reply_body']) . "', ";
        $sql .= "updated_at='" . db_escape($db, $reply['updated_at']) . "' ";
        $sql .= "WHERE reply_id='" . db_escape($db, $reply['reply_id']) . "' ";
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
      function find_reply_by_id($id) {
        global $db;
    
        $sql = "SELECT * FROM replies ";
        $sql .= "WHERE reply_id='" . db_escape($db, $id) . "'";
        //echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $reply = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $reply; // returns an assoc. array
    }
    function delete_reply($id) {
        global $db;
    
        $sql = "DELETE FROM replies ";
        $sql .= "WHERE reply_id='" . db_escape($db, $id) . "' ";
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
    function delete_related($id) {
        global $db;
    
        $sql = "DELETE FROM replies ";
        $sql .= "WHERE topic_id='" . db_escape($db, $id) . "' ";
        mysqli_query($db, $sql);
        $sql = "DELETE FROM watchers ";
        $sql .= "WHERE topic_id='" . db_escape($db, $id) . "' ";
        mysqli_query($db, $sql);
    }
    function email_watchers($reply){
      $watchers = get_watchers($reply['topic_id']);
      $headers = "From: no-reply@fakesite.com\r\n Bcc: tracker@fakesite.com";
      $to= "noreply@fakesite.com";
     
      $topic=find_topic_by_id($reply['topic_id']);
      $subject="Topic " . $topic['title'] . " recieved a reply!";
      $message="Someone replied with " . $reply['reply_body'];
      foreach($watchers as $watcher){
        $user=find_user_by_id($watcher["user_id"]);
        echo $user['email'];
        $headers .= ", " . $user['email'];
      }
      //mail($to,$subject,$message,$headers) <-this will fail since we have no mail server
      echo  $headers .  " have been emailed the following " . $message;
  }
?>