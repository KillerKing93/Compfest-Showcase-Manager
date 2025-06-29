<?php
namespace App\Controllers;

use App\Models\ProjectModel;
use CodeIgniter\Controller;

class Admin extends Controller
{
    public function __construct()
    {
        // Check if user is logged in
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth/login');
        }
    }
    
    public function dashboard()
    {
        $model = new ProjectModel();
        $data['total_projects'] = $model->countAll();
        $data['recent_projects'] = $model->orderBy('created_at', 'DESC')->limit(5)->find();
        
        return view('admin/dashboard', $data);
    }
    
    public function projects()
    {
        $model = new ProjectModel();
        $data['projects'] = $model->orderBy('created_at', 'DESC')->findAll();
        
        return view('admin/projects', $data);
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
                
                session()->setFlashdata('success', 'Project berhasil ditambahkan!');
                return redirect()->to('/admin/projects');
            }
            $data['validation'] = $this->validator;
        }
        
        return view('admin/create', isset($data) ? $data : []);
    }
    
    public function edit($id)
    {
        helper(['form']);
        $model = new ProjectModel();
        $data['project'] = $model->find($id);
        
        if (empty($data['project'])) {
            return redirect()->to('/admin/projects');
        }
        
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'name' => 'required|min_length[3]',
                'url' => 'required|valid_url',
            ];
            
            if ($this->validate($rules)) {
                $model->update($id, [
                    'name' => $this->request->getPost('name'),
                    'description' => $this->request->getPost('description'),
                    'url' => $this->request->getPost('url'),
                ]);
                
                session()->setFlashdata('success', 'Project berhasil diupdate!');
                return redirect()->to('/admin/projects');
            }
            $data['validation'] = $this->validator;
        }
        
        return view('admin/edit', $data);
    }
    
    public function delete($id)
    {
        $model = new ProjectModel();
        $model->delete($id);
        
        session()->setFlashdata('success', 'Project berhasil dihapus!');
        return redirect()->to('/admin/projects');
    }
} 