<?php

namespace App\Controllers;
use App\Support\Database;
use App\Facade\Image;

class Teacher extends Database {

    use Image;
    //creating insert data method.
    public function createNew($name, $email, $cell, $photo){
        $photo_name = $this->move($photo, "photos/teachers/");

        $this->create("teachers",[
            "name" => $name,
            "email" => $email,
            "cell" => $cell,
            "photo" => $photo_name["file_name"]
        ]);

    }

    //all teacher show method
    public function showTeachers($trash = 0){
        return $this -> cq("SELECT *FROM teachers WHERE trash = $trash");
    }


    //single teacher profile show method
    public function singleTeacher($id){
       return $this->find("teachers", $id);
    }


    //edit single teacher method
    public function editTeacher($id){
        return $this->find("teachers", $id);
    }


    //update single teacher method
    public function updateTeacher($name, $email, $cell, $id, $old_photo, $new_photo){
        //old and new photo conditions.
        if(empty($new_photo['name'])){
            $photo_name= $old_photo;

        }else{
            $p_name= $this->move($new_photo, "photos/teachers/");
            $photo_name=$p_name['file_name'];
            unlink("photos/teachers/" . $old_photo);
        }

        //update method calling in database.
        $this->update("teachers", $id, [
            "name" =>$name,
            "email" =>$email,
            "cell" =>$cell,
            "photo" =>$photo_name
        ]);
    }

    //trash teacher method
    public function trashTeacher($id){
        return $this->cq("UPDATE teachers SET trash = 1 WHERE id= $id");
    }


    //restore data of teacher
    public function restoreData($id){
        return $this-> cq("UPDATE teachers SET trash = 0 WHERE id= $id");
        
    }

    //delete data of teacher
    public function deleteData($id){
        return $this->delete("teachers", $id);
    }






    //data rows count function
    public function dataCount($type){
        if($type=='trash'){
            $data_type=1;
        }else{
            $data_type=0;
        }

        $data = $this->cq("SELECT * FROM teachers WHERE trash=$data_type");
        if($data->num_rows > 0){
            return $data->num_rows;
        }
    }





    //alert messege show function.
    public function messege($txt, $type="danger"){
        return "<span class='alert alert-$type'>$txt</span>";
    }
}






?>