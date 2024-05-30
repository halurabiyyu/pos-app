@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Items') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('items.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="names">{{ __('Names') }}</label>
                                <input type="text" class="form-control @error('names.*') is-invalid @enderror" id="names" name="names[]" value="{{ old('names.0') }}" placeholder="Enter item name" required>
                                @error('names.*')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="quantities">{{ __('Quantities') }}</label>
                                <input type="number" class="form-control @error('quantities.*') is-invalid @enderror" id="quantities" name="quantities[]" value="{{ old('quantities.0') }}" placeholder="Enter item quantity" required>
                                @error('quantities.*')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="prices">{{ __('Prices') }}</label>
                                <input type="number" step="0.01" class="form-control @error('prices.*') is-invalid @enderror" id="prices" name="prices[]" value="{{ old('prices.0') }}" placeholder="Enter item price" required>
                                @error('prices.*')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="button" class="btn btn-primary" id="addItem">{{ __('Add Item') }}</button>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var itemCount = 1;

            $('#addItem').click(function() {
                var newItem = `
                    <div class="form-group">
                        <label for="names">{{ __('Names') }}</label>
                        <input type="text" class="form-control @error('names.*') is-invalid @enderror" id="names" name="names[]" value="{{ old('names.${itemCount}') }}" placeholder="Enter item name" required>
                        @error('names.*')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="quantities">{{ __('Quantities') }}</label>
                        <input type="number" class="form-control @error('quantities.*') is-invalid @enderror" id="quantities" name="quantities[]" value="{{ old('quantities.${itemCount}') }}" placeholder="Enter item quantity" required>
                        @error('quantities.*')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="prices">{{ __('Prices') }}</label>
                        <input type="number" step="0.01" class="form-control @error('prices.*') is-invalid @enderror" id="prices" name="prices[]" value="{{ old('prices.${itemCount}') }}" placeholder="Enter item price" required>
                        @error('prices.*')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                `;

                $('form').append(newItem);
                itemCount++;
            });
        });
    </script>
@endsection