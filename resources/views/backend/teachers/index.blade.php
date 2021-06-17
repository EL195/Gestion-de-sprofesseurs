@extends('layouts.app')

@section('content')
    <div class="roles-permissions">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Professeur</h2>
            </div>
            <div class="flex flex-wrap items-center">
                <a href="{{ route('teacher.create') }}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                    <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                    <span class="ml-2 text-xs font-semibold">Professeur</span>
                </a>
            </div>
        </div>

        <!-- Search bar -->
     <div class="pt-2 relative mx-auto text-gray-600">
        <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
          type="search" id="myInput" onkeyup="myFunction()" name="search" placeholder="Rechercher">
        </button>
      </div>
    <div>

    <br>
      <table id="myTable" class="min-w-full table-auto">
        <thead class="justify-between">
          <tr class="bg-gray-800">
            <th style="text-align: left; padding-left:15px;" class="py-2">
              <span class="text-gray-300">Nom</span>
            </th>
            <th style="text-align: left; padding-left:15px;" class="py-2">
              <span class="text-gray-300">Email</span>
            </th>
            <th style="text-align: left; padding-left:15px;" class="py-2">
              <span class="text-gray-300">Cours</span>
            </th>

            <th style="text-align: left; padding-left:15px;" class="py-2">
              <span class="text-gray-300">Téléphone</span>
            </th>

            <th style="text-align: left; padding-left:15px;" class="py-2">
              <span class="text-gray-300">Actions</span>
            </th>
          </tr>
        </thead>


        <tbody class="bg-gray-200">
          @foreach ($teachers as $teacher)
          <tr class="bg-white border-4 border-gray-200">
            <td>
              <span class="text-center ml-2 font-semibold">{{ $teacher->user->name }}</span>
            </td>
            <td class="py-2">
             {{ $teacher->user->email }}
            </td>
            <td class="py-2">
             @foreach ($teacher->subjects as $subject)
                            <span class="bg-gray-200 text-sm mr-1 mb-1 px-2 border rounded-full">{{ $subject->name }}</span>
                        @endforeach
            </td>
            <td class="py-2">
              {{ $teacher->phone }}
            </td>

            <td class="py-2" style="display: flex;">
             <a href="{{ route('teacher.edit',$teacher->id) }}">
            <svg class="h-6 w-6 fill-current text-gray-600" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
            </a>
            <a href="{{ route('teacher.destroy', $teacher->id) }}" data-url="{{ route('teacher.destroy', $teacher->id) }}" class="deletebtn bg-gray-600 block p-1 border border-gray-600 rounded-sm">
            <svg class="h-3 w-3 fill-current text-gray-100" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
            </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>


        <div class="mt-8">
            {{ $teachers->links() }}
        </div>

        @include('backend.modals.delete',['name' => 'teacher'])
    </div>
@endsection

@push('scripts')
<script>
    $(function() {
        $( ".deletebtn" ).on( "click", function(event) {
            event.preventDefault();
            $( "#deletemodal" ).toggleClass( "hidden" );
            var url = $(this).attr('data-url');
            $(".remove-record").attr("action", url);
        })        
        
        $( "#deletemodelclose" ).on( "click", function(event) {
            event.preventDefault();
            $( "#deletemodal" ).toggleClass( "hidden" );
        })
    })
</script>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
@endpush