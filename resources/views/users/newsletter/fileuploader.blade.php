
{{-- File uploader starts here--}}
    <div class="dropzone">
        {!!
            Form::file('file[]',[
                'class' => 'fallback',
                'multiple' => 'multiple'

            ]);
        !!}
    </div>
{{-- File uploader ends here--}}