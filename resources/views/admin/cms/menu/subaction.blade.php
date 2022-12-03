@extends('template.content')
@section('content')

<div class="mb-20">
    <a href="{{url('admin/menus')}}" class="btn btn-link btn-rounded btn-fw"><< back to {{$title}}</a>
</div>

<div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card corona-gradient-card">
        <div class="card-body py-0 px-0 px-sm-3">
          <div class="row align-items-center">
            <div class="col-4 col-sm-3 col-xl-2">
              <img src="{{url('assets/images/dashboard/Group126@2x.png')}}" class="gradient-corona-img img-fluid" alt="">
            </div>
            <div class="col-5 col-sm-7 col-xl-8 p-0">
              <h4 class="mb-1 mb-sm-0">{{$title}}</h4>
              <p class="mb-0 font-weight-normal d-none d-sm-block">{{$description}}</p>
              <ul>
                <li>{{$row->name}} <small>(name)</small></li>
                <li>{{$row->folder}} <small>(folder)</small></li>
                <li>{{$row->cms_modules_name}} <small>(module)</small></li>
                <li>{{$row->parent_name}} <small>(submenu)</small></li>
                <li>{{$row->is_active}} <small>(status)</small></li>
                <li>{{$row->url}} <small>(url)</small></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            <div class="template-demo">
              <a href="" class="btn btn-primary btn-rounded btn-fw">Menus Access</a>
              <a href="" class="btn btn-secondary btn-rounded btn-fw">Blade View</a>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection