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
                <th> Jenis Program </th>
                <th> Email </th>
                <th> No. Telepon </th>
                <th> Tanggal Bergabung </th>
                <th> Aksi </th>
                </tr>";


        $tpl = new Template("templates/index.html");

        $tpl->replace("DATA_HEADER", $header);
        $tpl->replace("DATA_LINK_FORM", "index.php?AddForm=true");
        $tpl->replace("DATA_TITLE", "Member");
        $tpl->replace("DATA_TABLE", $dataMember);
        $tpl->write();
    }

    public function AddForm($data)
    {
        // buat option untuk select
        $dataOption = '<option value="">Pilih Program</option>';
        foreach ($data as $temp) {
            $dataOption .= '<option value="' . $temp['id_program'] . '">' . $temp['jenis_program'] . '</option>';
        }
        
        $dataForm = null;
        $dataForm = '<label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>

            <label for="id_program">Id Program:</label>
            <select id="id_program" name="id_program" required>' . $dataOption .
            '</select>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>
            
            <label for="join_date">Join Date:</label>
            <input type="date" id="join_date" name="join_date" required>
            
            <button type="submit" class="btn btn-info text-white" name="btn-submit" id="btn-submit">Submit</button>';



        $tpl = new Template("templates/form.html");
        $tpl->replace("DATA_LINK", "index.php");
        $tpl->replace("DATA_TITLE", "Tambah Member");
        $tpl->replace("DATA_FORM", $dataForm);
        $tpl->write();
    }

    public function UpdateForm($dataProgram, $dataMember)
    {
        // buat option untuk select
        $dataOption = null;
        foreach ($dataProgram as $temp) {
            if ($temp['id_program'] == $dataMember[0]['id_program']) {
                $dataOption .= '<option value="' . $temp['id_program'] . '" selected>' . $temp['jenis_program'] . '</option>';
            } else {
                $dataOption .= '<option value="' . $temp['id_program'] . '">' . $temp['jenis_program'] . '</option>';
            }
        }

        $dataForm = null;
        $dataForm = '<label for="name">Nama:</label>
            <input type="hidden" name="id" value="' . $dataMember[0]['id'] . '" >
            <input type="text" id="name" name="name" value="' . $dataMember[0]['name'] . '" required>

            <label for="id_program">Id Program:</label>
            <select id="id_program" name="id_program" required>' . $dataOption .
            '</select>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="' . $dataMember[0]['email'] . '" required>
            
            <label for="phone">No. Telepon:</label>
            <input type="text" id="phone" name="phone"  value="' . $dataMember[0]['phone'] . '" required>
            
            <label for="join_date">Tanggal Bergabung:</label>
            <input type="date" id="join_date" name="join_date"  value="' . $dataMember[0]['join_date'] . '" required>
            
            <button type="submit" class="btn btn-info text-white" name="btn-update" id="btn-submit">Submit</button>';

        $tpl = new Template("templates/form.html");
        $tpl->replace("DATA_LINK", "index.php");
        $tpl->replace("DATA_TITLE", "Update Member");
        $tpl->replace("DATA_FORM", $dataForm);
        $tpl->write();
    }
}