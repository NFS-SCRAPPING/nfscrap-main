@extends('template.content')
@section('content')

    <div class="mb-20">
      <a href="{{url('admin/role')}}" class="btn btn-link btn-rounded btn-fw"><i class="mdi mdi-arrow-left-bold-circle-outline">&nbsp;back to menu role</i></a>
    </div>

    <div class="row">

        <div class="col-sm-12">
            
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">{{$title}} <span style="color:chartreuse">({{$row->name}})</span></h4>
                    <form action="{{url('admin/role_access/store')}}" method="POST">
                      @csrf
                      <input type="hidden" name="cms_role_id" value="{{$row->id}}">
                      <table class="table table-borderless">
                        <thead>
                          <tr>
                            <th>Menu</th>
                            <th>is view</th>
                            <th>is create</th>
                            <th>is edit</th>
                            <th>is detail</th>
                            <th>is delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($menu as $key)
                          <tr>
                            <td>
                              {{$key->name}}
                              <input type="hidden" name="cms_menus_id[]" value="{{$key->id}}">
                            </td>
                            <td><input type="checkbox" name="is_view[]" class="form-check-input"></td>
                            <td><input type="checkbox" name="is_create[]" class="form-check-input"></td>
                            <td><input type="checkbox" name="is_edit[]" class="form-check-input"></td>
                            <td><input type="checkbox" name="is_detail[]" class="form-check-input"></td>
                            <td><input type="checkbox" name="is_delete[]" class="form-check-input"></td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <hr>
                      <div class="mt-50">
                        <button type="submit" class="btn btn-primary mr-2"><i class="mdi mdi-content-save"></i>&nbsp;save changes</button>
                      </div>
                  </form>
                    
                  </div>
                </div>

        </div>
    </div>

@endsection