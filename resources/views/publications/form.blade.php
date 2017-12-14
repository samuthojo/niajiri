{{-- start publication form --}}

{{--start applicant id--}}
@if(is_set($applicant_id))
<input type="hidden" name="applicant_id" value="{{$applicant_id}}">
@endif
{{--end applicant id--}}

<div class="row">
{{-- start title --}}
<div class="col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
        <label for="title" title="{{ trans('publications.inputs.title.description') }}">
            {{trans('publications.inputs.title.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('title', null, [
            'id' => 'title',
            'class' => 'form-control',
            //'required' => 'required',
            'aria-describedby'=> 'publication_title_help_block',
            'placeholder' => trans('publications.inputs.title.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('title'))
        {!!
            $errors->first('title', '<p id="publication_title_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end title --}}


{{-- start publisher --}}
<div class="col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('publisher') ? 'has-error' : ''}}">
        <label for="publisher" title="{{ trans('publications.inputs.publisher.description') }}">
            {{trans('publications.inputs.publisher.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('publisher', null, [
            'id' => 'publisher',
            'class' => 'form-control',
            //'required' => 'required',
            'aria-describedby'=> 'publication_publisher_help_block',
            'placeholder' => trans('publications.inputs.publisher.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('publisher'))
        {!!
            $errors->first('publisher', '<p id="publication_publisher_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end publisher --}}
</div>

<div class="row">
{{-- start summary --}}
<div class="col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('summary') ? 'has-error' : ''}}">
        <label for="summary" title="{{ trans('publications.inputs.summary.description') }}">
            {{trans('publications.inputs.summary.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('summary', null, [
            'id' => 'summary',
            'class' => 'form-control',
            //'required' => 'required',
            'aria-describedby'=> 'publication_summary_help_block',
            'placeholder' => trans('publications.inputs.summary.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('summary'))
        {!!
            $errors->first('summary', '<p id="publication_summary_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end summary --}}

{{-- start published_at --}}
<div class="col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('published_at') ? 'has-error' : ''}}">
        <label for="published_at" title="{{ trans('publications.inputs.published_at.description') }}">
            {{trans('publications.inputs.published_at.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('published_at', null, [
            'id' => 'published_at',
            'class' => 'form-control datepicker',
            //'required' => 'required',
            'placeholder' => trans('publications.inputs.published_at.placeholder'),
            'aria-describedby'=> 'publication_published_at_help_block',
            'data-provide' => 'datepicker',
            'data-date-format' => config('app.datepicker_date_format')
        ]) !!}
       @if($errors->any() && $errors->has('published_at'))
        {!!
            $errors->first('published_at', '<p id="publication_published_at_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end published_at --}}
</div>

{{-- end publication form --}}