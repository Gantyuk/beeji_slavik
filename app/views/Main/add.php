<br>
<div class="content">
    <div class="row">

        <form id="add" method="post" action="" enctype="multipart/form-data">
            <div class="col-md-6 ">
                <div class="input-group ">
                    <span class="input-group-addon" id="basic-addon1">Ім'я:</span>
                    <input id="name" id="inputEmail" type="text" class="form-control" name="name"
                           value="<?php if (!empty($_POST['name'])) echo $_POST['name']; ?>" autocomplete="off">
                </div>
                <br>
                <div class="input-group ">
                    <span class="input-group-addon" id="basic-addon1">Емаіл:</span>
                    <input id="email" type="email" class="form-control " name="email"
                           value="<?php if (!empty($_POST['email'])) echo $_POST['email']; ?>">
                </div>

                <br>
                <div class="text-left">
                    <label id="img" class="btn btn-primary max-width">
                        Завантажити зображення <input type="file" id="imgInput" name="picture" style="display: none">
                    </label></div>
            </div>

            <div class="col-md-6 ">
                <div class="form-group">

                    <label for="comment">Текст:</label>
                    <textarea class="form-control" id="text" rows="5"
                              name="text"><?php if (!empty($_POST['text'])) echo $_POST['text']; ?></textarea>
                </div>
            </div>
            <a id = "prewiew_visible" class="btn btn-success " >Попередній перегляд</a>
            <a id = "prewiew" class="fancybox" href="#prev" hidden></a>
            <a class="btn btn-success disabled"  id="real_send">Надіслати</a>
            <input id="real_send_notvisible" name="add" type="submit" hidden>
        </form>
    </div>
</div>
<div class="hidden">
    <form id="prev">
        <div class="col-md-12 center-block text-center">
            <div class="panel panel-primary">
                <div id="name2" class="panel-heading"></div>
                <div class="panel-body">
                    <img id="image" src="#" alt="" width="320" height=240/>
                    <p id="text2"></p>
                    <span class="label label-info" id="email2">E-mail: </span><br><br>
                    <span class="label label-warning">Статус:</span>
                    <span class="label label-danger">Не виконано</span>
                </div>
            </div>
        </div>
    </form>
</div>