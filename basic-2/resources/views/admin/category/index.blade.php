<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Categories

        </h2>
    </x-slot>

    <div class="">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header"> Add Category </div>
                <div class="card-body">



                    <form action="{{ route('store.category') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input type="text" name="category_name" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">

                            @error('category_name')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror

                        </div>

                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </form>

                </div>

            </div>
        </div>





        <div class="container">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        All Category

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Created at</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php($i = 1)
                                @foreach($categories as $category)

                                <tr>
                                    <th scope="row"> {{$i++}} </th>
                                    <td> {{ $category->category_name }} </td>
                                    <td> {{ $category->user_id }} </td>
                                    <td>
                                        @if( $category->create_at == NULL )
                                            <span class="text-danger">
                                                No date Set
                                            </span>
                                        @else
                                            {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
                                        @endif
                                    </td>

                                </tr>

                                @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>