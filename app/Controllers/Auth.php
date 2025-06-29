<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        helper(['form']);
        
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'username' => 'required|min_length[3]',
                'password' => 'required|min_length[6]',
            ];
            
            if ($this->validate($rules)) {
                $model = new UserModel();
                $user = $model->where('username', $this->request->getPost('username'))->first();
                
                if ($user && $model->verifyPassword($this->request->getPost('password'), $user['password'])) {
                    $session = session();
                    $session->set([
                        'user_id' => $user['id'],
                        'username' => $user['username'],
                        'role' => $user['role'],
                        'logged_in' => true
                    ]);
                    
                    return redirect()->to('/admin/dashboard');
                } else {
                    $data['error'] = 'Username atau password salah!';
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }
        
        return view('auth/login', isset($data) ? $data : []);
    }
    
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }
} 