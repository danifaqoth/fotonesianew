@extends('master')

@section('content')

<div style="margin: 20px"></div>
<div class="container">
  <div class="mail-box">
    @include('inc.menu_message_box')
    <aside class="lg-side">
      <div class="inbox-body body-inbox">
        <div class="mail-option">
         <strong> <h4> Message</h4> </strong>
        </div>
       <table class="table table-inbox table-hover">
        <tbody>

          @foreach ($messages as $message)

          <tr>
            <td class="inbox-small-cells">
              <input type="checkbox" class="mail-checkbox">
            </td>
            <td class="view-message">
              <a href=" {{ route('vendor.readmessage',  $message->member_id ) }} ">
                {{ $message->nama }}
              </a>
            </td>
            {{-- <td class="view-message ">{{ str_limit($message->content, 60) }}</td> --}}
            <td class="view-message  text-right">{{ $message->created_at->diffForHumans() }}</td>
          </tr>
          @endforeach
          
        </tbody>
      </table>
    </div>
  </aside>
</div>
</div>

<div style="margin: 20px"></div>
@endsection