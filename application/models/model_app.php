<?php

class Model_app extends CI_Model
{

    private $_table = "proyek";
    private $_lokasi = "lokasi";



    function __construct()
    {
        parent::__construct();

        // $this->load->library('encrypt');
        $this->load->library('aes');
    }

    public function rules()
    {
        return [
            [
                'field' => 'nm_lokasi',
                'label' => 'nm_lokasi',
                'rules' => 'required'
            ],
        ];
    }


    // ambil data dari db_sumber_barokah
    public function getAllLokasi()
    {
        $query = $this->db->query('SELECT kd_lokasi, nm_lokasi FROM lokasi');

        return $query->result();
    }

    // menambah data db_sumber_barokah
    public function inputLokasi()
    {
        $post = $this->input->post();
        $this->nm_lokasi = $post["nm_lokasi"];

        $this->db->insert($this->_lokasi, $this);
    }

    // function hapus
    public function delete($id)
    {

        return $this->db->delete($this->_table, array('id' => $id));
    }

    public function getbyId($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    // function ubah
    public function update()
    {
        $post = $this->input->post;
        $this->id = $post["id"];
        $this->pekerjaan_proyek = $post["pekerjaan_proyek"];
        $this->lokasi_proyek = $post["lokasi_proyek"];
        $this->nilai_kontrak = $post["nilai_kontrak"];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    //  ================= AUTOMATIC CODE ==================


    public function saveRekapTiket()
    {
        for ($i = 1; $i <= 16; $i++) {
            // $password = $this->input->post("pass");
            $password = '123';
            $passhash = hash("SHA256", $password, true);

            $fsrcmesg[$i] = $this->input->post('var_' . $i);
            $hashmesg = base64_encode($passhash);

            $aes = new AesCtr();
            $emessage[$i] = $aes->encrypt($fsrcmesg[$i], $passhash, 128);
            $encode[$i] = base64_encode($emessage[$i]);
            $result[$i] = $hashmesg . $encode[$i];
        }



        $data = array(
            // 'kode' => $this->input->post('var_1'),
            // 'officer' => $this->input->post('var_2'),
            // 'failure_date' => $this->input->post('var_3'),
            // 'failure_time' => $this->input->post('var_4'),
            // 'channel' => $this->input->post('var_5'),
            // 'satelitte' => $this->input->post('var_6'),
            // 'event' => $this->input->post('var_7'),
            // 'competitor' => $this->input->post('var_8'),
            // 'root_cause_description' => $this->input->post('var_9'),
            // 'impact' => $this->input->post('var_10'),
            // 'action' => $this->input->post('var_11'),
            // 'comment' => $this->input->post('var_12'),
            // 'cleared_date' => $this->input->post('var_13'),
            // 'cleared_time' => $this->input->post('var_14'),
            // 'resolution_time' => $this->input->post('var_15'),
            // 'resolution_time_second' => $this->input->post('var_16')
            'kode' => $result[1],
            'officer' => $result[2],
            'failure_date' => $result[3],
            'failure_time' => $result[4],
            'channel' => $result[5],
            'satelitte' => $result[6],
            'event' => $result[7],
            'competitor' => $result[8],
            'root_cause_description' => $result[9],
            'impact' => $result[10],
            'action' => $result[11],
            'comment' => $result[12],
            'cleared_date' => $result[13],
            'cleared_time' => $result[14],
            'resolution_time' => $result[15],
            'resolution_time_second' => $result[16]
        );

        $this->db->insert('rekap_tiket', $data);
    }



    public function getkodeticket()
    {



        // $query = $this->db->query("select max(id_ticket) as max_code FROM rekap_tiket");
        $query = $this->db->query("SELECT IFNULL( (SELECT kode from rekap_tiket 
        WHERE DATE_FORMAT(created_date, '%Y-%m-%d') = CURDATE() ORDER BY id_rekaptiket DESC LIMIT 1 ), 0 ) as max_code FROM DUAL");

        $row = $query->row_array();

        $password = '123';
        $passhash = hash("SHA256", $password, true);
        $fsrcmesg = $row['max_code'];
        $hashpass = base64_decode(substr($fsrcmesg, 0, 44));

        $pmessage = base64_decode(substr($fsrcmesg, 44));
        $aes = new AesCtr();
        $emessage = $aes->decrypt($pmessage, $passhash, 128);

        $max_id = $emessage;

        $max_fix = (int) substr($max_id, 9, 4);

        $max_nik = $max_fix + 1;

        $tanggal = $time = date("d");
        $bulan = $time = date("m");
        $tahun = $time = date("Y");

        $nik = "T" . $tahun . $bulan . $tanggal . $max_nik;
        return $nik;
    }


    public function getkodekaryawan()
    {
        $query = $this->db->query("select max(nik) as max_code FROM karyawan");

        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 1, 4);

        $max_nik = $max_fix + 1;

        $nik = "K" . sprintf("%04s", $max_nik);
        return $nik;
    }

    public function getkodeteknisi()
    {
        $query = $this->db->query("select max(id_teknisi) as max_code FROM teknisi");

        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 1, 4);

        $max_id_teknisi = $max_fix + 1;

        $id_teknisi = "T" . sprintf("%04s", $max_id_teknisi);
        return $id_teknisi;
    }

    public function getkodeuser()
    {
        $query = $this->db->query("select max(id_user) as max_code FROM user");

        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 1, 4);

        $max_id_user = $max_fix + 1;

        $id_user = "U" . sprintf("%04s", $max_id_user);
        return $id_user;
    }


    public function dropdown_rootcause()
    {
        $value[''] = '--PILIH--';
        $value['Source'] = 'Source';
        $value['Interface'] = 'Interface';
        $value['Sun Otage'] = 'Sun Otage';
        $value['Fiber Optik'] = 'Fiber Optik';
        $value['TVRO'] = 'TVRO';
        $value['Head End'] = 'Head End';
        $value['Maintenance'] = 'Maintenance';
        $value['ME-Problem'] = 'ME-Problem';

        return $value;
    }

    public function dropdown_competitor()
    {
        $value[''] = '--PILIH--';
        $value['YES'] = 'YES';
        $value['NO'] = 'NO';
        $value['-'] = '-';


        return $value;
    }

    public function dropdown_channel()
    {
        $sql = "SELECT Channel,idChannel FROM channel 
                ORDER BY idChannel";
        $query = $this->db->query($sql);

        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row) {
            $value[$row->idChannel] = $row->Channel;
        }
        return $value;
    }


    public function getModelChannel()
    {
        $sql = "SELECT Channel, idChannel, Satelite FROM channel 
                ORDER BY idChannel";
        $query = $this->db->query($sql);
        $data = $query->result();

        if ($data) {
            $return_arr['data'] = array();
            foreach ($data as $row) {
                $row_array['N1'] = $row->idChannel;
                $row_array['N2'] = $row->Channel;
                $row_array['N3'] = $row->Satelite;

                $return_arr['data'][] = $row_array; //PUSH ARRAY
            }
            $return_arr["success"] = 1;
            $return_arr["message"] = "Successfully.";
        } else {
            $return_arr["success"] = 0;
            $return_arr["message"] = "Failed.";
        }

        return $return_arr;
    }

    public function dropdown_Officer1()
    {
        $sql = "SELECT Officer1,idOfficer FROM officer
                ORDER BY idOfficer";
        $query = $this->db->query($sql);

        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row) {
            $value[$row->idOfficer] = $row->Officer1;
        }
        return $value;
    }



    public function selectListTicket()
    {
        $sql = "SELECT id_rekaptiket, kode, officer, failure_date, failure_time, channel, satelitte
                , event, competitor, root_cause_description, impact, action, comment, cleared_date
                , cleared_time, resolution_time, resolution_time_second FROM rekap_tiket
                
                ";
        $query = $this->db->query($sql);
        $data = $query->result();



        if ($data) {
            $return_arr['data'] = array();
            foreach ($data as $row) {


                $row_array['N1'] = $row->id_rekaptiket;
                $row_array['N2'] = $row->kode;
                $row_array['N3'] = $row->officer;
                $row_array['N4'] = $row->failure_date;
                $row_array['N5'] = $row->failure_time;
                $row_array['N6'] = $row->channel;
                $row_array['N7'] = $row->satelitte;
                $row_array['N8'] = $row->event;
                $row_array['N9'] = $row->competitor;
                $row_array['N10'] = $row->root_cause_description;
                $row_array['N11'] = $row->impact;
                $row_array['N12'] = $row->action;
                $row_array['N13'] = $row->comment;
                $row_array['N14'] = $row->cleared_date;
                $row_array['N15'] = $row->cleared_time;
                $row_array['N16'] = $row->resolution_time;
                $row_array['N17'] = $row->resolution_time_second;

                $password = '123';
                $passhash = hash("SHA256", $password, true);
                $aes = new AesCtr();
                for ($n = 1; $n <= 17; $n++) {
                    $fsrcmesg[$n] = $row_array['N' . $n];
                    $hashpass[$n] = base64_decode(substr($fsrcmesg[$n], 0, 44));
                    $pmessage[$n] = base64_decode(substr($fsrcmesg[$n], 44));
                    $emessage['N' . $n] = $aes->decrypt($pmessage[$n], $passhash, 128);
                }

                $return_arr['data'][] = $emessage; //PUSH ARRAY
            }
        } else {
            $return_arr["success"] = 0;
            $return_arr["message"] = "Failed.";
        }

        return $return_arr;
    }


    public function editKey()
    {
        $key_confirm = $this->input->post('var_1');
        $id_user = $this->session->userdata('id_user');

        $sql = "UPDATE user set `key` = '$key_confirm' where idUser = '$id_user' ";
        $query = $this->db->query($sql);
    }
}
