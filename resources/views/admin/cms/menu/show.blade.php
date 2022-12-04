@extends('template.content')
@section('content')

    <div class="row">
        <div class="col-sm-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">{{$title}}</h4>
              <p class="card-description"> {{$subtitle}} </p>
              
              <div class="table-responsive">
                <table class="table table-borderless">
                    <tr>
                        <td>sorter</td>
                        <td>:</td>
                        <td>{{$row->sorter}}</td>
                    </tr>
                    <tr>
                        <td>name</td>
                        <td>:</td>
                        <td>{{$row->name}}</td>
                    </tr>
                    <tr>
                        <td>cms modules name</td>
                        <td>:</td>
                        <td>{{$row->cms_modules_name}}</td>
                    </tr>
                    <tr>
                        <td>parent name</td>
                        <td>:</td>
                        <td>{{$row->parent_name}}</td>
                    </tr>
                    <tr>
                        <td>icon</td>
                        <td>:</td>
                        <td><i class="mdi {{$row->icon}}"></i> {{$row->icon}}</td>
                    </tr>
                    <tr>
                        <td>url</td>
                        <td>:</td>
                        <td>{{$row->url}}</td>
                    </tr>
                    <tr>
                        <td>folder view</td>
                        <td>:</td>
                        <td>{{$row->folder}}</td>
                    </tr>
                    <tr>
                        <td>view</td>
                        <td>:</td>
                        <td>{{$row->view}}</td>
                    </tr>
                    <tr>
                        <td>is_active</td>
                        <td>:</td>
                        <td>{{$row->is_active}}</td>
                    </tr>
                </table>
              </div>

              <div class="mt-10">
                <a class="btn btn-success" href="{{url('admin/menus')}}"><i class="mdi mdi-arrow-left-thick"></i>&nbsp;Back</a>
              </div>

            </div>
          </div>
        </div>
    </div>


@endsection