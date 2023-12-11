<div>
    @if ($status == 'to do')
        <span class="text-white bg-danger p-2 rounded m-2">
            To do
        </span> 
    @elseif ($status == 'in progress')
        <span class="text-white bg-dark p-2 rounded m-2"> 
            In Progress
        </span>
    @elseif($status == 'code review')
        <span class="text-white bg-secondary p-2 rounded m-2">
            Code review
        </span> 
    @else
    <span class="text-white bg-success p-2 rounded m-2">
        Completed
    </span> 
    @endif
</div>