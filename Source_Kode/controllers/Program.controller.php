<?php
include_once("connection.php");
include_once("models/Program.class.php");
include_once("views/Program.view.php");

class ProgramController
{
    private $program;

    function __construct()
    {
        $this->program = new Program(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
    }

    public function index()
    {
        $this->program->open();
        $this->program->getProgram();

        $data = array();
        while ($row = $this->program->getResult()) {
            array_push($data, $row);
        }
        $this->program->close();
        
        $view = new ProgramView();
        $view->render($data);
    }

    public function delete($id)
    {
        $this->program->open();
        $this->program->deleteProgram($id);
        $this->program->close();
        header("location:program.php");
    }

    public function add($data)
    {
        $this->program->open();
        $this->program->addProgram($data);
        $this->program->close();
        header("location:program.php");
    }

    public function AddFormulir()
    {
        $this->program->open();
        $this->program->getProgram();
        $data = array(
        'program' => array(),
        );

        while($row = $this->program->getResult()){
        array_push($data['program'], $row);
        }

        $this->program->close();

        $view = new ProgramView();
        $view->AddForm($data);
    }

    public function update($id, $data)
    {
        $this->program->open();
        $this->program->updateProgram($id, $data);
        $this->program->close();
        header("location:program.php");
    }

    public function UpdateFormulir($id)
    {
        $this->program->open();
        $this->program->getIdProgram($id);
        $dataProgram = array();
        while ($row = $this->program->getResult()) {
            array_push($dataProgram, $row);
        }
        $this->program->close();

        $view = new ProgramView();
        $view->UpdateForm($dataProgram);
    }
}