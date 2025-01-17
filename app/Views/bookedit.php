<script src="https://raw-dot-custom-elements.appspot.com/PolymerElements/paper-dropdown-menu/v2.0.0/paper-dropdown-menu/../webcomponentsjs/webcomponents-lite.js"></script>
<link rel="import"
      href="https://raw-dot-custom-elements.appspot.com/PolymerElements/paper-dropdown-menu/v2.0.0/paper-dropdown-menu/paper-dropdown-menu.html">
<link rel="import"
      href="https://raw-dot-custom-elements.appspot.com/PolymerElements/paper-dropdown-menu/v2.0.0/paper-dropdown-menu/../paper-item/paper-item.html">
<link rel="import"
      href="https://raw-dot-custom-elements.appspot.com/PolymerElements/paper-dropdown-menu/v2.0.0/paper-dropdown-menu/../paper-listbox/paper-listbox.html">

<?= view('sections/header') ?>
<h1 class="article-title text-center background-success" style="margin:0 0 30px 0;padding: .80rem 0; ">Update your book</h1>
<div class="container" style="display:flex;height: min-content">
    <form action="../update/<?=$book->bk_id?>" method="POST" enctype="multipart/form-data" class="row" style="display:table-row;padding:10px 20px;flex: 1;">
        <!-- Error Warning -->
        <div id="alertMessage" class="alert alert-danger mb-3" style="display: none">
            <span id="alertMessage"></span>
        </div>

        <div class="row" style="display:flex;padding:10px 20px;flex: 1;">
            <div class="row">
                <div class="form-group sm-4" style="padding-left: 5px">
                    <label for="bk_title"><b>Book Title</b></label>
                    <input type="text" placeholder="Enter Book Title" name="bk_title"  value="<?=$book->bk_title?>" required>
                    <input type="hidden" name = "bk_ownerId" value="<?=$book->bk_ownerId?>">
                </div>

                <div class="form-group sm-4">
                    <label for="paperSelects1" style="font-family: Patrick Hand SC,sans-serif;font-weight: 400;"> Author: </label>
                    <select id="paperSelects1" name="bk_authorId" style="width: 100%;">
                        <?php foreach ($authors as $key => $author): ?>
                            <option <?= ($author->auth_id == $book->bk_authorId)?'selected=selected':''; ?> value="<?= $author->auth_id; ?>"><?= $author->auth_name . ' ' . $author->auth_surname;; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="form-group sm-6">
                    <label for="paperSelects1" style="font-family: Patrick Hand SC,sans-serif;font-weight: 400;">
                        Author: </label>
                    <select id="paperSelects1" multiple="multiple" name="category[]" style="width: 100%;height: 150px;">
                        <?php foreach ($allCategories as $key => $category): ?>
                            <option <?= (in_array($category->cat_id,$bookCatIds))?'selected=selected':''; ?>
                                    value="<?= $category->cat_id; ?>"><?= $category->cat_name; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="form-group sm-4" style="padding-left: 5px">
                    <label for="bk_editionNumber"><b>Book Edition Number</b></label>
                    <input type="text" placeholder="Enter Book Edition Number" name="bk_editionNumber" value="<?=$book->bk_editionNumber?>">
                </div>

                <div class="form-group sm-6" style="">
                    <label for="bk_description"><b>Book Description</b></label>
                    <textarea id="bk_description" name="bk_description" rows="12" style="width: 98%;"><?=$book->bk_description?></textarea>
                </div>
                <div class="form-group text-center sm-6">
                    <label for="bk_mainImgUrl"><b>Book Image</b></label>
                    <!-- Kitap Placeholder'ı -->
                    <img src="/uploads/book_images/<?= ($book->bk_mainImgUrl)?$book->bk_mainImgUrl:'book.png'; ?>" onclick="triggerClick()" id="imageDisplay"
                         style="min-height: 300px">
                    <label for="bk_mainImgUrl">Image</label>
                    <input type="file" name="bk_mainImgUrl" onchange="displayImage(this)" id="bk_mainImgUrl" style="display: none">
                </div>

            </div>


            <div class="sm-6" style="display: flex;align-items: end;flex-direction: row-reverse;">
                <button type="submit" class="btn-outline-primary">Update</button>
            </div>
        </div>
    </form>
</div>

<script>
    function triggerClick(){
        document.querySelector('#bk_mainImgUrl').click();
    }

    function displayImage(e){
        if(e.files[0]){
            var reader = new FileReader();

            reader.onload = function (e){
                document.querySelector('#imageDisplay').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
</script>

<?= view('sections/footer'); ?>
