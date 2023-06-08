<?php

namespace App\Controllers;
use App\Models\Offer;
use CodeIgniter\API\ResponseTrait;

class Home extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        helper(['form']);
        $data = [];

        return view('welcome_message');
    }

    public function store() {
        helper(['form']);
        $rules = [
            'title' => 'required',
            'coupon' => 'required|min_length[3]|is_unique[offers.coupon]',
            'expiry_date' => 'required'
        ];
          
        if($this->validate($rules)){
            $offerSave = new Offer();
            $data = [
                'title' => $this->request->getVar('title'),
                'coupon'  => $this->request->getVar('coupon'),
                'expiry_date'  => !empty($this->request->getVar('expiry_date')) ? $this->request->getVar('expiry_date') : NULL,
            ];
            $offerSave->save($data);

            $session = \Config\Services::session();
            $session->setFlashdata('success', 'Record save sucessfully');
            // echo $session->getFlashdata('success'); exit;
            return redirect()->to('/');
        }else{
            $data['validation'] = $this->validator;
            echo view('welcome_message', $data);
        } 
    }

    public function getOffers() {
        $results = new Offer();

        $data['offers'] = $results->where('expiry_date >= now()')->findAll();
        
        return $this->respond($data);
    }
}
