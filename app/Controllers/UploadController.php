<?php

namespace App\Controllers;

use CodeIgniter\Files\File;

class UploadController extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        return view('uploadForm', ['errors' => []]);
    }

    public function upload()
    {
        $validationRule = [
            'userfile' => [
                'label' => 'PDF File',
                'rules' => [
                    'uploaded[userfile]',
                    'mime_in[userfile,application/pdf]',
                    'max_size[userfile,2048]', #kB

                ],
            ],
        ];
        if (! $this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];
            return $this->returnView('uploadForm', $data);
        }

        $img = $this->request->getFile('userfile');

        if (! $img->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $img->store('uploads');
            $data = ['uploaded_fileinfo' => new File($filepath)];
            return $this->returnView('uploadSuccess', $data);
        }

        $data = ['errors' => 'The file has already been moved.'];

        return $this->returnView('uploadForm', $data);
    }

    public function returnView($view, $data){
        echo view('header');
        echo view($view, $data);
        echo view('footer');
    }
}