@extends('back-end.layouts.app')

@section('content')
    <h1>{{ \Auth::user()->name }}</h1>


    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card text-white  mb-3" style="color:whitesmoke !important;background-color:rgb(27, 149, 167);max-width: 18rem;">
                    <div class="card-body">
                      <h5 class="text-white card-title text-center">عدد مستخدمي النظام</h5>
                      <h1 class=" text-white text-center mt-3"><span>{{ $userCount }}</span></h1>
                    </div>
                  </div>
              </div>


              <div class="col-lg-4">
                <div class="card text-white  mb-3" style="color:whitesmoke !important;background-color:rgb(110, 39, 141);max-width: 18rem;">
                    <div class="card-body">
                      <h5 class="text-white card-title text-center">الوثائق المرفوعه في النظام</h5>
                      <h1 class=" text-white text-center mt-3">1112</h1>
                    </div>
                  </div>
              </div>

    </div>






@stop