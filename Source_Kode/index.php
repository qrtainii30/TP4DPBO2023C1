<?php
include_once("models/Templates.class.php");
include_once("models/DB.class.php");
include_once("controllers/Members.controller.php");

$members = new MembersController();

if (isset($_POST['btn-submit'])) {
        $members->add($_POST);
} else if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $members->UpdateForm($id); 
} else if (isset($_POST['btn-update'])) {
        $id = $_POST['id'];
        $members->update($id, $_POST);
} else if(!empty($_GET['addForm'])){
        $members->AddForm(); 
}else{
        $members->index();
}

if (isset($_GET['hapus'])) {
  $id = $_GET['hapus'];
  $members->delete($id);
}

?>