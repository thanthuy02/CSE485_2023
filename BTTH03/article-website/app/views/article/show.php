<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <title>Document</title>
</head>
<body>
  <main class="container" id="content">
    <div class="row my-4">
      <div class="col-auto">
        <h2 class="text-success text-uppercase">SEARCH ARTICLE</h2>
      </div>
    </div>

    <form action="?controller=article&action=show" method="post" class="form-search">
      <div class="input-group mx-auto w-50 mb-3">
        <label for="search" class="input-group-text">Search for:</label>
        <input type="text" name="term" value="<?= $term ?>" id="search" class="form-control" placeholder="Enter search term" />
        <button type="submit" class="btn btn-success"><i class="bi bi-search"></i></button>
      </div>
    </form>

    <section class="grid">
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
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </section>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>