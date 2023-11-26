<?php
use Livewire\Volt\Component;
new class extends Component{

    protected $month;

    public function mount($month = NULL){
        
        $days = [
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday",
            "Saturday",
            "Sunday"
        ];

        $this->month = $month ?? (new \DateTime())->format('m');
        $year = date("Y");
        $this->firstOfMonth = (new \DateTime())->format("Y-{$this->month}-01");
        $d = getdate(mktime(null,null,null,$this->month,1,$year));
        $this->startDay = array_search($d['weekday'],$days);

    }
}

//

?>
<div class="flex flex-col w-100 h-[100vh]">
    {{$this->month}}
    {{$this->firstOfMonth}}
    <div class="flex flex-wrap">
        <div class="w-1/7">Monday</div>
        <div class="w-1/7">Tuesday</div>
        <div class="w-1/7">Wednesday</div>
        <div class="w-1/7">Thursday</div>
        <div class="w-1/7">Friday</div>
        <div class="w-1/7">Saturday</div>
        <div class="w-1/7">Sunday</div>
    </div>
    <div class="flex flex-wrap h-100 grow">
        @for ($w = 0; $w < 5; $w++)
            @for ($d = 1; $d <= 7; $d++)
                <div class="cell w-1/7">
                    @php
                        if($w ==0 && $d == $this->startDay + 1){
                            $day = 1;
                        }elseif( ($w > 0 || $d > $this->startDay) && $day < date('t')){
                            $day++;
                        }else{
                            $day = '';
                        }
                    @endphp
                    {{$day}}
                </div>
            @endfor
        @endfor
    </div>
</div>