<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <!-- start: content -->
    <div class="container mt-3">
        <!-- start: create form -->
        <div class="mx-5 border border-dark">
            <h2 class="text-center text-success text-uppercase my-4">Create Article</h2>
            <form action="?controller=article&action=store" method="post" class="mx-3 mt-2">
                <!-- title -->
                <div class="row mb-4">
                    <label for="" class="col-sm-1 col-form-label">Title</label>
                    <div class="col-sm-11">
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                </div>

                <!-- summary -->
                <div class="row mb-4">
                    <label for="" class="col-sm-1 col-form-label">Summary</label>
                    <div class="col-sm-11">
                        <textarea name="summary" id="summary"  class="form-control" rows="3"></textarea>
                    </div>
                </div>

                <!-- content -->
                <div class="row mb-4">
                    <label for="" class="col-sm-1 col-form-label">Content</label>
                    <div class="col-sm-11">
                        <textarea name="content" id="content"  class="form-control"  rows="3"></textarea>
                    </div>
                </div>

                <!-- category -->
                <div class="row mb-4">
                    <label for="" class="col-sm-1 col-form-label">Category</label>
                    <div class="col-sm-11">
                        <select class="form-select" aria-label="" name="category_id">
                        <option selected>---Select a category---</option>
                        <?php foreach ($categories as $category){?>
                            <option value="<?= $category->getID(); ?>"><?= $category->getName(); ?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>

                <!-- author -->
                <div class="row mb-4">
                    <label for="" class="col-sm-1 col-form-label">Author</label>
                    <div class="col-sm-11">
                        <select class="form-select" aria-label="" name="member_id">
                        <option selected>---Select author---</option>
                        <?php foreach ($members as $member){?>
                            <option value="<?= $member->getID(); ?>"><?= $member->getForename(); ?> <?= $member->getSurname(); ?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>
                
                <!-- image -->
                <div class="row mb-4">
                    <label for="" class="col-sm-1 col-form-label">Image</label>
                    <div class="col-sm-11">
                        <input type="file" class="form-control" id="file" name="file">
                    </div>
                </div>

                <!-- publish -->
                <div class="row mb-4">
                    <label for="" class="col-sm-1 col-form-label">Publish</label>
                    <div class="col-sm-11 my-auto d-flex">
                        <!-- yes -->
                        <div class="me-3">
                            <input class="form-check-input" type="radio" name="published" id="published" value="1">
                            <label class="form-check-label" for="">Yes</label>
                        </div>

                        <!-- no -->
                        <div>
                            <input class="form-check-input" type="radio" name="published" id="published" value="0">
                            <label class="form-check-label" for="">No</label>
                        </div>
                    </div>
                </div>

                <!-- submit -->
                <button type="submit" class=" d-flex ms-auto mb-3 btn btn-success">Create</button>
            </form>
        </div>
        <!-- end: create form -->
    </div>
    <!-- end: content -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>