@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row justify-content-center rounded-xl shadow-xl p-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-black font-bold text-center text-2xl">Ulasan Buku </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('soalresult.store') }}">
                        @csrf
                        <input type="number" name="pengembalian_id" value="{{ $id }}" hidden>
                        @foreach($soal as $s)
                            <div class="card mb-3 ml-5">
                                <div class="card-header text-2xl text-center font-bold text-black">{{ $s->judul }}</div>
                
                                <div class="card-body ">
                                    @foreach($s->soal as $question)
                                        <div class="card @if(!$loop->last)mb-3 @endif my-10">
                                            <div class="card-header font-semibold text-black text-lg">{{$loop->iteration}} . {{ $question->soal }}</div>
                        
                                            <div class="card-body px-5 ">
                                                <input type="hidden" name="questions[{{ $question->id }}]" value="">
                                                @foreach($question->options as $option)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="questions[{{ $question->id }}]" id="option-{{ $option->id }}" value="{{ $option->id }}"@if(old("questions.$question->id") == $option->id) checked @endif>
                                                        <label class="form-check-label" for="option-{{ $option->id }}">
                                                            {{ $option->option }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                                @if($errors->has("questions.$question->id"))
                                                    <span style="margin-top: .25rem; font-size: 80%; color: #e3342f;" role="alert">
                                                        <strong>{{ $errors->first("questions.$question->id") }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach

                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                                <button type="submit" class="text-center bg-black text-white rounded-md p-3">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection