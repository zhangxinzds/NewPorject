@if ($paginator->hasPages())
@php
//指定显示的页码数量，取值范围3-n
$paging_number = 10;
if($paging_number<3){
    $paging_number = 3;
}
//当前页
$paging_current_page = $paginator->currentPage();
//共几页
$paging_last_page = $paginator->lastPage();
if(($paging_number%2) == 0){
    if($paging_last_page <= $paging_number){
        $paging_start = 1;
        $paging_end = $paging_last_page;
    }else if($paging_current_page < ($paging_number/2+1)){
        $paging_start = 1;
        $paging_end = $paging_number;
    }else if($paging_current_page >= ($paging_number/2+1) && (($paging_current_page + ($paging_number/2 - 1)) <= $paging_last_page)){
        $paging_start = $paging_current_page - ($paging_number/2);
        $paging_end = $paging_current_page + ($paging_number/2 - 1);
    }else{
        $paging_start = $paging_last_page - $paging_number + 1;
        $paging_end = $paging_last_page;
    }
}else{
    if($paging_last_page <= $paging_number){
        $paging_start = 1;
        $paging_end = $paging_last_page;
    }else if($paging_current_page < ceil($paging_number/2)){
        $paging_start = 1;
        $paging_end = $paging_number;
    }else if($paging_current_page >= ceil($paging_number/2) && (($paging_current_page + floor($paging_number/2)) <= $paging_last_page)){
        $paging_start = $paging_current_page - floor($paging_number/2);
        $paging_end = $paging_current_page + floor($paging_number/2);
    }else{
        $paging_start = $paging_last_page - ($paging_number - 1);
        $paging_end = $paging_last_page;
    }
}
@endphp
<style>
	.disabled:hover{
		cursor: not-allowed;
	}
</style>
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><span class="page-link">首页</span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">上一页</a></li>
        @endif
        {{-- Pagination Elements --}}
        @for ($i = $paging_start; $i <= $paging_end; $i++)
            @if ($i == $paginator->currentPage())
                <li class="page-item active"><span class="page-link active">{{ $i }}</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
            @endif
        @endfor
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">下一页</a></li>
        @else
            <li class="page-item disabled"><span class="page-link">末页</span></li>
        @endif
    </ul>
@endif
