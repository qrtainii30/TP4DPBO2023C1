<?php 

class Program extends DB{
    function getProgram()
    {
        $query = "SELECT * FROM program";
        return $this->execute($query);
    }

    function getIdProgram($id){
        $query = "SELECT * FROM program WHERE id_program = '$id'";
        return $this->execute($query);
    }

    function addProgram($data)
    {
        $jenis_program = $data['jenis_program'];
        $tgl_pelaksanaan = $data['tgl_pelaksanaan'];

        $query = "INSERT INTO program VALUES('', '$jenis_program', '$tgl_pelaksanaan')";
        return $this->execute($query);
    }

    function deleteProgram($id)
    {
        $query = "DELETE FROM program WHERE id_program = '$id'";

        return $this->execute($query);
    }

    function updateProgram($id, $data)
    {
        $jenis_program = $data['jenis_program'];
        $tgl_pelaksanaan = $data['tgl_pelaksanaan'];

        $query = "UPDATE program SET jenis_program = '$jenis_program', tgl_pelaksanaan = '$tgl_pelaksanaan' WHERE id_program = '$id'";
        return $this->execute($query);
    }
}

?>