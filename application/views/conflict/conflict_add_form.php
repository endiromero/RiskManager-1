<div class="modal-dialog">
    <div class="modal-content">
        <form class="form-horizontal e_add_form e_ajax_submit"
              action="<?php echo $save_link; ?>"
              id="<?php echo $form_id; ?>"
              enctype="multipart/form-data"
              method="POST" role="form">
            <div class="modal-header">
                <span type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </span>
                <h4 class="modal-title"><?php echo $form_title; ?></h4>
            </div>
            <div class="modal-body bgwhite">
                <div class="widget-body">
<!--                    <div class="form-group">-->
<!--                        <label class="col-xs-4 contact-label-title row-title">Mã dự án</label>-->
<!--                        <div class="form-group input_field_holder">-->
<!--                            <textarea type="text" name="project_id" class="input_field" rows="1" display="none" style="height: 34px; overflow-y: hidden;resize: none;"></textarea>-->
<!--                        </div>-->
<!--                    </div>-->
                    <div class="form-group">
                        <label class="col-xs-4 contact-label-title row-title">Mã xung đột</label>
                        <textarea type="text" name="code" class="input_field" rows="1" style="height: 34px; overflow-y: hidden;resize: none;"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 contact-label-title row-title">Tên xung đột</label>
                        <textarea type="text" name="name" class="input_field" rows="1" style="height: 34px; overflow-y: hidden;resize: none;"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 contact-label-title row-title">Phương pháp 1</label>
                        <select name="method_1_id" class="e_select_risk"
                                data-url="<?php echo site_url('conflict/get_method_child') ?>">
                            <option value="" selected disabled hidden>Chọn rủi ro</option>
                            <?php foreach ($list_risk as $item) { ?>
                                <option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option>
                            <?php } ?>
                        </select>
                        <select name="method_1_id" class="e_select_method_child" style="display: none">
                            <option value="" selected disabled hidden>Chọn phương thức</option>
                            <?php if (isset($list_risk_child)) {
                                foreach ($list_risk_child as $item) { ?>
                                    <option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option>
                                <?php }
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 contact-label-title row-title">Phương pháp 2</label>
                        <select  class="e_select_risk"
                                data-url="<?php echo site_url('conflict/get_method_child') ?>">
                            <option value="" selected disabled hidden>Chọn rủi ro</option>
                            <?php foreach ($list_risk as $item) { ?>
                                <option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option>
                            <?php } ?>
                        </select>
                        <select  name="method_2_id" class="e_select_method_child" style="display: none">
                            <option value="" selected disabled hidden>Chọn phương thức</option>
                            <?php if (isset($list_risk_child)) {
                                foreach ($list_risk_child as $item) { ?>
                                    <option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option>
                                <?php }
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 contact-label-title row-title">Mô tả</label>
                        <textarea type="text" name="description" class="input_field" rows="1" style="height: 34px; overflow-y: hidden;resize: none;"></textarea>
                    </div>

                </div>
                <div class="clearfix"></div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="b_add b_edit btn btn-success">
                    <i class="ace-icon fa fa-save "></i> Lưu
                </button>
                <button type="reset" class="b_add btn">Nhập lại</button>
                <button type="button" class="b_view b_add b_edit btn" data-dismiss="modal">Hủy</button>
            </div>
        </form>
    </div>
</div>