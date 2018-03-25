
{{-- File uploader starts here--}}
    <div>Attach files below</div>
    <div class="dropzone">
        {!!
            Form::file('file[]',[
                'class' => 'fallback',
            ]);
        !!}
    </div>
{{-- File uploader ends here--}}