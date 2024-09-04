<x-app>
  <x-slot:pageTitle>Organization</x-slot:pageTitle>
  <div class="py-2">
    <a class="px-3 py-2 bg-blue-700 text-white font-bold rounded-md" href="{{route('organization.create')}}">Create
      Job</a>
  </div>

  <div class="py-4">

    <ul role="list" class="">
      @forelse ($orgs as $org)
      <li class="flex justify-between gap-x-6 py-5 border-2 rounded-md p-6 mb-4">
        <div class="flex min-w-0 gap-x-4">
          <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
            alt="">
          <div class="min-w-0 flex-auto">
            <p class="text-md font-semibold leading-6 text-gray-900">{{$org->name}}</p>
            <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{$org->email}}</p>
          </div>
        </div>
        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
          <div class="text-xl flex gap-3">
            <form action="{{route('organization.edit',$org->id)}}" method="get">
              @csrf
              <button type="submit"><i class="fa-regular fa-pen-to-square"></i></button>
            </form>
            <form action="{{route('organization.show',$org->id)}}" method="get">
              @csrf
              <button type="submit"><i class="fa-regular fa-eye"></i></button>
            </form>
            <form action="{{route('organization.destroy',$org->id)}}" method="post">
              @csrf
              @method('delete')
              <button type="submit"><i class="fa-solid fa-trash-can"></i></button>
            </form>
          </div>
          <p class="mt-1 text-xs leading-5 text-gray-500">Create at: {{$org->created_at->diffForHumans()}}</time></p>
        </div>
      </li>
      @empty
      <h1 class="text-center text-2xl font-bold mt-12">Organization List is Empty</h1>
      @endforelse
    </ul>
  </div>



</x-app>