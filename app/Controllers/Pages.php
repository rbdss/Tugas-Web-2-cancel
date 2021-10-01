<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Gilang'
        ];
        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Me'
        ];
        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Cengkareng',
                    'kota' => 'Jakarta Barat'
                ],
                [
                    'tipe' => 'Kampus',
                    'alamat' => 'Meruya',
                    'kota' => 'Jakarta Barat'
                ]
            ]
        ];
        return view('pages/contact', $data);
    }
}
