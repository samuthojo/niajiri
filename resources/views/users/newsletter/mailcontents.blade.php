{{-- Newsletter text contents starts --}}
    {!! Form::textarea('message', null, [
                      'id' => 'message',
                      'class' => 'form-control',
                      'required' => true,
                      'rows' => 16,
                      'placeholder' => 'Newsletter message'
    ]); !!}
{{-- Newsletter text contents ends --}}