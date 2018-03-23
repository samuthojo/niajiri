
{{-- File uploader starts here--}}
    <div>Attach files below</div>
    <div class="dropzone">
        {!!
            Form::file('file[]',[
                'class' => 'fallback',
                'multiple' => 'multiple'

            ]);
        !!}
    </div>
{{-- File uploader ends here--}}