@extends('admin.cms.menu.subaction')
@section('menus_action')

<div class="row">
    <div class="col-sm-12 mb-10">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">add data</button>
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
                      <th class="head-white">menu</th>
                      <th class="head-white">action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($cms_menus_detail as $key)
                    <tr>
                        <td>{{$key->cms_menus_name}}</td>
                        <td>
                          <a href="{{url('admin/menu_detail/destroy/'.$key->id)}}" class="btn btn-sm btn-danger">delete</a>
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

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="add" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{$title}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{url('admin/menu_access/store')}}" method="POST">
            @csrf
            <div class="modal-body">
                <input type="hidden" value="{{$row->id}}" name="cms_menus_id">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
</div>

@endsection