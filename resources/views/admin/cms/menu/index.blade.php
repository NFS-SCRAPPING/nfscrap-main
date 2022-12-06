@extends('template.content')
@section('content')


    <div class="row">
      <div class="col-sm-12 mb-10">
        <a href="{{url('admin/menus/create')}}" class="btn btn-success btn-fw">add data</a>
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
                            <th>sorter</th>
                            <th>name menu</th>
                            <th>parent menu</th>
                            <th>icon</th>
                            <th>cms modules</th>
                            <th>url / link</th>
                            <th>main folder view</th>
                            <th>sub folder view</th>
                            <th>is active</th>
                            <th>Menu Access</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($cms_menus as $key)
                          <tr>
                            <td>{{$key->sorter}}</td>
                            <td>{{$key->name}}</td>
                            <td>{{$key->parent_name}}</td>
                            <td><i class="mdi {{$key->icon}}"></i></td>
                            <td>{{$key->cms_modules_name}}</td>
                            <td>{{$key->url}}</td>
                            <td>{{$key->folder}}</td>
                            <td>{{$key->view}}</td>
                            <td>{{$key->is_active}}</td>
                            <td>
                              <a href="{{url('admin/menus/action/'.$key->id)}}" class="btn btn-sm btn-primary">menu setting</a>
                            </td>
                            <td>
                              <a href="{{url('admin/menus/show/'.$key->id)}}" class="btn btn-sm btn-primary">detail</a>
                              <a href="{{url('admin/menus/edit/'.$key->id)}}" class="btn btn-sm btn-warning">edit</a>
                              <a href="{{url('admin/menus/destroy/'.$key->id)}}" class="btn btn-sm btn-danger">delete</a>
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