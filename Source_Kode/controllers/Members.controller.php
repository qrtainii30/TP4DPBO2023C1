<?php
include_once("connection.php");
include_once("models/Members.class.php");
include_once("models/Program.class.php");
include_once("views/Members.view.php");

class MembersController
{
    private $member;
    private $program;

    function __construct()
    {
        $this->member = new Members(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
        $this->program = new Program(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
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
        
        $view = new MembersView();
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