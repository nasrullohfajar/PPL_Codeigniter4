<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\m_Mahasiswa;
use CodeIgniter\Exceptions\PageNotFoundException;
class c_mahasiswa extends Controller{
    
    function __construct(){

        $this->mahasiswa = new m_mahasiswa();
    }

    public function display(){

        $input = $this->request->getVar('cari');
        if ($input){
            $data['mahasiswa'] = $this->mahasiswa->cariNama($input);
        } else {
            $data['mahasiswa'] = $this->mahasiswa->getData();
        }
        return view('v_displayMahasiswa', $data);
    }

    public function detail($NIM){

        $data['mahasiswa'] = $this->mahasiswa->getDataDetail($NIM);
        return view('v_detail', $data);
    }

    public function edit($NIM){

        $data['mahasiswa'] = $this->mahasiswa->getDataDetail($NIM);
        return view('v_editMahasiswa', $data);
    }

    public function update($NIM){

        $data = [
            'NIM' => $this->request->getPost('NIM'),
            'Nama' => $this->request->getPost('Nama'),
            'Umur' => $this->request->getPost('Umur')
        ];

        $this->mahasiswa->updateData($data, $NIM);
        return redirect()->to('/mahasiswa');
    }
}
