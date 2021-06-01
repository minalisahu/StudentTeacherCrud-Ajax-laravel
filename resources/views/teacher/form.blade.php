<div class="form-row">
    <div class="col-md-12">
        <div class="form-row ">
        <div class="form-group col-md-4">
                <label for="first_name" class='required-label'>{{__('First Name')}}</label>
                <input type="text" name="first_name" id="first_name" class="form-control  @error('first_name') is-invalid @enderror" value="{{ old('first_name', optional($teacher)->first_name) }}" placeholder="Enter first name here" >
                @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="last_name" class='required-label'>{{__('Last Name')}}</label>
                <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name', optional($teacher)->last_name) }}" placeholder="Enter last name here">
                @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
           <div class="form-group col-md-4">
                <label for="email" class='required-label'>{{__('Email')}}</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', optional($teacher)->email) }}" placeholder="Enter email here">
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
                <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone', optional($teacher)->phone)}}" placeholder="Enter phone here">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
             <div class="form-group col-md-4">
                <label for="subject" class='required-label'>{{__('Subject')}}</label>
                <input type="text" name="subject" id="subject" class="form-control @error('subject') is-invalid @enderror" value="{{old('subject',optional($teacher)->subject)}}" placeholder="Enter Subject Here">
                @error('subject')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
             </div>
            <div class="form-group col-md-4">
                <label for="description" class='required-label'>{{__('Description')}}</label>
                <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{old('description',optional($teacher)->description)}}" placeholder="Enter description here">
                @error('description')
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
                    @if($teacher)
                    <img src="{{asset($teacher->image)}}" style="width: 100px%;height:100px">
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
