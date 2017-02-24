@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crear Post</div>
                <div class="panel-body">

                @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('message') }} <a href="{{ route('post_show', [Session::get('vista_id'), Session::get('slug')]) }}">Ver Post</a>
                    </div>
                @endif
                @include('partials.errorMessages')

                {!! Form::open(['route'=>'post_create', 'method'=>'POST', 'role'=>'form', 'class' => 'form-horizontal']) !!}
                    <div class="form-group">
                        <label class="col-md-4 control-label">Title*</label>
                        <div class="col-md-6">
                           {!! Form::text('title',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Contenido*</label>
                        <div class="col-md-6">
                           {!! Form::textarea('content',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Tag*</label>
                        <div class="col-md-6">
                            <select name="tags[]" id="tags" multiple="multiple" style="width:100%" >
                                <option selected="selected">Cars</option>
                                <option selected="selected">Health</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Enviar
                            </button>
                        </div>
                    </div>
                {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script_footer')
<script>
$('#tags').select2({
    data: ["Politics","Video"],
    tags: true,
    tokenSeparators: [','], 
    placeholder: "Add your tags here"
});
</script>
@endsection