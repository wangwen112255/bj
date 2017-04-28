<?php if (!defined('THINK_PATH')) exit();?>        <div class="modal-header" >
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><b>毕设题目--</b><?php echo ($codata["coursename"]); ?></h4>
            </div>
            <div class="modal-body">
                <p>上传时间 <small><?php echo ($codata["creattime"]); ?></small></p>

                <p><big><b>内容详情</b></big><?php echo ($codata["desc"]); ?></p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-dismiss="modal">要求人数<span class="badge"><?php echo ($codata["limitnum"]); ?></span></button>
                <button type="button" class="btn btn-success " data-dismiss="modal">已选人数<span class="badge"><?php echo ($codata["choosenum"]); ?></span>  </button>
                <button type="button" class="btn btn-primary " data-dismiss="modal"><span class="fa fa-check"></span>朕已查看</button>
            </div>