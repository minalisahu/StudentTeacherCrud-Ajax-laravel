<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Record') }}:: {{$teacher->first_name}} {{$teacher->last_name}}
        </h2>
    </x-slot>



<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="action-button float-right">
                        <a href="{{route('teacher.list')}}" class="btn btn-sm btn-dark"><i class="fa fa-list">{{__('List')}}</i></a>
                    </div>
                </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-hover">
                            <tbody>
                            <tr>
                            <th class="table-success">{{__('First Name')}}</th>
                            <td>{{ $teacher->first_name }}</td>
                            </tr>
                            <tr>
                                <th class="table-success">{{__('Last Name')}}</th>
                                <td>{{ $teacher->last_name }}</td>
                            </tr>
                            <tr>
                                <th class="table-success">{{__('Description')}}</th>
                                <td>{{$teacher->description}}</td>
                            </tr>
                            <tr>
                                <th class="table-success">{{__('Email')}}</th>
                                <td>{{ $teacher->email}} </td>
                            </tr>
                            <tr>
                                <th class="table-success">{{__('Phone')}}</th>
                                <td>{{ $teacher->phone }}</td>
                            </tr>
                            <tr>
                                <th class="table-success">{{__('Subject')}}</th>
                                <td>{{ $teacher->subject }}</td>
                            </tr>
                              <tr>
                                <th class="table-success">{{__('Students')}}</th>
                                <td>
                                    @foreach ($teacher->student as $student)
                                       {{$student->first_name }}  {{$student->last_name }}
                                       @break($loop->last)
                                       <span>,</span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th class="table-success">{{__('Image')}}</th>
                                <td><img src="{{asset($teacher->image)}}" style="width: 100px%;height:100px"></td>
                            </tr>
                              <tr>
                                <th class="table-success">{{__('Created At')}}</th>
                                <td>{{ $teacher->created }}</td>
                            </tr>
                              <tr>
                                <th class="table-success">{{__('Modified At')}}</th>
                                <td>{{ $teacher->modified }}</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
              </div>
        </div>
    </div>
</div>

</x-app-layout>
