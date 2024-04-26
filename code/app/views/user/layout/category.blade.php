<div class="grid__column-2">
    <nav class="category">
        <h3 class="category__heading">
            <i class="category__heading-icon fa-solid fa-list"></i>
            Danh mục
        </h3>
        <ul class="categorys-list">
            @foreach($categorys as $cate)
            <div class="dropdown">
                <button class="btn btn-warning text-bg-light  dropdown-toggle my-3 w-75" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{$cate->name_cate}}
                </button>
                <ul class="dropdown-menu w-100 ">
                    @foreach($subCategorys as $subcate)
                    @if($subcate->id_category == $cate->id)
                    <li><a class="dropdown-item py-3 h4" href="">{{$subcate->name_subcate}}</a></li>
                    @endif
                    <!-- <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                    @endforeach
                </ul>
            </div>
            @endforeach
            <!-- <li class="category-item">
                <a href="home.php" class="catogery-item__link">
                    Danh mục 2
                </a>
            </li>
            <li class="category-item">
                <a href="home.php" class="catogery-item__link">
                    Danh mục 3
                </a>
            </li>

            <li class="category-item">
                <a href="home.php" class="catogery-item__link">
                    Danh mục 4
                </a>
            </li> -->

        </ul>
    </nav>
</div>