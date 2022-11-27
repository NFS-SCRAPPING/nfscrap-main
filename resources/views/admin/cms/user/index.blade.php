@extends('template.content')
@section('content')

    <div class="row">
        <div class="col-sm-12">
            
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">{{$title}}</h4>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($data as $key)
                          <tr>
                            <td>{{$key->name}}</td>
                            <td>{{$key->email}}</td>
                            <td>{{$key->phone}}</td>
                            <td>{{$key->status}}</td>
                            <td>
                              <a href="{{url('admin/users/show/'.$key->id)}}" class="btn btn-sm btn-primary">detail</a>
                              <a href="{{url('admin/users/edit/'.$key->id)}}" class="btn btn-sm btn-warning">edit</a>
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