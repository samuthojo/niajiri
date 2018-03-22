{{-- Newsletter text contents starts --}}
    {!! Form::textarea('message', null, [
                      'id'=>'summernote',
                      'class' => 'form-control',
                      'rows' => 16,
                      'placeholder' => 'Newsletter message'
    ]); !!}
{{-- Newsletter text contents ends --}}


@push('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#summernote').summernote({
            tabsize: 2,
            height: 300
        });
    });
</script>
@endpush
