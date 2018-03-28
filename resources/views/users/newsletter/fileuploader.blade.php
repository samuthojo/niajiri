
{{-- File uploader starts here--}}
    <div>Attach files below</div>
    <div class="dropzone">
        {!!
            Form::file('file[]',[
                'class' => 'fallback',
                'required' => 'required'
            ]);
        !!}
    </div>
{{-- File uploader ends here--}}