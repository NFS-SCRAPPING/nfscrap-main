@extends('template.content')
@section('content')


    <div class="row">
      <div class="col-sm-12 mb-10">
        <a href="{{url('admin/modules/create')}}" class="btn btn-success btn-fw">add data</a>
      </div>

        <div class="col-sm-12">
            
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">{{$title}}</h4>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>name</th>
                            <th>icon</th>
                            <th>middleware</th>
                            <th>url</th>
                            <th>controller</th>
                            <th>model</th>
                            <th>table</th>
                            <th>is_active</th>
                            <th>folder_controller</th>
                            <th>folder_model</th>
                            <th>folder_file</th>
                            <th>Settings ID</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($cms_modules as $key)
                          <tr>
                            <td>{{$key->name}}</td>
                            <td><i class="mdi {{$key->icon}}"></i></td>
                            <td>{{$key->middleware}}</td>
                            <td>{{$key->url}}</td>
                            <td>{{$key->controller}}</td>
                            <td>{{$key->model}}</td>
                            <td>{{$key->table}}</td>
                            <td>{{$key->is_active}}</td>
                            <td>{{$key->folder_controller}}</td>
                            <td>{{$key->folder_model}}</td>
                            <td>{{$key->folder_file}}</td>
                            <td>{{$key->cms_settings_name}}</td>
                            <td>
                              <a href="{{url('admin/modules/show/'.$key->id)}}" class="btn btn-sm btn-primary">detail</a>
                              <a href="{{url('admin/modules/edit/'.$key->id)}}" class="btn btn-sm btn-warning">edit</a>
                              <a href="{{url('admin/modules/destroy/'.$key->id)}}" class="btn btn-sm btn-danger">delete</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

        </div>
    </div>

@endsection