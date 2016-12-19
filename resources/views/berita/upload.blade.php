<h1>Upload a Photo </h1>


<hr/>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops! </strong> There were some problems with your input. <br> <br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }} </li>
            @endforeach

        </ul>
    </div>

@endif


<!-- image name Form Input -->

<!-- form field for file -->
<div class="form-group">
    {!! Form::label('image', 'Primary Image') !!}
    {!! Form::file('image', null, array('required', 'class'=>'form-control')) !!}
</div>

<!-- form field for file -->
<div class="form-group">
    {!! Form::label('mobile_image', 'Mobile Image') !!}
    {!! Form::file('mobile_image', null, array('required', 'class'=>'form-control')) !!}
</div>

