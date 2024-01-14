<?php

namespace App\Controllers;

use CodeIgniter\Files\File;

class UploadController extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        return $this->returnView('admin/uploadForm', ['errors' => []]);
    }

    public function upload(){
        $validationRule = [
            'userfile' => [
                'label' => 'PDF File',
                'rules' => [
                    'uploaded[userfile]',
                    'mime_in[userfile,application/pdf,image/jpg,image/jpeg,image/png]',
                    'max_size[userfile,2048]', #kB
                ],
            ],
        ];
        if (! $this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];
            return $this->returnView('admin/uploadForm', $data);
        }

        $filename = $this->request->getFile('userfile');

        if (! $filename->hasMoved()) {
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $filepath = WRITEPATH . 'uploads/' . $filename->store('uploads' );
            $data = ['uploaded_fileinfo' => new File($filepath)];
            return $this->returnView('admin/uploadSuccess', $data);
        }

        $data = ['errors' => 'Plik usunięty.'];

        return $this->returnView('admin/uploadForm', $data);
    }

    public function returnView($view, $data){
        echo view('admin/headerAdmin');
        echo view($view, $data);
        echo view('footer');
    }

    public function FileList(){
        $path    = WRITEPATH . 'uploads/uploads/';
        #scandir - Returns an array of files and directories from the directory.
        $data['files'] = array_diff(scandir($path), array('.', '..'));
        return $this->returnView('admin/fileList', $data);
    }
}