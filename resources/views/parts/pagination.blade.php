@if ($paginator->lastPage() > 1)
<div class="pikly-pagination mt-4">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
                <a class="page-link" href="{{ $paginator->url($paginator->currentPage()-1) }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

                <!-- @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                  <li class="page-item{{ ($paginator->currentPage() == $i) ? ' active' : '' }}"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                @endfor -->


<?php




$n = $paginator->lastPage();
$r = $n/($n/3);
$x = 1;

do{
   if($x == $r) 
   {
      $m = $r+3;
      if($m<=$n){
          $r = $r+3;
      }
      
      if($m>$n){
          $diff = $n-$r;
          $r = $r+$diff;
      }
   }

   ?>

<li class="page-item{{ ($paginator->currentPage() == $x) ? ' active' : '' }}"><a class="page-link" href="{{ $paginator->url($x) }}">{{ $x }}</a></li>

   <?php

    // echo $x;
    $x++;

}while($x<=$r)
                
                
                
?>








                <li class="page-item{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
                    <a class="page-link" href="{{ $paginator->url($paginator->currentPage()+1) }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
        </ul>
    </nav>
</div>
@endif