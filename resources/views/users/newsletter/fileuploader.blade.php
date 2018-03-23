
{{-- File uploader starts here--}}
    <div>Attach files below</div>
    <div class="dropzone">
        {!!
            Form::file('newsAttach[]',[
                'class' => 'fallback',
                'multiple' => 'multiple'

            ]);
        !!}
    </div>
{{-- File uploader ends here--}}