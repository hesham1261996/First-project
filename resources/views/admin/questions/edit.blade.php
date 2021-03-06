@extends('layouts.app', ['title' => __('questions Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Edit Question')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Question Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('questions.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('questions.update', $question ) }}" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @method('PUT')
                            
                            <h6 class="heading-small text-muted mb-4">{{ __('questions information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('title') }} </label>
                                    <input value="{{$question->title}}" type="text" name="title" id="input-title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('title') }}" value="{{ old('title') }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('answers') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-answers">{{ __('answers') }}</label>
                                    <textarea name="answers" id="input-answers" class="form-control form-control-alternative{{ $errors->has('answers') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('answers') }}"  required>{{$question->answers}}</textarea>

                                    @if ($errors->has('answers'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('answers') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('right_answer') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('right_answer') }}</label>
                                    <input value="{{$question->right_answer}}" type="text" name="right_answer" id="input-right_answer" class="form-control form-control-alternative{{ $errors->has('right_answer') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('right_answer') }}" value="{{ old('right_answer') }}" required >

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('score') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-link">{{ __('score') }}</label>

                                    <select name="score" class="form-control" required>
                                        
                                        
                                        <option <?php if($question->score == 10) {echo 'selected';} ?> value="10">10</option>
                                        <option <?php if($question->score == 20) {echo 'selected';} ?> value="20">20</option>
                                        <option <?php if($question->score == 30) {echo 'selected';} ?> value="30">30</option>
                                        
                                        
                                        
                                    </select>
                                    @if ($errors->has('score'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('score') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-link">{{ __('type') }}</label>

                                    <select name="type" class="form-control" required>
                                        <option <?php if($question->type == 'text' ) {echo 'selected';} ?> value="text">text</option>
                                        <option <?php if($question->type == 'checkbox') {echo 'selected';} ?> value="checkbox">checkbox</option>
                                    </select>
                                    @if ($errors->has('type'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('quize_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-link">{{ __('quize_id') }}</label>

                                    <select name="quize_id" class="form-control" required>
                                        @foreach (\App\models\quiz::all() as $quiz)
                                        <option  <?php if($question->quize_id == $quiz->id) echo 'selected'; ?> value="{{$quiz->id}}">{{$quiz->name}}</option>
                                        @endforeach
                                        
                                        
                                    </select>
                                    @if ($errors->has('quize_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('quize_id') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Add') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection