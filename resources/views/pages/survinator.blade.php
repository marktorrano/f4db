@extends('layouts.app')

@push('styles')

@endpush

<div id="survinator">
    <div id="form">
        <h3>Document Generator</h3>
        <br/>
        {!! Form::open(array('url' => 'documents/', 'target' => '_blank')) !!}
        <div class="form-group">
            <div class="form-group">
                {!! Form::label('id', 'ID:') !!}
                {!! Form::text('id', '', ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group category_field">
            {!! Form::label('docType', 'Document:') !!}
            <select id="docType" name="docType" class="form-control">
                <option value="ssr" selected>Site Survey Report</option>
            </select>
        </div>

        <div class="form-group category_field">
            {!! Form::label('lang', 'Language:') !!}
            <select id="lang" name="lang" class="form-control">
                <option value="nl" selected>Dutch</option>
                <option value="fr">French</option>
            </select>
        </div>

        {!! Form::submit('Generate', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}

    </div>
</div>

@section('content')

@endsection