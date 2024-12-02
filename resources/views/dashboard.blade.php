<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-grey-800 leading-tight">
            {{ __('Ifraem Porras') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- Add Student Form -->
                <div class="mb-6">
                    @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <strong class="font-bold">{{ session('success') }}</strong>
                        <spam class="block sm:inline">Student has been added successfully.</spam>
                    </div>
                @endif
                    <h3 class="text-lg font-medium mb-4">Add New Student</h3>
                    <form method="POST" action="{{ route('student.store')}}">
                        @csrf
                        @method('POST')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-gray-700">Name</label>
                                <input type="text" id="name" name="name" class="mt-1 block
                                w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label for="email" class="block text-gray-700">Email</label>
                                <input type="email" id="email" name="email" class="mt-1 block
                                w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label for="phone" class="block text-gray-700">Phone</label>
                                <input type="text" id="phone" name="phone" class="mt-1 block
                                w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label for="address" class="block text-gray-700">Address</label>
                                <input type="text" id="address" name="address" class="mt-1 block
                                w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700
                            text-white font-bold py-2 px-4 rounded">Add Student</button>
                        </div>
                    </form>
                </div>

                <!--Student List Table -->
                <div class="mt-8">
                    <h3 class="text-lg font-medium mb-4">Student List</h3>
                    <table class="min-w-full bg-white border">
                        <thead>
                            <tr>
                                <th class="py-2 border-b">#</th>
                                <th class="py-2 border-b">Name</th>
                                <th class="py-2 border-b">Email</th>
                                <th class="py-2 border-b">Phone</th>
                                <th class="py-2 border-b">Address</th>
                                <th class="py-2 border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="student-table">
                            @foreach ($students as $key => $student)
                                <tr>
                                    <td class="py-2 border-b px-4 text-center">{{ $key + 1 }}</td>
                                    <td class="py-2 border-b px-4 text-center">{{ $student->name }}</td>
                                    <td class="py-2 border-b px-4 text-center">{{ $student->email }}</td>
                                    <td class="py-2 border-b px-4 text-center">{{ $student->phone }}</td>
                                    <td class="py-2 border-b px-4 text-center">{{ $student->address }}</td>
                                    <td class="py-2 border-b px-4 text-center">
                                        <a href="#" class="text-blue-500 hover:text-blue-700">Edit</a>
                                        <form method="POST" action="{{ route('student.destroy', $student->id) }}" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
