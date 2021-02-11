<?php
class FrontPages extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
        $data = [
            'title' => 'ScandiWeb',
            'description' => 'Web Developer task for ScandiWeb',
        ];

        $this->view('frontPage/index', $data);
    }

}
