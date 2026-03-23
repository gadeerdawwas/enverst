<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
  $services = config('services_catalog');
  return view('front.services.index', compact('services'));
}
 public function show(string $slug)
  {
    $services = config('services_catalog');

    abort_unless(isset($services[$slug]), 404);

    $service = $services[$slug];

    return view('front.services.show', compact('service'));
  }
   
}
