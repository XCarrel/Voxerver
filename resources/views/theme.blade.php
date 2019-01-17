@extends('layout')
@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Themes
            </div>
            <div class="links">
                @if (count($themes) > 0)
                    <form method="post" action="/themes/delete">
                        @csrf
                        <table class="table table-hover">
                            <tr>
                                <th scope="col">Vocabulaire</th>
                                <th scope="col">Action</th>
                            </tr>

                            @foreach($themes as $theme)
                                <tr>
                                    <td class="align-middle">{{$theme->title}}</td>
                                    <!-- Give to the button the value of the ID line -->
                                    <td><button class="btn btn-danger" name="delid" value="{{ $theme->id }}">Supprimer</button></td>
                                </tr>
                            @endforeach
                        </table>
                    </form>
                    <form method="post" action="/themes/create">
                        @csrf
                        <div class="form-group">
                            <label for="addlanguage">Langue à ajouter</label>
                            <input type="text" class="form-control" name="addlanguage" placeholder="Langue"><br>
                            <button type="submit" name="addlang" class="btn btn-success">Ajouter</button>
                        </div>
                    </form>
                    <div class="Home"><a href="{{ url('/') }}">Retour à l'accueil</a></div>
                    @else
                    </table>
                    </form>
                    <div>Aucun langue disponible</div><br><br>
                    <form method="post" action="/languages/create">
                        @csrf
                        <div class="form-group">
                            <label for="addlanguage">Veuillez rajouter une langue</label>
                            <input type="text" class="form-control" name="addlanguage" placeholder="Langue"><br>
                            <button type="submit" name="addlang" class="btn btn-success">Ajouter</button>
                        </div>
                    </form>
                    <div class="Home"><a href="{{ url('/') }}">Retour à l'accueil</a></div>

                @endif

            </div>
        </div>
    </div>

@endsection

