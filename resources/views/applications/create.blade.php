@extends('layouts.page')

@section('page')
{{-- start position preview --}}
<div class="row">
    <div class="col-md-12">

        {{-- start box --}}
         {!! Form::open([
            'route' => 'applications.store',
            'files' => true
        ]) !!}
        <div class="ibox product-detail">

            {{-- start box content --}}
            <div class="ibox-content">

                <div class="row">

                    {{-- end position details --}}
                    <div class="col-md-12">

                        <div class="m-t-md">
                            {!!
                                Form::button(
                                    trans('positions.actions.apply.name'),
                                    [
                                    'type' => 'submit',
                                    'class' => 'btn btn-primary pull-right',
                                    'title' => trans('positions.actions.apply.title'),
                                ])
                            !!}
                            <h3 class="product-main-price">
                                {!! trans('cvs.headers.cover_letter.description') !!}
                            </h3>
                        </div>
                        <hr>
                    </div>
                    {{-- start position details --}}

                    {{-- start application cover letter --}}
                    <div class="row">
                        <div class="col-md-4">&nbsp;</div>
                        <div class="col-md-6">
                            <div class="file-box  m-t-xl m-b-xl">
                                <div class="file">
                                    <div>
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                         <div class="file-name" id="file-name" style="display: none;">
                                            <a href="#" id="file-actual-name">N/A</a>
                                            <br>
                                        </div>
                                    </div>
                                    <input type="hidden" name="applicant_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="organization_id" value="{{$position->organization_id}}">
                                    <input type="hidden" name="position_id" value="{{$position->id}}">
                                    <div class="change-photo-btn change-photo-btn-cover-letter">
                                        <div class="photoUpload">
                                            <span title="{{trans('educations.inputs.attachment.placeholder')}}">
                                                <i class="fa fa-upload"></i> {{trans('cvs.headers.cover_letter.name')}}
                                            </span>
                                            <input id="cover_letter" name="cover_letter" type="file" class="upload" accept="application/pdf" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">&nbsp;</div>
                    </div>
                    {{-- end application cover letter --}}

                </div>

            </div>
            {{-- end box content --}}
        </div>
        {!! Form::close() !!}
        {{-- end box --}}

    </div>
</div>
{{-- end position preview --}}
@endsection

@push('scripts')
<script type="text/javascript">

$('input[type=file]').change(function(e){
    $in = $(this);
    var files = $in.prop('files');
    if(files){
        files = files[0];

        var fileName = $('#file-name');
        var fileActualName = $('#file-actual-name');
        fileActualName.html(files.name);

        fileName.show();
    }
    
});

</script>
@endpush