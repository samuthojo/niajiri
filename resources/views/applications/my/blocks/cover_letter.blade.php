{{-- start position cover letter --}}
<div class="col-md-12 m-t-lg">
    <blockquote>
      <h3 title="{{trans('cvs.headers.cover_letter.title')}}">
        {{trans('cvs.headers.cover_letter.name')}}
      </h3>
    </blockquote>
    <div class="m-t-lg">
        <div class="file-box">
            <div class="file">
                <div>
                    <span class="corner"></span>

                    <div class="icon">
                        <i class="fa fa-file"></i>
                    </div>
                    @if($application->coverLetter())
                    <div class="file-name">
                        <a href="{{$application->coverLetter()->public_url()}}" target="_blank">
                        {{$application->coverLetter()->file_name}}
                        </a>
                        <br>
                        <small>Added: {{$application->coverLetter()->created_at->format(config('app.datetime_format'))}}</small>
                    </div>
                    @endif
                </div>
                {!! Form::model($application, [
                    'method' => 'PATCH',
                    'id' => 'application-form',
                    'route' => ['applications.update', $application->id],
                    'class' => 'form-horizontal',
                    'files' => true
                ]) !!}
                <input type="hidden" name="applicant_id" value="{{$application->applicant_id}}">
                <input type="hidden" name="organization_id" value="{{$application->organization_id}}">
                <input type="hidden" name="position_id" value="{{$application->position_id}}">
                <div class="change-photo-btn change-photo-btn-cover-letter">
                    <div class="photoUpload">
                        <span title="{{trans('educations.inputs.attachment.placeholder')}}">
                            <i class="fa fa-upload"></i> {{trans('educations.inputs.attachment.change')}}
                        </span>
                        <input id="cover_letter" name="cover_letter" type="file" class="upload" />
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
{{-- end position cover letter --}}

@push('scripts')
<script type="text/javascript">
$('#cover_letter').change(function() {
  $('#application-form').submit();
});
</script>
@endpush