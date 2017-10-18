{{-- start position cover letter --}}
@if($application->coverLetter())
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
                    <div class="file-name">
                        <a href="{{$application->coverLetter()->public_url()}}" target="_blank">
                        {{$application->coverLetter()->file_name}}
                        </a>
                        <br>
                        <small>Added: {{$application->coverLetter()->created_at->format(config('app.datetime_format'))}}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
{{-- end position cover letter --}}