<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Store;
use XMLWriter;
class OrderController extends Controller
{
    public function createOrder()
    {
        return view('laravel-authentication-acl::admin.user.place-order');
    }

    public function nearestStores(Request $request)
    {
        
       $lat = $request->input('lat');
       $lng = $request->input('lng');

        //return
         $query= Store::whereBetween('lat', [($lat - (20*0.018)),($lat + (20*0.018))])
                    ->whereBetween('lng', [($lng - (20*0.018)),($lng + (20*0.018))])
                    ->get();
                    $xml = new XMLWriter();
                    $xml->openMemory();
                    $xml->startDocument();
                    $xml->startElement('markers');
                    foreach($query as $marker) {
                        $xml->startElement('marker');
                        $xml->writeAttribute('id', $marker->id);
                        $xml->writeAttribute('name', $marker->name);
                        $xml->writeAttribute('address', $marker->address);
                       // $xml->writeAttribute('distance', 30);
                        $xml->writeAttribute('lat', $marker->lat);
                        $xml->writeAttribute('lng', $marker->lng);
                        $xml->endElement();
                    }
                    $xml->endElement();
                    $xml->endDocument();
                
                    $content = $xml->outputMemory();
                    $xml = null;
                
                    return response($content)->header('Content-Type', 'text/xml');
                
                }         

    
}