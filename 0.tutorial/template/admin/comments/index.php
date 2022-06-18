<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/head-tag.php"));
?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5 "><i class="fas fa-newspaper"></i> Comments</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a role="button" href="#" class="btn btn-sm btn-success disabled">create</a>
        </div>
    </div>
    <section class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>List of comments</caption>
            <thead>
                <tr>
                    <th>#</th>
                    <th>user ID</th>
                    <th>article ID</th>
                    <th>comment</th>
                    <th>status</th>
                    <th>setting</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="http://localhost/admin-panel/comment/show/1">1</a></td>
                    <td>24</td>
                    <td>14</td>
                    <td>It's great!</td>
                    <td>approved</td>
                    <td>
                        <a role="button" class="btn btn-sm btn-warning text-white" href="http://localhost/admin-panel/comment/approved/">click to not approved</a>
                    </td>
                </tr>
                <tr>
                    <td><a href="http://localhost/admin-panel/comment/show/1">2</a></td>
                    <td>24</td>
                    <td>14</td>
                    <td>It's great!</td>
                    <td>seen</td>
                    <td>
                        <a role="button" class="btn btn-sm btn-success text-white" href="http://localhost/admin-panel/comment/approved/1">click to approved</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
?>