<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students') }}
        </h2>
    </x-slot>

        @if(session()->has('success_message'))
            <div class="alert alert-primary">
            {{ session()->get('success_message') }}
            </div>
        @endif
        @if(session()->has('error_message'))
            <div class="alert alert-danger">
            {{ session()->get('error_message') }}
            </div>
        @endif
        <div class="py-12">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">{{(__('All student '))}}
                                <span class="badge badge-danger">{{$students->count()}}</span>
                                 <div class="action-button float-right">
                                    <a href="{{route('student.create')}}" class="btn btn-sm btn-dark"><i class="fa fa-plus">{{__('New')}}</i></a>
                                </div>
                            </div>
                                    <table class="table table-striped">
                                    <thead>
                                        <tr>
                                        <th scope="col">{{__('Sl.')}}</th>
                                        <th scope="col">{{__('Name')}}</th>
                                        <th scope="col">{{__('Phone')}}</th>
                                        <th scope="col">{{__('Email')}}</th>
                                        <th scope="col">{{__('Subject')}}</th>
                                        <th scope="col">{{__('Teacher')}}</th>
                                        <th scope="col">{{(__('Image'))}}</th>
                                        <th scope="col">{{(__('Created At'))}}</th>
                                        <th scope="col">{{(__('Action'))}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                        <tr>
                                            <th scope="row"> {{ $students->firstItem()+$loop->index }}</th>
                                            <td>{{$student->first_name}} {{$student->last_name}}</td>
                                            <td>{{$student->phone}}</td>
                                            <td>{{$student->email}}</td>
                                            <td>{{$student->subject}}</td>
                                            <td>{{$student->teacher->first_name}} {{$student->teacher->last_name}}</td>
                                            <td><img src="{{asset($student->image)}}" style="width: 50px%;height:50px"></td>
                                            <td>{{$student->created}}</td>
                                            <td>
                                              <form method="POST" action="{{route('student.destroy',$student->id)}}" accept-charset="UTF-8">
                                                @method('DELETE')
                                                @csrf
                                               <a href="{{route('student.edit',$student->id)}}" class="btn btn-sm btn-info">{{('Edit')}}</a>
                                               <a href="{{route('student.show',$student->id)}}')" class="btn btn-sm btn-warning">{{__('Show')}}</a>
                                               <button href="{{route('student.show',$student->id)}}')" onclick="return confirm(&quot;Are you sure?&quot;)" class="btn btn-sm btn-danger">{{__('Delete')}}</button>

                                               </form>
                                          </td>
                                        </tr >

                                        @endforeach
                                    </tbody>
                                </table>
                                <div>
                                {{$students->links()}} </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
