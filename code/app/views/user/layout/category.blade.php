<div class="grid__column-2">
    <nav class="category">
        <h3 class="category__heading">
            <i class="category__heading-icon fa-solid fa-list"></i>
            Danh mục
        </h3>
        <ul class="categorys-list">
            @foreach($categorys as $cate)
            <li class="category-item">
                <a href="home.php" class="catogery-item__link">
                    {{$cate -> name_cate }}
                </a>
            </li>
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
            @endforeach
        </ul>
    </nav>
</div>