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
                            <th>ipaddress</th>
                            <th>useragent</th>
                            <th>description</th>
                            <th>details</th>
                            <th>users</th>
                            <th>url</th>
                            <th>created_at</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($cms_logs as $key)
                          <tr>
                            <td>{{$key->ipaddress}}</td>
                            <td>{{$key->useragent}}</td>
                            <td>{{$key->description}}</td>
                            <td>{{$key->details}}</td>
                            <td>{{$key->users_name}}</td>
                            <td>{{$key->url}}</td>
                            <td>{{$key->created_at}}</td>
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