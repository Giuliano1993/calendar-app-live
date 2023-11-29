<div key="calendar">
    <div class="flex flex-col w-100 h-[100vh]">
    
        <div class="flex flex-wrap">
            <div class="w-1/7">Monday</div>
            <div class="w-1/7">Tuesday</div>
            <div class="w-1/7">Wednesday</div>
            <div class="w-1/7">Thursday</div>
            <div class="w-1/7">Friday</div>
            <div class="w-1/7">Saturday</div>
            <div class="w-1/7">Sunday</div>
        </div>
        <div class="flex flex-wrap h-100 grow" >
            @for ($w = 0; $w < 5; $w++)
                @for ($d = 1; $d <= 7; $d++)
                    
                @php
                $key = (7*$w)+$d;
                @endphp
                    <div class="cell w-1/7" key="{{$key}}cell">
                        @php
                            if($w ==0 && $d == $startDay + 1){
                                $day = 1;
                            }elseif( ($w > 0 || $d > $startDay) && $day < date('t')){
                                $day++;
                            }else{
                                $day = '';
                            }
                        @endphp

                        <livewire:singledaycellvolt key="{{uniqid()}}" day="{{$day}}" selected="{{$day == $selectedDay}}" @activated="$refresh" @createappointment="$refresh">
                    </div>
                @endfor
            @endfor
        </div>
    </div>
</div>
