@extends('layouts.app')
@section('content')
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
              <td>Audrius</td>
              <td>Lukas</td>
              <td></td>
              <td>Milda</td>
              <td>Airidas</td>
              <td></td>
              <td>Julius</td>
            </tr>
            <tr>
              <td class="py-4">09:00</td>
              <td>Tadas</td>
              <td></td>
              <td>Giedrius</td>
              <td></td>
              <td>Jonas</td>
              <td>Kestas</td>
              <td></td>
            </tr>
            <tr>
              <td class="py-4">12:00</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>Lukas</td>
              <td></td>
            </tr>
            <tr>
              <td class="py-4">15:00</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>Andrius</td>
            </tr>
            <tr>
              <td class="py-4">18:00</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td class="py-4 rounded-bl-lg">21:00</td>
              <td></td>
              <td></td>
              <td>Darius</td>
              <td></td>
              <td></td>
              <td></td>
              <td class="rounded-br-lg">Andrius</td>
            </tr>
          </tbody>
          </table>
    </div>
</div>
@endsection