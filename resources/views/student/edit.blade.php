<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{__('Edit')}}::{{ $student->first_name }} {{ $student->last_name }}
        </h2>
    </x-slot>

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="action-button float-right">
                        <a href="{{route('student.list')}}" class="btn btn-sm btn-dark"><i class="fa fa-list">{{__('List')}}</i></a>
                        <a href="{{route('student.show',$student->id)}}" class="btn btn-sm btn-info"><i class="fa fa-list">{{__('Show')}}</i></a>
                        <a href="{{route('student.create')}}" class="btn btn-sm btn-warning"><i class="fa fa-list">{{__('Add')}}</i></a>

                    </div>
                </div>
                <form method="POST" action="{{route('student.update',$student->id)}}" enctype="multipart/form-data">
                    @method('PUT')
                    <div class="card-body">
                        @csrf
                        @include ('student.form',['student'=>$student,'teacherList'=>$teachers])
                    </div>
                    <div class="card-footer text-right p-2">
                        <button class="btn btn-primary">{{__('Update')}}</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>
</x-app-layout>
