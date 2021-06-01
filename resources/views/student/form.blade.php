<div class="form-row">
    <div class="col-md-12">
        <div class="form-row ">
        <div class="form-group col-md-4">
                <label for="first_name" class='required-label'>{{__('First Name')}}</label>
                <input type="text" name="first_name" id="first_name" class="form-control  @error('first_name') is-invalid @enderror" value="{{ old('first_name', optional($student)->first_name) }}" placeholder="Enter first name here" >
                @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="last_name" class='required-label'>{{__('Last Name')}}</label>
                <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name', optional($student)->last_name) }}" placeholder="Enter last name here">
                @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
           <div class="form-group col-md-4">
                <label for="email" class='required-label'>{{__('Email')}}</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', optional($student)->email) }}" placeholder="Enter email here">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-row ">
            <div class="form-group col-md-4">
                <label for="phone" class='required-label'>{{__('Phone')}}</label>
                <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone', optional($student)->phone)}}" placeholder="Enter phone here">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
             <div class="form-group col-md-4">
                <label for="subject" class='required-label'>{{__('Subject')}}</label>
                <input type="text" name="subject" id="subject" class="form-control @error('subject') is-invalid @enderror" value="{{old('subject',optional($student)->subject)}}" placeholder="Enter Subject Here">
                @error('subject')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
             </div>

            <div class="form-group col-md-4">
                <label for="teacher_id" class='required-label'>{{__('Teacher')}}</label>
                    <select name="teacher_id" class="form-control @error('teacher_id') is-invalid @enderror">
                        <option>{{__('Please Select')}}</option>
                        @if($student)
                          @foreach ($teachers as $teacher)
                             <option value="{{$teacher->id}}" {{$student->teacher_id == $teacher->id ?"selected":""}} >{{$teacher->first_name}} {{$teacher->last_name}} - {{$teacher->subject}}</option>
                          @endforeach
                          @else{
                            @foreach ($teachers as $teacher)
                                <option value="{{$teacher->id}}" >{{$teacher->first_name}} {{$teacher->last_name}} - {{$teacher->subject}}</option>
                            @endforeach
                         @endif
                    </select>
                 @error('teacher_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-row ">
             <div class="form-group col-md-4">
                <label for="image" class='required-label'>{{__('Image')}}</label>
                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" value="" placeholder="Enter image here">
                    @if($student)
                    <img src="{{asset($student->image)}}" style="width: 100px%;height:100px">
                    @endif
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>
