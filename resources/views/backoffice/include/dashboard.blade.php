<div class="container-fluid text-center mt-5">
    <h5 class="card-title"> @if (isset($tipo))  {{ $title_area }}     @endif </h5>

    @if ($tipo == 'home')
        <figure class="figure">
            <img src="{{ asset('img/admin.jpg') }}" class="figure-img img-fluid rounded" alt="...">
            <figcaption class="figure-caption">A caption for the above image.</figcaption>
        </figure>
    @endif
    {{-- create user --}}
    @if ($tipo == 'user')

        <div class="d-grid gap-2 col-6 mx-auto mb-3">
            <a href="{{ route('add_main_view', ['tipo' => $tipo]) }}">
                <button class="btn btn-primary" type="button">
                    ADD User
                    <i class="fas fa-plus-circle"></i>
                </button>
            </a>

        </div>

        <div class="box-table mt-4">

            <table class="table" id="customTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tipo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($array as $val)
                        <tr>
                            <td>{!! $val['id'] !!}</td>
                            <td>{!! $val['nome'] !!}</td>
                            <td>{!! $val['email'] !!}</td>
                            <td>{!! $val['tipo'] !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endif
    {{-- create automevel --}}
    @if ($tipo == 'oficina')

        <div class="d-grid gap-2 col-6 mx-auto mb-3">
            <button class="btn btn-primary" type="button">
                ADD Automovel
                <i class="fas fa-plus-circle"></i>
            </button>
        </div>

    @endif
    {{-- create automevel --}}
    @if ($tipo == 'cliente')

        <div class="d-grid gap-2 col-6 mx-auto mb-3">
            <button class="btn btn-primary" type="button">
                ADD Cliente
                <i class="fas fa-plus-circle"></i>
            </button>
        </div>

    @endif

    <script>
        $(document).ready(function() {
            $('#customTable').DataTable();
        });
    </script>


</div>
