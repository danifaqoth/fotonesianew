@extends('master')

@section('content')

<div style="margin: 20px"></div>
<div class="container">
  <div class="mail-box">
    @include('inc.menu_message_box')
    <aside class="lg-side">
      <div class="inbox-body">
        <div class="mail-option">
          <div class="chk-all">
            <input type="checkbox" class="mail-checkbox mail-group-checkbox">
            <div class="btn-group">
              <a data-toggle="dropdown" href="#" class="btn mini all" aria-expanded="false">
                All
                <i class="fa fa-angle-down "></i>
              </a>
              <ul class="dropdown-menu">
               <li><a href="#"> None</a></li>
               <li><a href="#"> Read</a></li>
               <li><a href="#"> Unread</a></li>
             </ul>
           </div>
         </div>

         <div class="btn-group">
           <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#" class="btn mini tooltips">
             <i class=" fa fa-refresh"></i>
           </a>
         </div>

         <ul class="unstyled inbox-pagination">
           <li><span>1-50 of 234</span></li>
           <li>
             <a class="np-btn" href="#"><i class="fa fa-angle-left  pagination-left"></i></a>
           </li>
           <li>
             <a class="np-btn" href="#"><i class="fa fa-angle-right pagination-right"></i></a>
           </li>
         </ul>
       </div>
       <table class="table table-inbox table-hover">
        <tbody>

          @foreach ($messages as $message)
         
          <tr>
            <td class="inbox-small-cells">
              <input type="checkbox" class="mail-checkbox">
            </td>
            <td class="view-message">
              <a href=" {{ route('vendor.readmessage', $message->id) }} ">
                {{ $message->subject }}
              </a>
            </td>
            <td class="view-message ">{{ str_limit($message->content, 60) }}</td>
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