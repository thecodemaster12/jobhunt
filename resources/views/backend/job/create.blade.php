<x-app>

  <x-slot:pageTitle>Create Job</x-slot:pageTitle>

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
  <form action="{{route('job.store')}}" method="POST">
    @csrf
    <div class="space-y-12">

      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Job Information</h2>
        {{-- <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p>
        --}}

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-3">
            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Job Title</label>
            @error('title')
            <p class="text-sm text-red-500 font-semibold">{{$message}}</p>
            @enderror
            <div class="mt-2">
              <input type="text" value="{{old('title')}}" name="title" id="title" autocomplete="given-name"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
            @error('salary')
            <p class="text-sm text-red-500 font-semibold">{{$message}}</p>
            @enderror
            <div class="mt-2">
              <input type="text" name="salary" id="salary" autocomplete="family-name"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="col-span-full">
            <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Job Description</label>
            @error('description')
            <p class="text-sm text-red-500 font-semibold">{{$message}}</p>
            @enderror
            <div class="mt-2">
              <textarea id="description" name="description" rows="3"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 @error('about') ring-red-600 @enderror sm:text-sm sm:leading-6">{{old('description')}}</textarea>
            </div>
            <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about the job.</p>
          </div>

          <div class="sm:col-span-3">
            <label for="organization_id" class="block text-sm font-medium leading-6 text-gray-900">Organization</label>
            <div class="mt-2">
              <select id="organization_id" name="organization_id"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                @foreach ($orgs as $org)
                  <option value="{{$org->id}}">{{$org->name}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="">
            <label for="deadline" class="block text-sm font-medium leading-6 text-gray-900">Deadline</label>
            <div class="mt-2">
              <input type="date" value="{{old('deadline')}}" name="deadline" id="deadline" autocomplete="deadline"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 @ sm:text-sm sm:leading-6">
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
      <button type="submit"
        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 ">Save</button>
    </div>
  </form>


  </script>
</x-app>