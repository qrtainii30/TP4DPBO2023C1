<?php
include_once("models/Templates.class.php");
include_once("models/DB.class.php");
include_once("controllers/Program.controller.php");

$program = new ProgramController();

if (isset($_POST['btn-submit'])) {
    $program->add($_POST);
} else if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $program->UpdateForm($id); 
} else if (isset($_POST['btn-update'])) {
    $id = $_POST['id'];
    $program->update($id, $_POST);
} else if(!empty($_GET['addForm'])){
    $program->AddForm(); 
}else {
    $program->index();
}

if (isset($_GET['hapus'])) {
        $id = $_GET['hapus'];
    
        $program->delete($id);

}
