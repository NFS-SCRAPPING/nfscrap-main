@extends('template.content')
@section('content')

    <div class="row">
        
        <div class="col-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">{{$title}}</h4>
                <form class="form-sample" method="POST" action="{{url('admin/menus/update')}}" enctype="multipart/form-data">
                    @csrf
                  <p class="card-description"> {{$subtitle}} </p>
                  <input type="hidden" name="id" value="{{$row->id}}">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">{{Helper::uc('name')}}</label>
                        <div class="col-sm-9">
                          <input type="text" name="name" class="form-control" value="{{$row->name}}" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">{{Helper::uc('icon')}}</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="icon" value="{{$row->icon}}"  required>
                          <a href="https://pictogrammers.github.io/@mdi/font/2.0.46/" target="_blank">check icon klik here</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">{{Helper::uc('folder')}}</label>
                        <div class="col-sm-9">
                          <input type="text" name="folder" value="{{$row->folder}}" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">{{Helper::uc('url')}}</label>
                        <div class="col-sm-9">
                          <input type="text" name="url" value="{{$row->url}}" class="form-control" required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">{{Helper::uc('view blade')}}</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" value="{{$row->view}}" name="view" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">{{Helper::uc('sorter')}}</label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control" value="{{$row->sorter}}" name="sorter" required>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">

                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">{{Helper::uc('is active')}}</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="is_active" required>
                              <option value="{{$row->is_active}}" selected>{{$row->is_active}}</option>
                              <option>active</option>
                              <option>notactive</option>
                            </select>
                          </div>
                        </div>
                      </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Modules</label>
                            <div class="col-sm-9">
                                <select class="js-example-basic-single" name="cms_modules_id" style="width:100%">
                                <option value="{{$row->cms_modules_id}}" selected>{{$row->cms_modules_name}}</option>
                                @foreach($cms_modules as $modules)
                                    <option value="{{$modules->id}}">{{$modules->name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                    </div>

                  </div>

                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Parent Menu</label>
                            <div class="col-sm-9">
                                <select class="js-example-basic-single" name="parent_id" style="width:100%">
                                <option value="" selected> Optional sub menus</option>
                                @foreach($cms_menus as $menus)
                                    <option value="{{$menus->id}}">{{$menus->name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                    </div>
                  </div>

                  <div>
                    <a class="btn btn-success" href="{{url('admin/menus')}}"><i class="mdi mdi-arrow-left-thick"></i>&nbsp;Back</a>
                    <button type="submit" class="btn btn-primary mr-2"><i class="mdi mdi-content-save"></i>&nbsp;Submit</button>
                  </div>

                </form>
              </div>
            </div>
          </div>

    </div>


@endsection