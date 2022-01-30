@extends('backoffice/layout/layout')

@section('add')

    <div class="container mt-4">

        <div class="row  justify-content-md-center ">


            @if ($tipo == 'user')
                <form id="formAddUser" action="{{ route('add') }}" name="formAddUser" method="POST">
            @endif

            @if ($tipo == 'oficina')
                <form id="formLogin" action="{{ route('add') }}" name="formLogin" method="POST">
            @endif

            @if ($tipo == 'user')
                <form id="formLogin" action="{{ route('add') }}" name="formLogin" method="POST">
            @endif

             @if ($tipo == 'cliente')
                <form id="formLogin" action="{{ route('add') }}" name="formLogin" method="POST">
            @endif

             @csrf
             @foreach($array as $val)
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <!-- Text input nome  -->
                        <input type="text" id="idNome" class="form-control" name="fname"  
                        
                         @if(!empty($array)) value="{{$val['nome']}}" @endif
                        />
                        <label class="form-label" for="idNome">
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
                <input type="email" id="form6Example3" class="form-control" name="fmail" 
                  @if(!empty($array))  value="{{$val['email']}}"   @endif
                />
                <label class="form-label" for="form6Example3">

                    @if ($tipo == 'user')
                        {{ $email }}
                    @else
                        Company name
                    @endif

                </label>
            </div>

            <!-- Text input  tipo -->
            @if ($tipo == 'user')
                {{-- <div class="form-outline mb-4"> --}}
                <label class="form-label" for="form6Example4"> {{ $tipoUser }} </label>
                <select class="select form-control mb-4" name="ftype">
                    <option value="1"></option>
                    <option value="Admin" @if(!empty($array) && $val['tipoEdit']=="Admin")  {{"selected"}} @endif >Admin</option>
                    <option value="Funcionario" @if(!empty($array) && $val['tipoEdit']=="Funcionario")  {{"selected"}}   @endif>Funcionario</option>
                    <option value="Normal" @if(!empty($array) && $val['tipoEdit']=="Normal")  {{"selected"}}   @endif >Normal</option>
                </select>
            @else
                <input type="text" id="form6Example4" class="form-control" />
                <label class="form-label" for="form6Example4">
                    Address
                </label>
                {{-- </div> --}}
            @endif

            <!-- Email input  |  password  pas s  -->
            <div class="form-outline mb-4">
                <input type="password" id="form6Example5" class="form-control" name="fsenha" 
                 @if(!empty($array))  value="{{$val['palavraw']}}" @endif
                />
                @endforeach
                <label class="form-label" for="form6Example5">
                    @if ($tipo == 'user')
                        {{ $pass }}
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
