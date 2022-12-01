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
                            <th>name</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($cms_menus as $key)
                          <tr>
                            <td>{{$key->name}}</td>
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