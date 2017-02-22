<div class="padding-10">
    <div class="widget-box e_widget e_manager_table_container" data-url="">
        <div class="widget-header">
            <h5 class="widget-title bigger-125">
                <i class="ace-icon fa fa-table"></i>
                Chi Tiết Dự Án
                <?php echo $detail_project->name ?>
            </h5>
            <div class="widget-toolbar">
                <a href="#" data-action="collapse">
                    <i class="ace-icon fa fa-chevron-up"></i>
                </a>
            </div>

            <div class="widget-toolbar actions_content e_actions_content">
                <a href="<?php echo site_url('hint/manage/'.$detail_project->id) ?>" class="btn btn-success btn-sm  add_button">
                    <i class="ace-icon fa fa-plus-circle"></i>
                    Đưa ra gợi ý
                </a>
            </div>
            <div class="widget-toolbar actions_content e_actions_content">
                <a href="<?php echo site_url('risk_type/manage/'.$detail_project->id) ?>" class="btn btn-success btn-sm">
                    <i class="fa fa-pied-piper"></i>
                    Quản lí loại rủi ro
                </a>
            </div>
            <div class="widget-toolbar actions_content e_actions_content">
                <a href="<?php echo site_url('risk/manage/'.$detail_project->id) ?>" class="btn btn-success btn-sm">
                    <i class="ace-icon fa fa-dashboard"></i>
                    Quản lí rủi ro
                </a>
            </div>
        </div>
        </br>
        <div class="widget-body">
            <div class="form-group">
                <label class="col-xs-4 contact-label-title row-title">Mã dự án</label>
                <span><?php echo $detail_project->code; ?></span>
            </div>
            <div class="form-group">
                <label class="col-xs-4 contact-label-title row-title">Loại rủi ro</label>
                <span><?php echo $detail_project->code; ?></span>
            </div>
            <div class="form-group">
                <label class="col-xs-4 contact-label-title row-title">Mã dự án</label>
                <span><?php echo $detail_project->code; ?></span>
            </div>
            <div class="form-group">
                <label class="col-xs-4 contact-label-title row-title">Tên dự án</label>
                <span><?php echo $detail_project->name; ?></span>
            </div>
            <div class="form-group">
                <label class="col-xs-4 ">Số lượng rủi ro</label>
                <span><?php echo $detail_project->risk_quantity == NULL ? 0 : $detail_project->risk_quantity; ?></span>
            </div>
            <div class="form-group">
                <label class="col-xs-4 contact-label-title row-title">Mô tả</label>
                <span><?php echo $detail_project->description; ?></span>
            </div>

        </div>
    </div>
</div>