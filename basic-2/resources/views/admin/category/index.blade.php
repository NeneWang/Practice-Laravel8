<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Categories

        </h2>
    </x-slot>

    <div class="container">

        <div class="card-header">Add Category</div>

        <form action="{{route('store.category')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">category Name</label>
                <input name="category_name" type="email" type="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">

                @error('cateogry_name')
                <span class="text-danger">{{$message}}</span>
                @enderror

            </div>

            <button type="submit" class="btn btn-primary">Add Category</button>

        </form>




        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        All Category

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Mail</th>
                                    <th scope="col">Created at</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>