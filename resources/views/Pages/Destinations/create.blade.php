@extends('layouts.admin')

@section('title', 'Create Destination')
@section('content')
    <x-breadcrumb homeLink="destinations" homeTitle="Destinations" currentLink="#" currentTitle="Create" />
    <x-page-header title="destinations" buttonText="New Destination" :buttonAvailable=false />


    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <form method="POST"" action="{{ route('destinations.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="destination_name"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Destination Name</label>
                <input type="text" id="destination_name" name="destination_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required />
            </div>
            <div class="mb-5">
                <label for="description"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <textarea id="description" name="description" rows="10"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder=""></textarea>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-5">
                <div>
                    <label for="location"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                    <input type="text" id="location" name="location"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required />
                </div>
                <div>
                    <label for="entrance_fee" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Entrance
                        Fee</label>
                    <input type="number" id="entrance_fee" name="entrance_fee"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required />
                </div>
            </div>
            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                    file</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 "
                    aria-describedby="file_input_help" id="dropzone-file" type="file" name="image" required
                    onchange="previewImage(event)">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG atau GIF (MAX.
                    800x400px).</p>
            </div>
            <div id="image-preview" class="mb-5"></div> <!-- Tambahkan elemen ini untuk pratinjau gambar -->
            <button type="submit"
                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2 me-2 dark:focus:ring-yellow-900">Create</button>
        </form>
    </div>

    <script>
        function previewImage(event) {
            var input = event.target;
            var preview = document.getElementById('image-preview');
            preview.innerHTML = ''; // Clear existing content

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = ' h-64 object-contain rounded-lg';
                    preview.appendChild(img); // Display image

                    var fileName = document.createElement('p');
                    fileName.textContent = input.files[0].name;
                    fileName.className = 'text-sm text-gray-500 dark:text-gray-400 mt-2';
                    preview.appendChild(fileName); // Display filename
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
