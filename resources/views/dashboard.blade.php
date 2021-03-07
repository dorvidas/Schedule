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
<test></test>
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
        <table class="table-fixed rounded-lg w-full border-separate">
          <thead class="bg-purple-900 text-white w-full">
            <tr>
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
            @for ($time = strtotime("06:00"); $time < strtotime("22:00"); $time+=7200)
              <tr>
                <td class="py-4">{{ date("H:i",$time) }}</td>
                  @for ($i = 0; $i < 7; $i++)
                  <td class="modal-open hover:bg-purple-200">
                    @foreach ($schedule as $day)
                      @if (date("H:i:s",$time) == $day->starting_at && $day->work_day == $inputDays[$i])
                        {{ $day->user->name }}
                      @endif
                    @endforeach
                  </td>
                  @endfor
                </td>
              </tr>
            @endfor
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
        <label for="users">Select employee:</label>
        <p>
          <select name="user_id" id="user_id">
            @foreach ($users as $user)
              <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
          </select>
        </p>
        <p>
          <select name="inputDays" id="inputDays">
            @foreach ($inputDays as $day)
              <option value="{{ $day }}">{{ $day }}</option>
            @endforeach
          </select>
        </p>
        <p>
          <select name="starting_at" id="starting_at">
            <option value="06:00">06:00</option>
            <option value="08:00">08:00</option>
            <option value="10:00">10:00</option>
            <option value="12:00">12:00</option>
            <option value="14:00">14:00</option>
            <option value="16:00">16:00</option>
            <option value="18:00">18:00</option>
          </select>
        </p>
        <p>
          <select name="finishing_at" id="finishing_at">
            <option value="08:00">08:00</option>
            <option value="10:00">10:00</option>
            <option value="12:00">12:00</option>
            <option value="14:00">14:00</option>
            <option value="16:00">16:00</option>
            <option value="18:00">18:00</option>
            <option value="20:00">20:00</option>
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
  </div>
</div>
<script src=" {{ asset('js/schedulePopUp.js') }}" type="text/javascript"></script>
@endsection

