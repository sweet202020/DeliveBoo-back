@extends('layouts.app')
@section('content')
    <section class="plates">
        <div class="container">
            <a href="{{ route('admin.plates.create') }}"><button class="btn btn-primary">add plate</button> </a>
            <!-- /.btn -->

            <div class="table-responsive">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">name</th>
                            <th scope="col">description</th>
                            <th scope="col">cover image</th>
                            <th scope="col">price</th>
                            <th scope="col">actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($plates as $plate)
                            <tr class="">
                                <td scope="row">{{ $plate->id }}</td>
                                <td>{{ $plate->name }}</td>
                                <td>{{ $plate->description }}</td>
                                <td>{{ $plate->cover_image }}</td>
                                <td>{{ $plate->price }}</td>
                                <td><a href="{{ route('admin.plates.show', $plate->id) }}">show</a>
                                    <a href="{{ route('admin.plates.edit', $plate->id) }}">edit</a>
                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete_plate_{{ $plate->id }}">
                                        Delete
                                    </button>

                                    <!-- Modal Body -->
                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                    <div class="modal fade" id="delete_plate_{{ $plate->id }}" tabindex="-1"
                                        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                        aria-labelledby="modalnameId_{{ $plate->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-name" id="modalnameId_{{ $plate->id }}">Delete
                                                        {{ $plate->name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <form action="{{ route('admin.plates.destroy', $plate->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <input class="btn btn-danger btn-sm" type="submit" value="Delete">

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>

                            @empty
                                <td>no record to show</td>
                        @endforelse
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.container -->

    </section>
@endsection