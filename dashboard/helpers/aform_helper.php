<?php
/**
 * advanced form
 */


if ( ! function_exists('basic_input'))
{
    /**
     * 基本input框
     * @param $name
     * @param string $value
     * @param string $type
     * @param array $attributes
     * @return string
     */
    function basic_input($name, $value = '', $type = 'text', array $attributes = [])
    {
        $attr_html = '';
        if($attributes)
        {
            $attr_html = _stringify_attributes($attributes);
        }
        $html = <<<EOT
<input type="{$type}" name="{$name}" value="{$value}" {$attr_html} />
EOT;
        return $html;
    }
}

if ( ! function_exists('aform_input'))
{
    /**
     * 表单input框
     * @param $name
     * @param string $value
     * @param string $type
     * @param string $label_name
     * @param array $attributes
     * @return string
     */
    function aform_input($name, $value = '', $type = 'text', $label_name = '', array $attributes = [])
    {
        if(!$label_name) $label_name = $name;
        $rand_no = mt_rand();
        $id = 'input'.$name.$rand_no;

        $attributes['id'] = $id;
        $attributes['class'] = 'form-control';
        $input_html = basic_input($name, $value, $type, $attributes);

        $html = <<<EOT
        <div class="form-group">
            <label for="{$id}" class="col-sm-2 control-label">{$label_name}</label>
            <div class="col-sm-10">
                {$input_html}
            </div>
        </div>
EOT;
        return $html;
    }
}


if ( ! function_exists('aform_input_text'))
{
    /**
     * 表单input text
     * @param $name
     * @param string $value
     * @param string $label_name
     * @param array $attributes
     * @return string
     */
    function aform_input_text($name, $value = '', $label_name = '', array $attributes = [])
    {
        $html = aform_input($name, $value, 'text', $label_name, $attributes);
        return $html;
    }
}


if ( ! function_exists('aform_input_email'))
{
    /**
     * 表单input email
     * @param $name
     * @param string $value
     * @param string $label_name
     * @param array $attributes
     * @return string
     */
    function aform_input_email($name, $value = '', $label_name = '', array $attributes = [])
    {
        $html = aform_input($name, $value, 'email', $label_name, $attributes);
        return $html;
    }
}


if ( ! function_exists('basic_icheck'))
{

    /**
     * 基本的icheck and iradio
     * @param $name
     * @param string $class
     * @param $options
     *
        $options => [
            [
                'name' => 'aa',
                'value' => 'aa',
                'attr' => ['checked'=>'checked']
            ],
            [
                'name' => 'bb',
                'value' => 'bb',
            ],
            [
                'name' => 'cc',
                'value' => 'cc',
                'attr' => ['disabled'=>'disabled']
            ],
        ]
     * @param string $type
     * @return string
     */
    function basic_icheck($name, array $options, $class = 'minimal', $type = 'checkbox')
    {
        if(!is_array(current($options))) $options = [$options];
        $option_html = '';
        foreach($options as $option)
        {
            $attr_html = '';
            if($option['attr'])
            {
                $attr_html = _stringify_attributes($option['attr']);
            }
            $option_value = $option['value'];
            $label_name = $option['name']?:'';
            $option_html .= '<label>';
            $option_html .= '<input name="'.$name.'" value="'.$option_value.'" type="'.$type.'" class="'.$class.'" '.$attr_html.' /> '.$label_name.'&nbsp;&nbsp;';
            $option_html .= '</label>';
        }

        return $option_html;
    }
}


if( ! function_exists('aform_icheckbox'))
{
    /**
     * 表单 icheckbox
     * @param $name
     * @param array $options
     * @param string $label_name
     * @param string $class
     * @return string
     */
    function aform_icheckbox($name, array $options, $label_name = '', $class = 'minimal')
    {
        $option_html = basic_icheck($name, $options, $class);

        $html = <<<EOT
        <div class="form-group">
            <label class="col-sm-2 control-label">{$label_name}</label>
            <div class="col-sm-10" style="margin-top:5px;">
                {$option_html}
            </div>
        </div>
EOT;
        return $html;

    }
}


if( ! function_exists('aform_iradio'))
{
    /**
     * 表单iradio
     * @param $name
     * @param array $options
     * @param string $label_name
     * @param string $class
     * @return string
     */
    function aform_iradio($name, array $options, $label_name = '', $class = 'minimal')
    {
        $option_html = basic_icheck($name, $options, $class, 'radio');

        $html = <<<EOT
        <div class="form-group">
            <label class="col-sm-2 control-label">{$label_name}</label>
            <div class="col-sm-10" style="margin-top:5px;">
                {$option_html}
            </div>
        </div>
EOT;
        return $html;

    }
}


if( ! function_exists('basic_select2'))
{
    /**
     * 基本select2
     * @param $name
     * @param array $options
     * @param array $attributes
     * @param string $class
     * @param string $type
     * @return string
     */
    function basic_select2($name, array $options, array $attributes = [], $class = 'select2', $type = '')
    {

        $attr_html = '';
        if($attributes)
        {
            $attr_html = _stringify_attributes($attributes);
        }

        if(!is_array(current($options))) $options = [$options];
        $option_html = '';
        foreach($options as $option)
        {
            $option_value = $option['value'];
            $label_name = $option['name']?:'';
            $option_attr = $option['attr']?:[];
            $option_attr_html = _stringify_attributes($option_attr);
            $option_html .= '<option value="'.$option_value.'" '.$option_attr_html.'>'.$label_name.'</option>';
        }

        $html = <<<EOT
            <select name="{$name}" class="{$class}" style="width: 100%;" {$attr_html}>
            {$option_html}
            </select>
EOT;
        return $html;
    }
}


if( ! function_exists('aform_select'))
{
    /**
     * 表单select2
     * @param $name
     * @param array $options
     * @param string $label_name
     * @param array $attributes
     * @param string $class
     * @return string
     */
    function aform_select($name, array $options, $label_name = '' , array $attributes = [], $class = 'form-control select2')
    {
        $select_html = basic_select2($name, $options, $attributes, $class);
        $html = <<<EOT
        <div class="form-group">
            <label class="col-sm-2 control-label">{$label_name}</label>
            <div class="col-sm-10" style="margin-top:5px;">
            {$select_html}
            </div>
        </div>
EOT;
        return $html;

    }
}


if( ! function_exists('basic_select_time'))
{
    /**
     * 基本 timepicker
     * @param $name
     * @param $value
     * @return string
     */
    function basic_select_time($name, $value = '')
    {
        $html = <<<EOT
        <div class="bootstrap-timepicker">
            <div class="input-group">
                <input name="{$name}" value="{$value}" type="text" class="form-control timepicker">
                <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                </div>
            </div>
        </div>
EOT;
        return $html;
    }
}

if( ! function_exists('aform_select_time'))
{
    /**
     * 表单 timepicker
     * @param $name
     * @param $value
     * @param string $label_name
     * @return string
     */
    function aform_select_time($name, $value = '', $label_name = '')
    {
        $time = basic_select_time($name, $value);
        $html = <<<EOT
        <div class="form-group">
            <label class="col-sm-2 control-label">{$label_name}</label>
            <div class="col-sm-10">
            {$time}
            </div>
        </div>
EOT;
        return $html;
    }
}



if( ! function_exists('basic_select_date'))
{

    function basic_select_date($name, $value = '')
    {
        $html = <<<EOT
            <div class="input-group ">
                <input name="{$name}" value="{$value}" type="text" class="form-control datepicker">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
            </div>
EOT;
        return $html;
    }
}

if( ! function_exists('aform_select_date'))
{
    function aform_select_date($name, $value = '', $label_name = '')
    {
        $time = basic_select_date($name, $value);
        $html = <<<EOT
        <div class="form-group">
            <label class="col-sm-2 control-label">{$label_name}</label>
            <div class="col-sm-10">
            {$time}
            </div>
        </div>
EOT;
        return $html;
    }
}



if( ! function_exists('basic_select_daterange'))
{

    function basic_select_daterange($sname, $ename, $svalue = '', $evalue = '')
    {
        $html = <<<EOT
            <div class="input-group datarange-box">
                <input value="{$svalue} - {$evalue}" type="text" class="form-control pull-right daterange" data-start-value="{$svalue}" data-end-value="{$evalue}" />
                <input name="{$sname}" value="{$svalue}" type="hidden" class="daterange-start-value"  />
                <input name="{$ename}" value="{$evalue}" type="hidden" class="daterange-end-value"  />
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
            </div>
EOT;
        return $html;
    }
}

if( ! function_exists('aform_select_daterange'))
{
    function aform_select_daterange($sname, $ename, $label_name = '', $svalue = '', $evalue = '')
    {
        $time = basic_select_daterange($sname, $ename, $svalue, $evalue);
        $html = <<<EOT
        <div class="form-group">
            <label class="col-sm-2 control-label">{$label_name}</label>
            <div class="col-sm-10" >
            {$time}
            </div>
        </div>
EOT;
        return $html;
    }
}




if( ! function_exists('basic_select_daterangetime'))
{

    function basic_select_daterangetime($sname, $ename, $svalue = '', $evalue = '')
    {
        $html = <<<EOT
            <div class="input-group datarange-box">
                <input value="{$svalue} - {$evalue}"  type="text" class="form-control pull-right daterangetime"  data-start-value="{$svalue}" data-end-value="{$evalue}">
                <input name="{$sname}" value="{$svalue}" type="hidden" class="daterange-start-value"  />
                <input name="{$ename}" value="{$evalue}" type="hidden" class="daterange-end-value"  />
                <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                </div>
            </div>
EOT;
        return $html;
    }
}

if( ! function_exists('aform_select_daterangetime'))
{
    function aform_select_daterangetime($sname, $ename, $label_name = '', $svalue = '', $evalue = '')
    {
        $time = basic_select_daterangetime($sname, $ename, $svalue, $evalue);
        $html = <<<EOT
        <div class="form-group">
            <label class="col-sm-2 control-label">{$label_name}</label>
            <div class="col-sm-10">
            {$time}
            </div>
        </div>
EOT;
        return $html;
    }
}



if( ! function_exists('basic_select_daterangebtn'))
{

    function basic_select_daterangebtn($sname, $ename, $svalue = '', $evalue = '')
    {
        $html = <<<EOT
            <div class="input-group datarange-box">
                <button type="button" class="btn btn-ms btn-default pull-right daterange-btn"  data-start-value="{$svalue}" data-end-value="{$evalue}">
                    <span><i class="fa fa-calendar"></i><span style="display:inline-block;width:200px;">日期选择</span></span>
                    <i class="fa fa-caret-down"></i>
                </button>
                <input type="hidden" name="{$sname}" value="{$svalue}" class="daterange-start-value" />
                <input type="hidden" name="{$ename}" value="{$evalue}" class="daterange-end-value" />
            </div>
EOT;
        return $html;
    }
}

if( ! function_exists('aform_select_daterangebtn'))
{
    function aform_select_daterangebtn($sname, $ename, $label_name = '', $svalue = '', $evalue = '')
    {
        $time = basic_select_daterangebtn($sname, $ename, $svalue, $evalue);
        $html = <<<EOT
        <div class="form-group">
            <label class="col-sm-2 control-label">{$label_name}</label>
            <div class="col-sm-10">
            {$time}
            </div>
        </div>
EOT;
        return $html;
    }
}
