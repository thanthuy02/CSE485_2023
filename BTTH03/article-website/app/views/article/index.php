<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Article Homepage</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
  <div class="container">
    <div class="row my-4">
      <div class="col-auto">
        <h2 class="text-success text-uppercase">Article</h2>
      </div>
      <div class="col d-flex justify-content-end">
        <a href="<?= DOMAIN . 'public/index.php?controller=article&action=create' ?>" class="btn btn-success me-2">
          <i class="bi bi-plus-lg"></i> Create Article
        </a>
        <div class="d-flex justify-content-center align-items-center">
          <a href="<?= DOMAIN . 'public/index.php?controller=article&action=show' ?>" class="text-center">
            <i class="bi bi-search fs-5 text-success" style="font-size: 2rem; font-weight: bold;"></i>
          </a>
        </div>
      </div>
    </div>
    <div class="row">
    <?php foreach ($articles as $article) { ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <?php
                if ($article['image_file'] == null) {
                    $article['image_file'] = 'blank.png';
                }
                ?>
                <img src="images/<?= $article['image_file'] ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?= $article['title'] ?></h5>
                    <p class="card-text"><?= $article['summary'] ?></p>
                    <p class="card-text text-uppercase">posted in <b><?= $article['category'] ?></b> by <b><?= $article['author'] ?></b></p>
                    <form action="?controller=article&action=delete&id=<?= $article['id'] ?>" method="POST">
                        <button type="submit" class="btn btn-danger float-end"><i class="bi bi-trash"></i></button>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
</div>


  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>