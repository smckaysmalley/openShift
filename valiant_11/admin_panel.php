<div class="well well-sm" id="admin_panel">
    <ul class="nav nav-pills nav-stacked">
        <li role="presentation" class="active"><a href="/valiant_11/">Valient 11 Class Page</a></li>
        <li role="presentation"><a data-target='#addModal' data-toggle='modal'>Add Content</a></li>
        <li role="presentation"><a href="/valiant_11/archive.php">Archive Content</a></li>
    </ul>
</div>

<!-- Modal -->
<div class='modal fade' id='addModal' role='dialog'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    &times;
                </button>
                <h4 class='modal-title' id='myModalLabel'>
			          Add Content
			        </h4>
            </div>
            <div class='modal-body'>
                <form method='post' action='/valiant_11/insert.php'>
                    <div class='form-group'>
                        <label for='inputTitle' class='col-sm-2 control-label'>
                            Title
                        </label>
                        <div class='col-sm-10'>
                            <input type='text' class='form-control' id='inputTitle' placeholder='Title' name='title'>
                        </div>
                    </div>
                    <br/>
                    <div class='form-group'>
                        <label for='inputType' class='col-sm-2 control-label'>
                            Type
                        </label>
                        <div class='col-sm-10'>
                            <select class='form-control' id='inputType' name='type' onchange='updatecontentlabel();'>
                                <option>
                                </option>
                                <option value='youtube'>
                                    Youtube
                                </option>
                                <option value='text'>
                                    Text
                                </option>
                                <option value='picture'>
                                    Picture
                                </option>
                            </select>
                        </div>
                    </div>
                    <br/>
                    <div class='form-group'>
                        <label for='inputContent' id='content' class='col-sm-2 control-label'>
                        </label>
                        <div class='col-sm-10'>
                            <textarea class='form-control' id='inputContent' name='content'></textarea>
                        </div>
                    </div>
                    <button type='submit' class='btn btn-primary'>
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    #admin_panel {
        position: fixed;
        top: 100px;
        left: 15px;
    }
</style>