<x-app-layout>
<!--     <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Create Client') }}
        </h2>
    </x-slot> -->



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">

                    @if(session('success'))
                    <div class="bg-green-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto w-3/4 xl:w-2/4">
                      <svg viewBox="0 0 24 24" class="text-green-600 w-5 h-5 sm:w-5 sm:h-5 mr-3" >
                        <path fill="currentColor" d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z" ></path>
                      </svg>
                      <span class="text-green-800">{{ __('User account has been successfully created') }}</span>
                    </div>
                    @endif


                    <form method="post">
                        @csrf
                        <h3 class="font-bold leading-5 text-gray-600 sm:text-xl sm:truncate">Login Credentials</h3>
                        <div class="flex space-x-4 py-3">
                            <div class="flex-1">
                            <label for="username" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Username*</label>
                            <input name="username" type="text" value="{{ old('username') }}" class="text-sm sm:text-base relative w-full border rounded placeholder-gray-400 focus:border-indigo-400 focus:outline-none py-2 pr-2">
                            @error('username')
                            <span class="text-xs text-red-400">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="flex-1">
                            <label for="password" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Password*</label>
                            <input name="password" type="Password" value="{{ old('password') }}" class="text-sm sm:text-base relative w-full border rounded placeholder-gray-400 focus:border-indigo-400 focus:outline-none py-2 pr-2">
                            @error('password')
                            <span class="text-xs text-red-400">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="flex space-x-4 py-3">
                            <div class="flex-1">
                            <label for="email" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Email <span class="text-xs text-gray-400">(Email may used as username for signed in)</span> </label>
                            <input name="email" value="{{ old('email') }}" type="text" class="text-sm sm:text-base relative w-full border rounded placeholder-gray-400 focus:border-indigo-400 focus:outline-none py-2 pr-2">
                            @error('email')
                            <span class="text-xs text-red-400">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <hr class="my-6">
                        <h3 class="font-bold leading-5 text-gray-600 sm:text-xl sm:truncate">Personal Information</h3>
                        <div class="flex space-x-4 py-3">
                            <div class="flex-1">
                            <label for="first_name" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">First Name*</label>
                            <input name="first_name" type="text" value="{{ old('first_name') }}" class="text-sm sm:text-base relative w-full border rounded placeholder-gray-400 focus:border-indigo-400 focus:outline-none py-2 pr-2">
                            @error('first_name')
                            <span class="text-xs text-red-400">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="flex-1">
                            <label for="last_name" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Last Name*</label>
                            <input name="last_name" type="text" value="{{ old('last_name') }}" class="text-sm sm:text-base relative w-full border rounded placeholder-gray-400 focus:border-indigo-400 focus:outline-none py-2 pr-2">
                            @error('last_name')
                            <span class="text-xs text-red-400">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>

                        <div class="flex space-x-4 py-3">
                            <div class="flex-1">
                            <label for="address" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Address*</label>
                            <input name="address" type="text" value="{{ old('address') }}" class="text-sm sm:text-base relative w-full border rounded placeholder-gray-400 focus:border-indigo-400 focus:outline-none py-2 pr-2">
                            @error('address')
                            <span class="text-xs text-red-400">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="flex-1">
                            <label for="phone" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Phone*</label>
                            <input name="phone" type="text" value="{{ old('phone') }}" class="text-sm sm:text-base relative w-full border rounded placeholder-gray-400 focus:border-indigo-400 focus:outline-none py-2 pr-2">
                            @error('phone')
                            <span class="text-xs text-red-400">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
<!--                         <hr class="my-6"> -->
                        <div class="width-100 text-center py-8">
                        <button class="min-w-full px-4 py-2 rounded text-white inline-block shadow-lg bg-blue-500 hover:bg-blue-600 focus:bg-blue-700" type="submit">Add Client</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
