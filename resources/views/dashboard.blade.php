@extends('layouts.app')
@section('content')
<style>
  .modal {
    transition: opacity 0.25s ease;
  }
  body.modal-active {
    overflow-x: hidden;
    overflow-y: visible !important;
  }
</style>
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
        <table class="table-fixed rounded-lg w-full border-separate">
          <thead class="bg-purple-900 text-white w-full">
            <tr>
            <!-- Must be done properly -->
              <th class="w-1/12 py-4 rounded-tl-lg" >Time</th>
                @foreach ($currentWeek as $day)
                  @if (strpos($day, 'Sunday') !== false)
                    <th class="w-1/6 rounded-tr-lg"> {{ $day }} </th>
                  @else
                    <th class="w-1/6"> {{ $day }} </th>
                  @endif
                @endforeach
            </tr>
          </thead>
          <tbody class="text-center bg-purple-50">
            <tr>
              <td class="py-4">06:00</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td class="py-4">08:00</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td class="py-4">10:00</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td class="py-4">12:00</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td class="py-4">14:00</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td class="py-4">16:00</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td class="py-4 rounded-bl-lg">18:00</td>
              <td class="modal-open hover:bg-purple-200"></td>
              <td class="modal-open hover:bg-purple-200"></td>
              <td class="modal-open hover:bg-purple-200"></td>
              <td class="modal-open hover:bg-purple-200"></td>
              <td class="modal-open hover:bg-purple-200"></td>
              <td class="modal-open hover:bg-purple-200"></td>
              <td class="rounded-br-lg modal-open hover:bg-purple-200"></td>
            </tr>
          </tbody>
        </table>
  <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
      <form action="{{ route('dashboard') }}" method="post">
        @csrf
      <div class="modal-content py-4 text-left px-6">

        <div class="flex justify-between items-center pb-3">
          <p class="text-2xl font-bold">Add Employee</p>
        </div>
        
      <div>
        <label for="cars">Select employee:</label>
        <p>
          <select name="user_id" id="user_id">
            <option value="2">2</option>
          </select>
        </p>
        <p>
          <select name="workDay" id="workDay">
            <option value="2021-02-10">2021-02-10</option>
          </select>
        </p>
        <p>
          <select name="StartingAt" id="StartingAt">
            <option value="06:00">06:00</option>
            <option value="08:00">08:00</option>
            <option value="10:00">10:00</option>
            <option value="12:00">12:00</option>
            <option value="14:00">14:00</option>
            <option value="16:00">12:00</option>
          </select>
        </p>
        <p>
          <select name="FinishingAt" id="FinishingAt">
            <option value="08:00">08:00</option>
            <option value="10:00">10:00</option>
            <option value="12:00">12:00</option>
            <option value="14:00">14:00</option>
            <option value="16:00">16:00</option>
            <option value="18:00">18:00</option>
          </select>
        </p>
      </div>
      <div class="flex justify-end pt-2">
        <button type="submit" class="modal-close px-4 bg-transparent p-3 rounded-lg text-purple-800 hover:bg-gray-100 hover:text-purple-400 mr-2">Save</button>
        <button type="button" class="modal-close px-4 bg-purple-800 p-3 rounded-lg text-white hover:bg-purple-400">Close</button>
      </div>
      </div>
    </form>
    </div>
  </div>
    <script>
      var openmodal = document.querySelectorAll('.modal-open')
      for (var i = 0; i < openmodal.length; i++) {
        openmodal[i].addEventListener('click', function(event){
        event.preventDefault()
        toggleModal()
        })
      }
      
      const overlay = document.querySelector('.modal-overlay')
      overlay.addEventListener('click', toggleModal)
      
      var closemodal = document.querySelectorAll('.modal-close')
      for (var i = 0; i < closemodal.length; i++) {
        closemodal[i].addEventListener('click', toggleModal)
      }
      
      document.onkeydown = function(evt) {
        evt = evt || window.event
        var isEscape = false
        if ("key" in evt) {
        isEscape = (evt.key === "Escape" || evt.key === "Esc")
        } else {
        isEscape = (evt.keyCode === 27)
        }
        if (isEscape && document.body.classList.contains('modal-active')) {
        toggleModal()
        }
      };
      
      function toggleModal () {
        const body = document.querySelector('body')
        const modal = document.querySelector('.modal')
        modal.classList.toggle('opacity-0')
        modal.classList.toggle('pointer-events-none')
        body.classList.toggle('modal-active')
      }
      
    </script>
  </div>
</div>
@endsection