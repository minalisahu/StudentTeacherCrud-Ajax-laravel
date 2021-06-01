<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Record') }}:: {{$student->first_name}} {{$student->last_name}}
        </h2>
    </x-slot>



<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="action-button float-right">
                        <a href="{{route('student.list')}}" class="btn btn-sm btn-dark"><i class="fa fa-list">{{__('List')}}</i></a>
                    </div>
                </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-hover">
                            <tbody>
                            <tr>
                            <th class="table-success">{{__('First Name')}}</th>
                            <td>{{ $student->first_name }}</td>
                            </tr>
                            <tr>
                                <th class="table-success">{{__('Last Name')}}</th>
                                <td>{{ $student->last_name }}</td>
                            </tr>
                            <tr>
                                <th class="table-success">{{__('Teacher')}}</th>
                                <td>{{$student->teacher->first_name}} {{$student->teacher->last_name}} -{{$student->teacher->subject}}</td>
                            </tr>
                            <tr>
                                <th class="table-success">{{__('Email')}}</th>
                                <td>{{ $student->email}} </td>
                            </tr>
                            <tr>
                                <th class="table-success">{{__('Phone')}}</th>
                                <td>{{ $student->phone }}</td>
                            </tr>
                            <tr>
                                <th class="table-success">{{__('Subject')}}</th>
                                <td>{{ $student->subject }}</td>
                            </tr>
                            <tr>
                                <th class="table-success">{{__('Image')}}</th>
                                <td><img src="{{asset($student->image)}}" style="width: 100px%;height:100px"></td>
                            </tr>
                            <tr>
                                <th class="table-success">{{__('Created At')}}</th>
                                <td>{{ $student->created }}</td>
                            </tr>
                              <tr>
                                <th class="table-success">{{__('Modified At')}}</th>
                                <td>{{ $student->modified }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
              </div>
        </div>
    </div>
</div>

</x-app-layout>
