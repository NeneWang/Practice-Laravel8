<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            Multi Picture<b> </b>


        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">


                <div class="col-md-8">
                    <div class="card">


                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                    </div>
                </div>


                <div class="col-md-4">
                    <div class="card">
                      <div class="card-header"> Multi Image </div>
                      <div class="card-body">
            
                        <form action="{{ route('store.image') }}" method="POST" enctype="multipart/form-data">
                          @csrf
            
            
            
                          <div class="form-group">
                            <label for="exampleInputEmail1">Multi Image</label>
                            <input type="file" name="image[]" class="form-control" id="exampleInputEmail1"
                              aria-describedby="emailHelp" multiple="">
            
                            @error('image')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
            
                          </div>
                          <button type="submit" class="btn btn-primary">Add Image</button>
                        </form>
            
                      </div>
            
                    </div>
                  </div>



            </div>
        </div>



        <!-- Trash Part -->



    </div>
</x-app-layout>