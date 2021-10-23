<?php

namespace App\Controllers;
use App\Models\ModelUser;
use App\Models\CategoryModel;

class Home extends BaseController
{
    public function index()
    {
        $modelUser = new ModelUser();

		$data['user_data'] = $modelUser->orderBy('id', 'DESC')->paginate(3);
		$data['pagination_link'] = $modelUser->pager;

		return view('recipe_view', $data);
    }

    public function appitizer(){
        $modelUser = new ModelUser();

		$data['user_data'] = $modelUser->where('category', 'Appitizer')->paginate(3);
		$data['pagination_link'] = $modelUser->pager;

		return view('recipe_view', $data);
    }

    public function soup(){
        $modelUser = new ModelUser();

		$data['user_data'] = $modelUser->where('category', 'Soup')->paginate(3);
		$data['pagination_link'] = $modelUser->pager;

		return view('recipe_view', $data);
    }

    public function main(){
        $modelUser = new ModelUser();

		$data['user_data'] = $modelUser->where('category', 'Main Dish')->paginate(3);
		$data['pagination_link'] = $modelUser->pager;

		return view('recipe_view', $data);
    }

    
    public function dessert(){
        $modelUser = new ModelUser();

		$data['user_data'] = $modelUser->where('category', 'dessert')->paginate(3);
		$data['pagination_link'] = $modelUser->pager;

		return view('recipe_view', $data);
    }


    function add()
	{
        $categoryModel = new CategoryModel();
        $data['category'] = $categoryModel->orderBy('id', 'DESC')->paginate(4);
		return view('add_data',$data);
	}

    function display(){
        $categoryModel = new CategoryModel();
        $data['category'] = $categoryModel->orderBy('id', 'DESC')->paginate(1);
        echo view('recipe_view', $data);
    }

    function add_validation()
	{
		helper(['form', 'url']);

		$error = $this->validate([
			//'name'	=>	'required|min_length[3]',
			//'email'	=>	'required|valid_email',
			'category'=>	'required',
            'recipeName'=>	'required',
            'recipeDirection'=>	'required',
            'recipeTime'=>	'required',
            'recipeIngridients'=>	'required',
            'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[file,4096]',
            ],
		]);

		if(!$error)
		{
			echo view('add_data', [
				'error' 	=> $this->validator
			]);
		}
		else
		{
			$modelUser = new ModelUser();
            $imageName = "";

            if($file = $this->request->getFile('file')) {
                if ($file->isValid() && ! $file->hasMoved()) {
                   // Get file name and extension
                   $name = $file->getName();
                   $ext = $file->getClientExtension();
    
                   // Get random file name
                   $newName = $file->getClientName(); 
                   $imageName = $newName;
    
                   // Store file in public/uploads/ folder
                   $file->move('../public/uploads', $newName);
    
                   // File path to display preview
                   $filepath = base_url()."/uploads/".$newName;
    
                   // Set Session
                   session()->setFlashdata('message', 'Uploaded Successfully!');
                   session()->setFlashdata('alert-class', 'alert-success');
                   session()->setFlashdata('filepath', $filepath);
                   session()->setFlashdata('extension', $ext);
    
                }else{
                   // Set Session
                   session()->setFlashdata('message', 'File not uploaded.');
                   session()->setFlashdata('alert-class', 'alert-danger');
    
                }
             }

			$modelUser->save([
                'recipeImg' =>  $imageName,
				'category'	=>	$this->request->getVar('category'),
				'recipeName'	=>	$this->request->getVar('recipeName'),
				'recipeDirection'=>	$this->request->getVar('recipeDirection'),
                'recipeTime'=>	$this->request->getVar('recipeTime'),
                'recipeIngridients'=>	$this->request->getVar('recipeIngridients'),
			]);

			$session = \Config\Services::session();

			$session->setFlashdata('success', 'New Recipe Added');

			return $this->response->redirect(site_url('/home'));
		}
	}

    function fetch_single_data($id = null)
    {
        $modelUser = new ModelUser();

        $data['user_data'] = $modelUser->where('id', $id)->first();
        return view('edit_data', $data);
    }

    function readmore($id = null){
        $modelUser = new ModelUser();

        $data['user_data'] = $modelUser->where('id', $id)->first();
        return view('readmore', $data);
    }

    function edit_validation()
    {
    	helper(['form', 'url']);
        
        $error = $this->validate([
            'category'=>	'required',
            'recipeName'=>	'required',
            'recipeDirection'=>	'required',
            'recipeTime'=>	'required',
            'recipeIngridients'=>	'required'
        ]);

        $modelUser = new ModelUser();

        $id = $this->request->getVar('id');

        if(!$error)
        {
        	$data['user_data'] = $modelUser->where('id', $id)->first();
        	$data['error'] = $this->validator;
        	echo view('edit_data', $data);
        } 
        else 
        {
	        $data = [
                'category'	=>	$this->request->getVar('category'),
				'recipeName'	=>	$this->request->getVar('recipeName'),
				'recipeDirection'=>	$this->request->getVar('recipeDirection'),
                'recipeTime'=>	$this->request->getVar('recipeTime'),
                'recipeIngridients'=>	$this->request->getVar('recipeIngridients')
	        ];

        	$modelUser->update($id, $data);

        	$session = \Config\Services::session();

            $session->setFlashdata('success', 'User Data Updated');

        	return $this->response->redirect(site_url('/home'));
        }
    }

    function delete($id)
    {
        $modelUser = new ModelUser();

        $modelUser->where('id', $id)->delete($id);

        $session = \Config\Services::session();

        $session->setFlashdata('success', 'User Data Deleted');

        return $this->response->redirect(site_url('/home'));
    }


}

?>