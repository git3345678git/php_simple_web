<?php

require_once "db.php";






/**
* 登入方法
**/

function login($username = NULL , $password = NULL){



    $link = $GLOBALS['link'];

    $has_user = false ;


    $sql = "SELECT * FROM `user` WHERE `username` = '{$username}'  AND `password` = '{$password}';" ;


    $result = mysqli_query($link, $sql);



    if($result) {

        if(mysqli_num_rows($result) == 1 ){

            $has_user = true ;
            
        }
        
        mysqli_free_result($result);


    }else{
        echo "0 result";
    }



    return $has_user;


}













/**
*取所有作品
**/

function get_all_work(){

    $link = $GLOBALS['link'];

    $datas = array();

    $sql = "SELECT * FROM `works` ;" ;


    $result = mysqli_query($link, $sql);



    if( mysqli_num_rows($result) > 0 ) {
        
        while( $row = mysqli_fetch_assoc($result) ){
           $datas[] = $row;

        }
        

    mysqli_free_result($result);


    }else{
        echo "0 result";
    }



    return $datas;


}


/**
*取所有發佈文章
**/

function get_publish_work(){

    $link = $GLOBALS['link'];

    $datas = array();

    $sql = "SELECT * FROM `works` WHERE `publish` = 1 ;" ;


    $result = mysqli_query($link, $sql);



    if( mysqli_num_rows($result) > 0 ) {
        
        while( $row = mysqli_fetch_assoc($result) ){
           $datas[] = $row;

        }
        

    mysqli_free_result($result);


    }else{
        echo "0 result";
    }



    return $datas;


}

/**
*取一篇文章
**/

function get_work($id){

    $link = $GLOBALS['link'];

    $work = NULL ;

    $sql = "SELECT * FROM `works` WHERE `id` = {$id} ;" ;


    $result = mysqli_query($link, $sql);



    if($result) {

        if(mysqli_num_rows($result) == 1 ){

            $work = mysqli_fetch_assoc($result);
        }
        
        mysqli_free_result($result);


    }else{
        echo "0 result";
    }



    return $work;


}


































/**
*取所有文章
**/

function get_all_article(){

    $link = $GLOBALS['link'];

    $datas = array();

    $sql = "SELECT * FROM `article` ;" ;


    $result = mysqli_query($link, $sql);



    if( mysqli_num_rows($result) > 0 ) {
        
        while( $row = mysqli_fetch_assoc($result) ){
           $datas[] = $row;

        }
        

    mysqli_free_result($result);


    }else{
        echo "0 result";
    }



    return $datas;


}


/**
*取所有發佈文章
**/

function get_publish_article(){

    $link = $GLOBALS['link'];

    $datas = array();

    $sql = "SELECT * FROM `article` WHERE `publish` = 1 ;" ;


    $result = mysqli_query($link, $sql);



    if( mysqli_num_rows($result) > 0 ) {
        
        while( $row = mysqli_fetch_assoc($result) ){
           $datas[] = $row;

        }
        

    mysqli_free_result($result);


    }else{
        echo "0 result";
    }



    return $datas;


}

/**
*取一篇文章
**/

function get_article($id){

    $link = $GLOBALS['link'];

    $article = NULL ;

    $sql = "SELECT * FROM `article` WHERE `id` = {$id} ;" ;


    $result = mysqli_query($link, $sql);



    if($result) {

        if(mysqli_num_rows($result) == 1 ){

            $article = mysqli_fetch_assoc($result);
        }
        
        mysqli_free_result($result);


    }else{
        echo "0 result";
    }



    return $article;


}



/**
*文章儲存
**/

function article_save($data, $link){

    $save_result = false;

    $time = date("Y-m-d H:i:s");

    if(isset($data['id'])){
        // 如果有id 代表已經有文章是要做修改
         $sql = "UPDATE `article` SET 
                `title` = '{$data['title']}', 
                `category` = '{$data['category']}',
                `content` = '{$data['content']}',
                `publish` = '{$data['publish']}',
                `modify_date` = '{$time}'
                WHERE `id` = {$data['id']}; " ;

    }else{
        // 如果沒有id 代表已經有文章是要做新增
        $sql = "INSERT INTO `article` (`title`,`category`, `content`, `publish`, `create_date`) 
                        VALUE ('{$data['title']}','{$data['category']}','{$data['content']}','{$data['publish']}', '{$time}'  );" ;

    }


    // result update 或是 insert
    $result = mysqli_query($link, $sql);


    //result 成功執行
    if ($result){

        if(!isset($data['id'])){
            // 如果沒有id 就代表要新增
            //取得新增ID
            $new_id = mysqli_insert_id($link);

            echo "insert successfully create article id = {$new_id}";
                       
        }

        $save_result = true;

    }else{
        echo "insert Error:". mysqli_error($link);
    }


    mysqli_close($link);

    return $save_result;

}







function article_del($id){

    $link = $GLOBALS['link'];

    $del_result = false;


    $sql = "DELETE FROM `article` WHERE `id` = {$id};" ;


    $result = mysqli_query($link, $sql);



    if ($result){

        echo "DELETE successfully";
        $del_result = true;       

    }else{

        echo "DELETE Error:". mysqli_error($link);
    }


    mysqli_close($link);

    return $del_result;

}






/*
作品儲存

影片圖片 太大無法儲存
*/


function work_save($data, $link){


    print_r($data);
    

    $save_result = false;

    $time = date("Y-m-d H:i:s");




    if(isset($data['id'])){
        // 如果有id 代表已經有文章是要做修改
       
        $set_field = array();


        foreach ($data as $key => $value) {

               if ($key != 'id') {

                     $set_field[] = "`{$key}` = '{$value}'";
               }
        }
        

        $set_field[] = "`modify_date` = '{$time}'";

        $sql = "UPDATE `works` SET " . join(", ", $set_field) .  "WHERE `id` = {$data['id']}; " ;


    }else{
        // 如果沒有id 代表已經有文章是要做新增

        $field = array();
        $field_value = array();

        foreach ($data as $key => $value) {

                $field[] = "`{$key}`";
                $field_value[] = "'{$value}'";
                
        }


        $field[] = "`upload_date`";
        $field_value[] = "'{$time}'";


        $sql = "INSERT INTO `works` (" .   join(", ", $field)   . ")
                VALUE (" . join(", ", $field_value) . ");";


        //print_r( $sql);

    }




    // result update 或是 insert
    $result = mysqli_query($link, $sql);


    //result 成功執行
    if ($result){

        if(!isset($data['id'])){
            // 如果沒有id 就代表要新增
            //取得新增ID
            $new_id = mysqli_insert_id($link);

            echo "sql query success <br/>";
            echo "$sql";
                       
        }

        $save_result = true;

    }else{

         echo "sql query Error:". mysqli_error($link) . "<br/>";
         echo "$sql";
    }


    mysqli_close($link);

    return $save_result;

}







function work_del($id){

    $link = $GLOBALS['link'];

    $del_result = false;



    $work = get_work($id);


    if(file_exists("../" . $work['image_path']) ){

        unlink("../" . $work['image_path']);

    }


    if(file_exists("../" . $work['video_path']) ){

       unlink("../" . $work['video_path']);
    }







    $sql = "DELETE FROM `works` WHERE `id` = {$id};" ;


    $result = mysqli_query($link, $sql);



    if ($result){

        echo "DELETE successfully";
        $del_result = true;       

    }else{

        echo "DELETE Error:". mysqli_error($link);
    }


    mysqli_close($link);

    return $del_result;

}














?>