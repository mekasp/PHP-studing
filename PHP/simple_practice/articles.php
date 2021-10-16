<?php

function search($search,$articles) {
    foreach ($articles as $key => $article) {
        $result = strpos($article['tittle'],$search);
        if ($result === false) {
            unset($articles[$key]);
        }
    }

    return $articles;
}

function sorting($sort,$articles){
    $result = [];

    $count = count($articles);

    for ($i = 0; $i < $count; $i++){

        $minmax = false;
        $minmaxKey = false;

        foreach ($articles as $key => $article){
            $value = strtotime($article['date']);

            if ($minmax === false || ($sort == 1 && $minmax < $value) || ($sort == 0 && $minmax > $value)){
                $minmax = $value;
                $minmaxKey = $key;
            }
        }

        $result[] = $articles[$minmaxKey];

        unset($articles[$minmaxKey]);
    }

    return $result;
}

$articles = [
        0 => [
            'img' => 'https://image.shutterstock.com/image-vector/img-file-document-icon-260nw-1356823577.jpg',
            'tittle' => 'gavno moe',
            'description' => 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum',
            'date' => '2021-01-01',
        ],
        1 => [
            'img' => 'https://image.shutterstock.com/image-vector/img-file-document-icon-260nw-1356823577.jpg',
            'tittle' => 'gavno tvoe',
            'description' => 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum',
            'date' => '2021-01-02',
        ],
        2 => [
            'img' => 'https://image.shutterstock.com/image-vector/img-file-document-icon-260nw-1356823577.jpg',
            'tittle' => 'gavno ih',
            'description' => 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum',
            'date' => '2021-01-03',
        ],
        3 => [
            'img' => 'https://image.shutterstock.com/image-vector/img-file-document-icon-260nw-1356823577.jpg',
            'tittle' => 'ya lybly sebya',
            'description' => 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum',
            'date' => '2021-01-04',
        ],
        4 => [
            'img' => 'https://image.shutterstock.com/image-vector/img-file-document-icon-260nw-1356823577.jpg',
            'tittle' => 'ya lybly tebya',
            'description' => 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum',
            'date' => '2021-01-05',
        ],
        5 => [
            'img' => 'https://image.shutterstock.com/image-vector/img-file-document-icon-260nw-1356823577.jpg',
            'tittle' => 'ya lybly ego',
            'description' => 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum',
            'date' => '2021-01-06',
        ],
        6 => [
            'img' => 'https://image.shutterstock.com/image-vector/img-file-document-icon-260nw-1356823577.jpg',
            'tittle' => 'ya lybly ee',
            'description' => 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum',
            'date' => '2021-01-07',
        ],
        7 => [
            'img' => 'https://image.shutterstock.com/image-vector/img-file-document-icon-260nw-1356823577.jpg',
            'tittle' => 'ya lybly nas',
            'description' => 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum',
            'date' => '2021-01-08',
        ],
        8 => [
            'img' => 'https://image.shutterstock.com/image-vector/img-file-document-icon-260nw-1356823577.jpg',
            'tittle' => 'ya lybly vas',
            'description' => 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum',
            'date' => '2021-01-09',
        ],
        9 => [
            'img' => 'https://image.shutterstock.com/image-vector/img-file-document-icon-260nw-1356823577.jpg',
            'tittle' => 'ty vonychka',
            'description' => 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum',
            'date' => '2021-01-10',
        ],
        10 => [
            'img' => 'https://image.shutterstock.com/image-vector/img-file-document-icon-260nw-1356823577.jpg',
            'tittle' => 'ya vonychka',
            'description' => 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum',
            'date' => '2021-01-11',
        ],
        11 => [
            'img' => 'https://image.shutterstock.com/image-vector/img-file-document-icon-260nw-1356823577.jpg',
            'tittle' => 'on vonychka',
            'description' => 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum',
            'date' => '2021-01-12',
        ],
        12 => [
            'img' => 'https://image.shutterstock.com/image-vector/img-file-document-icon-260nw-1356823577.jpg',
            'tittle' => 'ona vonychka',
            'description' => 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum',
            'date' => '2021-01-13',
        ],

];
//поиск
if(isset($_GET['search'])){
    $search = $_GET['search'];
} else {
    $search = '';
}
if ($search != ''){
    $articles = search($search,$articles);
}

//сортирвока
if(isset($_GET['sort'])){
    $sort = $_GET['sort'];
} else {
    $sort = '';
}
if ($sort != ''){
    $articles = sorting($sort,$articles);
}

//пагинация
$pages = ceil(count($articles) / 4);
if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$start = 4 * ($page -1);

$count = 0;

?>

<!DOCTYPE html>
<html>
    <head>
        <style>
            .articles {
                position: relative;
                width: 100%;
            }

            .article {
                position: relative;
                float: left;
                width: 300px;
            }
            .pages {
                position: relative;
                width: 100%;
                text-align: center;
            }
            .pages a {
                display: inline-block;
            }
        </style>
    </head>
    <body>
        <!-- поиск -->
        <div class="search">
            <form method="get">
                <input type="text" name="search">
                <button type="submit">поиск</button>
            </form>
        </div>
        <div class="articles">
            <!-- сортировка -->
            <div class="sort">
                <form method="get">
                    <select name="sort">
                        <option value="1">Новые</option>
                        <option value="0">Старые</option>
                    </select>
                    <button type="submit">Сортировать</button>
                    <input type="hidden" name="search" value="<?php echo $search?>">
                </form>
            </div>
            <?php foreach ($articles as $key => $article){ ?>
                <?php if ($key >= $start && $count < 4){
                    $count++?>
                    <div class="article">
                        <img src ='<?php echo $article['img']; ?>'>
                        <h1><?php echo $article['tittle']; ?></h1>
                        <p><?php echo $article['description']; ?></p>
                        <p><?php echo $article['date']?></p>
                    </div>
                <?php }?>
            <?php } ?>

            <div style="clear: both"></div>
        </div>

        <!-- пагинация -->
        <div class="pages">
            <?php for ($i = 1; $i <= $pages; $i++){?>
                <a href="http://php.local/articles.php?page=<?php echo $i; ?>&search=<?php echo $search; ?>&sort=<?php echo $sort?>">
                    <?php echo $i; ?>
                </a>
            <?php }?>
        </div>


    </body>
</html>
