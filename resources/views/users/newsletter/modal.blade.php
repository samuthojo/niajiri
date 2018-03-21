{{-- start news letter modal --}}
<div class="modal fade" id="user-newsletter-modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{-- start modal header--}}
                <div class="modal-header">
                    <h3 class="modal-title" id="">
                        <strong>
                            News letter
                        </strong>
                    </h3>
                </div>
            {{-- End modal header--}}
            {{-- Open newsletter form--}}

            {!!
                Form::open([
                    'method' => 'POST',
                    'route'  =>  ['users.post.newsletter'],
                    'files' => true,    
                ]);
            !!}
        {{-- Start modal body--}}
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            @include('users.newsletter.mailcontents')
                        </div><br/><br/><br/>
                        <div class="row">
                             @include('users.newsletter.fileuploader')
                        </div>
                    </div>
                </div>
            </div>
        {{-- End modal body--}}

        {{-- Start modal footer--}}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" title="{{trans('applicationstages.actions.cancel.title')}}">
                {{trans('applicationstages.actions.cancel.name')}}
                </button>
            {!!
                Form::button('send',
                [
                    'type' => 'submit',
                    'value' => 'send',
                    'class' => 'btn btn-primary',
                ]);
            !!}
            </div>
            {{-- End modal footer--}}
            {!!
                Form::close();
            !!}
            {{-- Close newsletter form--}}
        </div>
    </div>
</div>
{{-- end news letter modal --}}