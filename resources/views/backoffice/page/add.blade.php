@extends('backoffice/layout/layout')

@section('add')

    <div class="container mt-4">

        <div class="row  justify-content-md-center ">

            <form>
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <!-- Text input nome  -->
                            <input type="text" id="form6Example1" class="form-control" />
                            <label class="form-label" for="form6Example1">
                                @if ($tipo == 'user')
                                   {{ $nome }}
                                @else
                                    First names
                                @endif

                            </label>
                        </div>
                    </div>
                </div>

                <!-- Text input email  -->
                <div class="form-outline mb-4">
                    <input type="text" id="form6Example3" class="form-control" />
                    <label class="form-label" for="form6Example3">

                        @if ($tipo == 'user')
                           {{ $email}}
                        @else
                            Company name
                        @endif

                    </label>
                </div>

                <!-- Text input  tipo -->
                @if ($tipo == 'user')
                {{-- <div class="form-outline mb-4"> --}}
                     <label class="form-label" for="form6Example4"> {{ $tipoUser}} </label>
                        <select class="select form-control mb-4" >
                            <option value="1"></option>
                            <option value="1">Admin</option>
                            <option value="2">Funcionario</option>
                            <option value="3">Normal</option>
                        </select>
                       
                    @else
                        <input type="text" id="form6Example4" class="form-control" />
                        <label class="form-label" for="form6Example4">
                            Address
                        </label>
                {{-- </div> --}}
                 @endif

                <!-- Email input  |  pass  -->
                <div class="form-outline mb-4">
                    <input type="email" id="form6Example5" class="form-control" />
                    <label class="form-label" for="form6Example5">
                        @if ($tipo == 'user')
                                {{ $pass}}
                        @else
                            Email
                        @endif

                    </label>
                </div>

                @if ($tipo != 'user')
                    <!-- Number input -->
                    <div class="form-outline mb-4">
                        <input type="number" id="form6Example6" class="form-control" />
                        <label class="form-label" for="form6Example6">Phone</label>
                    </div>

                    <!-- Message input -->
                    <div class="form-outline mb-4">
                        <textarea class="form-control" id="form6Example7" rows="4"></textarea>
                        <label class="form-label" for="form6Example7">Additional information</label>
                    </div>

                    <!-- Checkbox -->
                    <div class="form-check d-flex justify-content-center mb-4">
                        <input class="form-check-input me-2" type="checkbox" value="" id="form6Example8" checked />
                        <label class="form-check-label" for="form6Example8"> Create an account? </label>
                    </div>

                @endif

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Guardar</button>
            </form>
        </div>

    </div>


@endsection
