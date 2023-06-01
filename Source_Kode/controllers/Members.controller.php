<?php
include_once("connection.php");
include_once("models/Members.class.php");
include_once("models/Program.class.php");
include_once("views/Members.view.php");

class MembersController
{
    private $member;
    private $group;

    function __construct()
    {
        $this->member = new Members(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
        $this->group = new Group(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
    }

    public function index()
    {
        $this->member->open();
        $this->member->getMembers();

        $data = array();
        while ($row = $this->member->getResult()) {
            array_push($data, $row);
        }
        $this->member->close();
        
        $view = new MemberView();
        $view->render($data);
    }

    public function delete($id)
    {
        $this->member->open();
        $this->member->deleteMembers($id);
        $this->member->close();
        header("location:index.php");
    }

    public function add($data)
    {
        $this->member->open();
        $this->member->addMembers($data);
        $this->member->close();
        header("location:index.php");
    }

    public function AddFormulir() 
    {
        $this->program->open();
        $this->program->getProgram();
        
        $data = array();
        while ($row = $this->program->getResult()) {
            array_push($data, $row);
        }
        $this->program->close();
        
        $view = new MembersView();
        $view->AddForm($data);
    }

    public function update($id, $data)
    {
        
        $this->member->open();
        $this->member->updateMembers($id, $data);
        $this->member->close();
        header("location:index.php");
    }

    public function UpdateFormulir($id)
    {
        $this->member->open();
        $this->member->getMembers();
        
        $dataMember = array();
        while ($row = $this->member->getResult()) {
            array_push($dataMember, $row);
        }
        $this->member->close();

         
        $this->program->open();
        $this->program->getIdProgram($id);
        $dataProgram = array();
        while ($temp = $this->program->getResult()) {
            array_push($dataProgram, $temp);
        }
        $this->program->close();

        $view = new ProgramView();
        $view->UpdateForm($dataProgram, $dataMember);
    }
}