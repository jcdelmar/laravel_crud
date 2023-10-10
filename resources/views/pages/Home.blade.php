<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
    
<nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <span class="self-center text-3xl  font-bold whitespace-nowrap dark:text-white">Contacts</span>
        
        <div class="flex flex-row md:order-2 h-full border-solid border-0 border-black items-center">
          <div class="mr-10 ">
            @if(session()->has('email'))
              <span class="font-bold">{{session('email')}}</span>
            @endif
          </div>
          <div class="flex mr-3 items-center"> {{-- Logout Button Start --}}
            <form method="post" action="/logout" class="mt-4"> 
              @csrf 
              @method('post')
              <input type="submit" value="Log out" class="cursor-pointer text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 ">
            </form>
          </div>
        </div>
    
    </div>
</nav>



<div class="flex flex-col mt-32 mb-6 mx-24"> 
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
        <div class="overflow-hidden ">

          <div> 
            @if(session()->has('addSuccess'))
                <div class="flex justify-between bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative my-4">
                <p class="self-center">
                  <strong>Contact was successfully added. </strong>
                </p>
                <strong class="text-xl align-center cursor-pointer alert-del">&times;</strong>
              </div>
            @endif 

            @if(session()->has('editSuccess'))
            <div class="flex justify-between bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative my-4">
              <p class="self-center">
                  <strong>Contact was successfully edited. </strong>
                </p>
                <strong class="text-xl align-center cursor-pointer alert-del">&times;</strong>
              </div>
            @endif 

            @if(session()->has('deleteSuccess'))
            <div class="flex justify-between bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative my-4">
              <p class="self-center">
                  <strong>Contact was successfully deleted. </strong>
                </p>
                <strong class="text-xl align-center cursor-pointer alert-del">&times;</strong>
              </div>
            @endif 

            @if(session()->has('registerSuccess'))
            <div class="flex justify-between bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative my-4">
              <p class="self-center">
                  <strong>Thank you for registering. </strong>
                </p>
                <strong class="text-xl align-center cursor-pointer alert-del">&times;</strong>
              </div>
            @endif 
          </div>

          <div class=" flex flex-row justify-end mt-6"> {{-- Add Button Start --}}
            <a href="/addContact">
            <button  class=" text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 ">Add Contact</button>
          </a>
          </div>


          <div class=" flex flex-row justify-end mt-2 ">{{-- Search Bar Start --}}
            <div class="w-1/3 ">
              <input
              id="search"
              name="search"
              type="search"
              placeholder="Search..."
              class="w-full m-0 block min-w-0 flex-auto rounded border-2 border-solid border-neutral-400 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-800 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none "
              />
              
            </div>
          </div>


          <table class="min-w-full text-left text-sm font-light">
            <thead class="border-b font-medium dark:border-neutral-500">
              <tr>
                <th scope="col" class="px-6 py-4">Name</th>
                <th scope="col" class="px-6 py-4">Company</th>
                <th scope="col" class="px-6 py-4">Phone</th>
                <th scope="col" class="px-6 py-4">Email</th>
                <th scope="col" class="px-6 py-4"></th>
              </tr>
            </thead>
            <tbody class="allData">
              @foreach($contacts as $contact)
                <tr
                  class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                  <td class="whitespace-nowrap px-6 py-4 font-medium">{{$contact->contact_name}}</td>
                  <td class="whitespace-nowrap px-6 py-4">{{$contact->contact_company}}</td>
                  <td class="whitespace-nowrap px-6 py-4">{{$contact->contact_phone}}</td>
                  <td class="whitespace-nowrap px-6 py-4">{{$contact->contact_email}}</td>
                  <td class="flex flex-row whitespace-nowrap px-6 py-4">

                    <a href="{{route('editPage', ['id' => $contact->id])}}" class="text-yellow-600 mx-2 no-underline font-bold">
                      Edit
                    </a>
                    |
                    <form method="POST" action="{{ route('deleteContact', ['id' => $contact->id]) }}">
                      @csrf
                      @method('put')
                      
                      <button type='submit' class="text-red-500 mx-2 font-bold" data-toggle="tooltip" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">
                        Delete
                      </button>
                      </form>
                  </td>
                </tr>
              @endforeach

              <tbody id="content" class="searchData"></tbody>

            </tbody>
          </table>
          <div class=" flex items-center justify-center" id="pageNumbers">
            {{$contacts->links()}}
          </div>
          

        </div>
      </div>
    </div>
  </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
//close alert script
 var alert_del = document.querySelectorAll('.alert-del');
  alert_del.forEach((x) =>
    x.addEventListener('click', function () {
      x.parentElement.classList.add('hidden');
    })
  );
</script>
<script>
  //search script

  var typingTimer;                
  var doneTypingInterval = 700;  // timer set at 700ms
  var $input = $('#search');

  $input.on('keyup', function(){ //reset timer on keyup
    var value=$(this).val();
    clearTimeout(typingTimer);
    typingTimer = setTimeout(doneTyping, doneTypingInterval);
  });

  $input.on('keydown', function () { //reset timer on keydown
    clearTimeout(typingTimer);
  });

  function doneTyping(){ // after user stops typing, ajax call search values.
    
    var value=$('#search').val();
    $('#content').empty();
    
    if(value){
      $('#pageNumbers').hide();
      $('.allData').hide();
      $('.searchData').show();
    }else{
      $('#pageNumbers').show();
      $('.allData').show();
      $('.searchData').hide();
    }

    $.ajax({
      type : 'get',
      url : '{{URL::to('search')}}',
      data : {'search' : value},
      success : function(data) {
        var editUrl;

        $('#content').empty();
        data.forEach((d,ndx) => {
          let appendContent = `<tr>
            <td class="whitespace-nowrap px-6 py-4 font-medium">` + d.contact_name + `</td>
            <td class="whitespace-nowrap px-6 py-4">` + d.contact_company + `</td>
            <td class="whitespace-nowrap px-6 py-4">` + d.contact_phone + `</td>
            <td class="whitespace-nowrap px-6 py-4">` + d.contact_email + `</td>
            <td class="flex flex-row whitespace-nowrap px-6 py-4">
              <a href="{{route('editPage', ['id' => ':editid'])}}" class="text-yellow-600 mx-2 no-underline font-bold">
                Edit
              </a>
              |
              <form method="POST" action="{{ route('deleteContact', ['id' => ':deleteid']) }}">
                @csrf
                @method('put')
                
                <button type='submit' class="text-red-500 mx-2 font-bold" data-toggle="tooltip" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">
                  Delete
                </button>
                </form>
            </td></tr>
          `;
          appendContent = appendContent.replace(':editid', d.id).replace(':deleteid', d.id);
          $('#content').append(appendContent);
        })
        
      },
      error : function (){
        console.log("Search data error.");
      }
    });
  }
</script>

</html>