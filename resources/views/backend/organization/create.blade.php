<x-app>

  <x-slot:pageTitle>Create Organization</x-slot:pageTitle>

  <div class="py-2">
    <!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->

  {{-- 
    Name
    Contact
    Location
  --}}
    <form action="{{route('organization.store')}}" method="POST">
      @csrf
      <div class="space-y-12">

        <div class="border-b border-gray-900/10 pb-12">
          <h2 class="text-base font-semibold leading-7 text-gray-900">Organization Information</h2>
          {{-- <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p> --}}

          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="col-span-full">
              <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Organization name</label>
              @error('name')
              <p class="text-sm text-red-500 font-semibold">{{$message}}</p>
              @enderror
              <div class="mt-2">
                <input type="text" value="{{old('name')}}" name="name" id="name" autocomplete="name"
                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 @error('name') ring-red-600 @enderror sm:text-sm sm:leading-6" placeholder="Company Inc">
              </div>
            </div>

            <div class="col-span-full">
              <label for="about" class="block text-sm font-medium leading-6 text-gray-900">About</label>
              @error('about')
              <p class="text-sm text-red-500 font-semibold">{{$message}}</p>
              @enderror
              <div class="mt-2">
                <textarea id="about" name="about" rows="3"
                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 @error('about') ring-red-600 @enderror sm:text-sm sm:leading-6">{{old('name')}}</textarea>
              </div>
              <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about organization.</p>
            </div>

            <div class="sm:col-span-2 sm:col-start-1">
              <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
              @error('address')
              <p class="text-sm text-red-500 font-semibold">{{$message}}</p>
              @enderror
              <div class="mt-2">
                <input type="text" value="{{old('address')}}" name="address" id="address" autocomplete="address"
                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 @error('address') ring-red-600 @enderror sm:text-sm sm:leading-6" placeholder="22b baker street, London">
              </div>
            </div>

            <div class="sm:col-span-2">
              <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone Number</label>
              @error('phone')
              <p class="text-sm text-red-500 font-semibold">{{$message}}</p>
              @enderror
              <div class="mt-2">
                <input type="text" value="{{old('phone')}}" name="phone" id="phone" autocomplete="phone"
                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 @error('phone') ring-red-600 @enderror sm:text-sm sm:leading-6" placeholder="019XXXXXXXX">
              </div>
            </div>

            <div class="sm:col-span-2">
              <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
              @error('email')
              <p class="text-sm text-red-500 font-semibold">{{$message}}</p>
              @enderror
              <div class="mt-2">
                <input type="email" value="{{old('email')}}" name="email" id="email" autocomplete="email"
                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 @error('email') ring-red-600 @enderror sm:text-sm sm:leading-6" placeholder="example@email.com">
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="reset" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
        <button type="submit"
          class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
      </div>
    </form>

  </div>

  </script>
</x-app>