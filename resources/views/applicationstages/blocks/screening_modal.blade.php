{{-- start application stage screening modal --}}
<div class="modal fade" id="application-screening-modal" tabindex="-1" role="dialog" aria-labelledby="applicationScreeningModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="applicationScreeningModalLabel">
          <strong>
            {{trans('applicationstages.actions.screen.label')}}
          </strong>
        </h3>
      </div>

      {{--start screening form--}}
      {!! Form::open([
            'method'=>'GET',
            'route' => 'applicationstages.index',
        ]) !!}
      @if(is_set($position))
        <input type="hidden" name="position_id" value="{{$position->id}}">
      @endif
      @if(is_set($stage))
        <input type="hidden" name="stage_id" value="{{$stage->id}}">
      @endif
      <div class="modal-body">
        <div class="ibox">
          <div class="ibox-content" style="border: none;">
            <div class="row">

              {{-- start eduction level filter --}}
              <div class="row m-t-lg">
                <div class="col-md-12">
                    <h3 title="{{trans('applicationstages.filters.levels.title')}}">
                      <strong>{{trans('applicationstages.filters.levels.name')}}</strong>
                    </h3>
                </div>
              </div>
              <div class="row">
                  @foreach(trans('educations.levels') as $key => $value)
                      <div class="col-md-3">
                          <div
                              class="checkbox"
                              title="{{$value}}">
                            <label
                              for="{{$key}}"
                              title="{{$value}}">
                            {{
                              Form::checkbox('level[]', $key, null )}}
                            {{$value}}
                            </label>
                          </div>
                      </div>
                  @endforeach
              </div>
              {{-- end eduction level filter --}}

              {{-- start studied institution filter --}}
              <div class="row m-t-lg">
                <div class="col-md-12">
                    <h3 title="{{trans('applicationstages.filters.institutions.title')}}">
                      <strong>{{trans('applicationstages.filters.institutions.name')}}</strong>
                    </h3>
                </div>
              </div>
              <div class="row">
                  @foreach(trans('educations.institutions') as $key => $value)
                      <div class="col-md-4">
                          <div
                              class="checkbox"
                              title="{{$value}}">
                            <label
                              for="{{$key}}"
                              title="{{$value}}">
                            {{
                              Form::checkbox('institution[]', $key, null )}}
                            {{$value}}
                            </label>
                          </div>
                      </div>
                  @endforeach
              </div>
              {{-- end studied institution filter --}}

              {{-- start ages filter --}}
              <div class="row m-t-lg">
                <div class="col-md-12">
                    <h3 title="{{trans('applicationstages.filters.ages.title')}}">
                      <strong>{{trans('applicationstages.filters.ages.name')}}</strong>
                    </h3>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  {!! Form::number('age_equal', null, [
                        'class' => 'form-control',
                        'placeholder' => 'Age Equal',
                        'min' => 0,
                        'step' => 1,
                    ]) !!}
                </div>
                <div class="col-md-4">
                  {!! Form::number('age_greater', null, [
                        'class' => 'form-control',
                        'placeholder' => 'Age Greater Than',
                        'min' => 0,
                        'step' => 1,
                    ]) !!}
                </div>
                <div class="col-md-4">
                  {!! Form::number('age_less', null, [
                        'class' => 'form-control',
                        'placeholder' => 'Age Less Than',
                        'min' => 0,
                        'step' => 1,
                    ]) !!}
                </div>
              </div>
              {{-- end ages filter --}}

              {{-- start gender filter --}}
              <div class="row m-t-lg">
                <div class="col-md-12">
                    <h3 title="{{trans('applicationstages.filters.genders.title')}}">
                      <strong>{{trans('applicationstages.filters.genders.name')}}</strong>
                    </h3>
                </div>
              </div>
              <div class="row">
                @foreach(trans('cvs.genders') as $key => $value)
                <div class="col-md-2">
                  <label class="radio-inline text-black" for="{{$key}}">
                    {!! Form::radio('gender', $value, null, [
                        'id' => $key
                    ]) !!}
                    {{$value}}
                  </label>
                </div>
                @endforeach
              </div>
              {{-- end gender filter --}}


              {{-- start work experiences filter --}}
              <div class="row m-t-lg">
                <div class="col-md-12">
                    <h3 title="{{trans('applicationstages.filters.experiences.title')}}">
                      <strong>{{trans('applicationstages.filters.experiences.name')}}</strong>
                    </h3>
                </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div
                          class="checkbox"
                          title="{{trans('applicationstages.filters.experiences.description')}}">
                        <label
                          for="experiences"
                          title="{{trans('applicationstages.filters.experiences.description')}}">
                        {{
                          Form::checkbox('experience', '1', false )}}
                        {{trans('applicationstages.filters.experiences.description')}}
                        </label>
                      </div>
                  </div>
              </div>
              {{-- end work experiences filter --}}


              {{-- start honor/awards filter --}}
              <div class="row m-t-lg">
                <div class="col-md-12">
                    <h3 title="{{trans('applicationstages.filters.achievements.title')}}">
                      <strong>{{trans('applicationstages.filters.achievements.name')}}</strong>
                    </h3>
                </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div
                          class="checkbox"
                          title="{{trans('applicationstages.filters.achievements.description')}}">
                        <label
                          for="achievements"
                          title="{{trans('applicationstages.filters.achievements.description')}}">
                        {{
                          Form::checkbox('achievement', '1', false )}}
                        {{trans('applicationstages.filters.achievements.description')}}
                        </label>
                      </div>
                  </div>
              </div>
              {{-- end honor/awards filter --}}

            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" title="{{trans('applicationstages.actions.cancel.title')}}">
          {{trans('applicationstages.actions.cancel.name')}}
        </button>
        <a href="{{route('applicationstages.index', ['position_id' => $position->id, 'stage_id' => $stage])}}" role="button" class="btn btn-danger" title="{{trans('applicationstages.actions.clear.title')}}">
          {{trans('applicationstages.actions.clear.name')}}
        </a>
        {!!
           Form::button(
               trans('applicationstages.actions.screen.name'),
               [
               'type' => 'submit',
               'class' => 'btn btn-primary',
               'title' => trans('applicationstages.actions.screen.title'),
           ])
       !!}
      </div>
      {!! Form::close() !!}
      {{--end screening form--}}

    </div>
  </div>
</div>
{{-- end application stage screening modal --}}