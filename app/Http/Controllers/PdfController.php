<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function invoice() 
    {
        $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "2222";
        //$view =  view('pdf.invoice', compact('data', 'date', 'invoice'));
        //$pdf = \App::make('dompdf.wrapper');
        //$pdf->loadHTML($view);
        //$pdf = \PDF::loadView('pdf.invoice', compact('data', 'date', 'invoice'));
        //return $pdf->stream('invoice.pdf');
        $view = view('pdf.invoice', compact('data', 'date', 'invoice'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice.pdf');
        //var_dump($pdf);



        $miNombre='http://enlawebdekaaf.blogspot.com/';
 
        $html = '<html><body>'
             . '<p>Blog: '.$miNombre.'</p>'
             . '</body></html>';
 
        return PDF::load($html, 'A4', 'portrait')->show();
 
        //return View::make('index');
    }

    public function getData() 
    {
        $data =  [
            'quantity'      => '1' ,
            'description'   => 'some ramdom text',
            'price'   => '500',
            'total'     => '500'
        ];
        return $data;
    }
}
