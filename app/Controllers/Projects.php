<?php
namespace App\Controllers;

use App\Models\ProjectModel;
use CodeIgniter\Controller;

class Projects extends Controller
{
    public function index()
    {
        $model = new ProjectModel();
        $data['projects'] = $model->findAll();
        return view('projects/index', $data);
    }

    public function create()
    {
        helper(['form']);
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'name' => 'required|min_length[3]',
                'url' => 'required|valid_url',
            ];
            if ($this->validate($rules)) {
                $model = new ProjectModel();
                $model->save([
                    'name' => $this->request->getPost('name'),
                    'description' => $this->request->getPost('description'),
                    'url' => $this->request->getPost('url'),
                ]);
                return redirect()->to('/projects');
            }
            $data['validation'] = $this->validator;
        }
        return view('projects/create', isset($data) ? $data : []);
    }

    public function delete($id)
    {
        $model = new ProjectModel();
        $model->delete($id);
        return redirect()->to('/projects');
    }
} 