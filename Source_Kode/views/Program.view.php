<?php 

    class ProgramView{
        public function render($data){
            $no = 1;
            $dataProgram = null;

            foreach($data['program'] as $val){
              list($id_program, $jenis_program, $tgl_pelaksanaan) = $val;
            
                $dataProgram .= "<tr>
                        <td>" . $no . "</td>
                        <td>" . $id_program . "</td>
                        <td>" . $jenis_program . "</td>
                        <td>" . $tgl_pelaksanaan . "</td>
                        <td>
                        <a href='program.php?id_edit=" . $id_program.  "' class='btn btn-warning'>Edit</a>
                        <a href='author.php?id_hapus=" . $id_program . "' class='btn btn-danger''>Hapus</a>
                        </td>
                        </tr>";
            }
      
            $tpl = new Template("templates/index.html");
            $tpl->replace("DATA_TABEL", $dataAuthor);
            $tpl->replace("DATA_TITLE", "Program");
            $tpl->write();
        }

        public function Add()
        {
            $dataForm = null;
            $dataForm .= '<label for="jenis_program">Jenis Program:</label>
                <input type="text" id="jenis_program" name="jenis_program" required>

                <label for="tgl_pelaksanaan">Tanggal Pelaksanaan:</label>
                <input type="date" id="tgl_pelaksanaan" name="tgl_pelaksanaan" required>
                
                <button type="submit" class="btn btn-info text-white" name="btn-submit" id="btn-submit">Submit</button>';

            $tpl = new Template("templates/form.html");
            $tpl->replace("DATA_LINK", "program.php");
            $tpl->replace("DATA_TITLE", "Tambah Program");
            $tpl->replace("DATA_FORM", $dataForm);
            $tpl->write();
        }

        public function Update($dataGroup)
        {
            // render form
            $dataForm = null;
            $dataForm = '<label for="jenis_kegiatan">Jenis Kegiatan:</label>
                <input type="hidden" name="id" value="' . $id_program . '" >
                <input type="text" id="jenis_kegiatan" name="jenis_kegiatan" value="' . $jenis_program . '" required>
                
                <label for="tgl_pelaksanaan">Nama Agensi:</label>
                <input type="date" id="tgl_pelaksanaan" name="tgl_pelaksanaan" value="' . $tgl_pelaksanaan . '" required>
                
                <button type="submit" class="btn btn-info text-white" name="btn-update" id="btn-submit">Submit</button>';

            $tpl = new Template("templates/form.html");
            $tpl->replace("DATA_LINK", "program.php");
            $tpl->replace("DATA_TITLE", "Update Program");
            $tpl->replace("DATA_FORM", $dataForm);
            $tpl->write();
        }
    }

?>