@extends('template.content')
@section('content')

    {{-- style collaps tabel --}}
    @push('css')
      <style>
          tr.hide-table-padding td {
            padding: 0;
          }

          .expand-button {
            position: relative;
          }

          .accordion-toggle .expand-button:after
          {
            position: absolute;
            left:.75rem;
            top: 50%;
            transform: translate(0, -50%);
            content: '-';
          }
          .accordion-toggle.collapsed .expand-button:after
          {
            content: '+';
          }
      </style>
    @endpush  

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
                            <th scope="col">#</th>
                            <th>sorter</th>
                            <th>name menu</th>
                            <th>parent menu</th>
                            <th>icon</th>
                            <th>cms modules</th>
                            <th>url / link</th>
                            <th>main folder view</th>
                            <th>sub folder view</th>
                            <th>status</th>
                            <th>Menu Access</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($cms_menus as $key)
                          <tr class="accordion-toggle collapsed" id="accordion{{$key->id}}" data-toggle="collapse" data-parent="#accordion{{$key->id}}" href="#collapse{{$key->id}}">
                            <td class="expand-button"></td>
                            <td>{{$key->sorter}}</td>
                            <td>{{$key->name}}</td>
                            <td>{{$key->parent_name}}</td>
                            <td><i class="mdi {{$key->icon}}"></i></td>
                            <td>{{$key->cms_modules_name}}</td>
                            <td>{{$key->url}}</td>
                            <td>{{$key->main_folder}}</td>
                            <td>{{$key->sub_folder}}</td>
                            <td>{{$key->status}}</td>
                            <td>
                              <a href="{{url('admin/menus/action/'.$key->id)}}" class="btn btn-sm btn-primary">menu setting</a>
                            </td>
                            <td>
                              <a href="{{url('admin/menus/show/'.$key->id)}}" class="btn btn-sm btn-primary">detail</a>
                              <a href="{{url('admin/menus/edit/'.$key->id)}}" class="btn btn-sm btn-warning">edit</a>
                              <a href="{{url('admin/menus/destroy/'.$key->id)}}" class="btn btn-sm btn-danger">delete</a>
                            </td>

                          </tr>
                              <tr class="hide-table-padding">
                                <td></td>
                                <td colspan="11">
                                    <div id="collapse{{$key->id}}" class="collapse in p-3">
                                      <div class="row">
                                        <div class="col-1">sorter</div>
                                        <div class="col-2">name</div>
                                        <div class="col-2">cms modules name</div>
                                        <div class="col-1">icon</div>
                                        <div class="col-1">url</div>
                                        <div class="col-2">
                                          menu access
                                        </div>
                                        <div class="col-3">
                                          action
                                        </div>
                                      </div>
                                    </div>
                                </td>
                              </tr>
                              @foreach(Nfs::submenu($key->id) as $sub)
                              <tr class="hide-table-padding">
                                <td></td>
                                <td colspan="11">
                                    <div id="collapse{{$key->id}}" class="collapse in p-3">
                                      <div class="row">
                                        <div class="col-1">{{$sub->sorter}}</div>
                                        <div class="col-2">{{$sub->name}}</div>
                                        <div class="col-2">{{$key->name}}</div>
                                        <div class="col-1"><i class="mdi {{$sub->icon}}"></i></div>
                                        <div class="col-1">{{$sub->url}}</div>
                                        <div class="col-2">
                                          <a href="{{url('admin/menus/action/'.$sub->id)}}" class="btn btn-sm btn-primary">menu setting</a>
                                        </div>
                                        <div class="col-3">
                                            <a href="{{url('admin/menus/show/'.$sub->id)}}" class="btn btn-sm btn-primary">detail</a>
                                            <a href="{{url('admin/menus/edit/'.$sub->id)}}" class="btn btn-sm btn-warning">edit</a>
                                            <a href="{{url('admin/menus/destroy/'.$sub->id)}}" class="btn btn-sm btn-danger">delete</a>
                                        </div>
                                      </div>
                                    </div>
                                </td>
                          </tr>
                              @endforeach


                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

        </div>
    </div>

@endsection