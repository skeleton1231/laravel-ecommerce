@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <!--Bordered table-->
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Sections</h4>
              <div class="table-responsive pt-3">
                <table id="sections" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>
                        ID
                      </th>
                      <th>
                        Name
                      </th>
                      <th>
                        Status
                      </th>
                      <th>
                        Actions
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($sections as $section)
                    <tr>
                          <td>
                          {{$section['id']}}
                          </td>
                          <td>
                            {{$section['name']}}
                          </td>
                          <td>
                            @if($section['status'] == 1)
                                <a class="updateSectionStatus"
                                id="section-{{$section['id']}}"
                                section_id="{{$section['id']}}" href="javascript:void(0)">
                                    <i style="font-size:25px" class="mdi mdi-bookmark-check" status="Active"></i>
                                </a>
                            @else
                                <a class="updateSectionStatus"
                                id="section-{{$section['id']}}"
                                section_id="{{$section['id']}}" href="javascript:void(0)">
                                <i style="font-size:25px" class="mdi mdi-bookmark-outline" status="Inactive"></i>
                                </a>
                            @endif
                          </td>
                          <td>
                                <a href=" {{ url('admin/add-edit-section/' . $section['id']) }} ">
                                    <i style="font-size:25px" class="mdi mdi-pencil-box"></i>
                                </a>
                                <a href=" {{ url('admin/delete-section/' . $section['id']) }} ">
                                    <i style="font-size:25px" class="mdi mdi-file-excel-box"></i>
                                </a>
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
    </div>
    <!-- partial:partials/_footer.html -->
    @include("admin.layout.footer")
    <!-- partial -->
</div>
@endsection
