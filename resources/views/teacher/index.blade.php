<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teachers') }}
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
                            <div class="card-header">{{(__('All Teacher '))}}
                                <span class="badge badge-danger">{{$teachers->count()}}</span>
                                 <div class="action-button float-right">
                                    <a href="{{route('teacher.create')}}" class="btn btn-sm btn-dark"><i class="fa fa-plus">{{__('New')}}</i></a>
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
                                        <th scope="col">{{(__('Image'))}}</th>
                                        <th scope="col">{{(__('Created At'))}}</th>
                                        <th scope="col">{{(__('Action'))}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($teachers as $teacher)
                                        <tr>
                                            <th scope="row"> {{ $teachers->firstItem()+$loop->index }}</th>
                                            <td>{{$teacher->first_name}} {{$teacher->last_name}}</td>
                                            <td>{{$teacher->phone}}</td>
                                            <td>{{$teacher->email}}</td>
                                            <td>{{$teacher->subject}}</td>
                                            <td><img src="{{asset($teacher->image)}}" style="width: 50px%;height:50px"></td>
                                            <td>{{$teacher->created}}</td>
                                            <td>
                                              <form method="POST" action="{{route('teacher.destroy',$teacher->id)}}" accept-charset="UTF-8">
                                                @method('DELETE')
                                                @csrf
                                                <a href="{{route('teacher.edit',$teacher->id)}}" class="btn btn-sm btn-info">{{('Edit')}}</a>
                                                <a href="{{route('teacher.show',$teacher->id)}}')" class="btn btn-sm btn-warning">{{__('Show')}}</a>
                                                <button href="{{route('teacher.show',$teacher->id)}}')" onclick="return confirm(&quot;Are you sure?&quot;)" class="btn btn-sm btn-danger">{{__('Delete')}}</button>
                                               </form>
                                          </td>
                                        </tr >

                                        @endforeach
                                    </tbody>
                                </table>
                                <div> {{$teachers->links()}} </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
