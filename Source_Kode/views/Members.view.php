<?php

class MembersView
{
    public function render($data)
    {
        $dataMember = null;

        $no = 0; // Initialize the $no variable outside the loop

        foreach ($data as $val) {
            $dataMembers .=
                '<tr>
                <th scope="row">' . ++$no . '</th>
                <td>' . $val['name'] . '</td>
                <td>' . $val['email'] . '</td>
                <td>' . $val['phone'] . '</td>
                <td>' . $val['join_date'] . '</td>
                <td>' . $val['judul_kegiatan'] . '</td>

                <a href="form.php?id=' . $val['id'] . '"><button type="button" class="btn btn-success text-white">Edit</button></a>
                <a href="index.php?hapus=' . $val['id'] . '"><button type="button" class="btn btn-danger">Delete</Hapus></a>
                </td>
                </tr>';
        }
        $header = "<tr>
        <th> No </th>
                <th> Nama </th>
                <th> Nama Group </th>
                <th> Nama Agensi </th>
                <th> Email </th>
                <th> Phone </th>
                <th> Join Date </th>
                <th> Action </th>
                </tr>";


        $view = new Template("templates/index.html");

        $view->replace("DATA_HEADER", $header);
        $view->replace("DATA_LINK", "form.php");
        $view->replace("DATA_TITLE", "Member");
        $view->replace("DATA_TABLE", $dataMember);
        $view->write();
    }
}