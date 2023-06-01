<?php

class Members extends DB
{
    function getMembers()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function getIdMembers($id)
    {
        $query = "SELECT * FROM members WHERE id ='$id'";
        return $this->execute($query);
    }

    function addMembers($data)
    {
        $id_program = $data['id_program'];
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];

        $query = "INSERT INTO members VALUES('', '$id_program', '$name', '$email', '$phone', '$join_date');";

        return $this->executeAffected($query);
    }

    function updateMembers($id, $data)
    {
        $id_program = $data['id_program'];
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];

        $query = "UPDATE members set id_program = '$id_program', name = '$name', email = '$email', phone = '$phone', join_date = '$join_date' where id ='$id'";

        return $this->executeAffected($query);
    }

    function deleteMembers($id)
    {
        $query = "DELETE FROM members WHERE id =$id";
        return $this->executeAffected($query);
    }
}