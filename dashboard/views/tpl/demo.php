<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">管理员信息</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
                <div class="box-body">

                    <?= aform_input_email('email', '', '邮箱') ?>

                    <?= aform_input_text('nickname', '', '姓名') ?>

                    <?= aform_icheckbox('is_super', [
                        ['name' => '是', 'value' => 1],['name' => '否', 'value' => 0]
                    ], '是否为超管') ?>

                    <?= aform_iradio('is_super2', [
                        ['name' => '是否为超管', 'value' => 1],['name' => '是否为超管2', 'value' => 1]
                    ]) ?>

                    <?= aform_select('aaa', [
                        [
                            'name' => '部门1',
                            'value' => 'v1'
                        ],
                        [
                            'name' => '部门2',
                            'value' => 'v2',
                            'attr' => ['selected'=>'selected']
                        ],
                        [
                            'name' => '部门3',
                            'value' => 'v3'
                        ],
                    ], '部门') ?>

                    <?= aform_select_time('time', '', '时间') ?>
                    <?= aform_select_date('date', '', '日期') ?>

                    <?= aform_select_daterange('aa', 'bb', '日期范围', '2016-05-03', '2016-05-04') ?>
                    <?= aform_select_daterangetime('cc', 'dd', '时间范围', '2016-05-01', '2016-05-02') ?>
                    <?= aform_select_daterangebtn('ee', 'ff', '时间范围高级', '2016-05-05', '2016-05-06') ?>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-info pull-right">Sign in</button>
                </div>
                <!-- /.box-footer -->
            </form>

        </div>

    </div>
    <!-- /.box -->
</div>